/*
Create and Render map on div with zoom and center
*/

var lat = "-115.70911288496336";
var lon = "30.074673962243228";
var clave = "XX123456";
var layer1;
let splitted_polygon;
let splitted_polygon1;
let vector_layer;
let vector_layer1;

let regularStyle = new ol.style.Style({
  stroke: new ol.style.Stroke({
    color: "#0e97fa",
    width: 2,
  }),
  fill: new ol.style.Fill({
    color: [0, 0, 0, 0.2],
  }),
});

let regularStyle2 = new ol.style.Style({
  stroke: new ol.style.Stroke({
    color: "#f00a3f",
    width: 2,
  }),
  fill: new ol.style.Fill({
    color: [0, 0, 0, 0.2],
  }),
});

let highlightStyle = new ol.style.Style({
  stroke: new ol.style.Stroke({
    color: [255, 0, 0, 0.6],
    width: 2,
  }),
  fill: new ol.style.Fill({
    color: [255, 0, 0, 0.2],
  }),
  zIndex: 1,
});

let highlightStyle2 = new ol.style.Style({
  stroke: new ol.style.Stroke({
    color: [255, 0, 0, 0.6],
    width: 2,
  }),
  fill: new ol.style.Fill({
    color: [255, 255, 0, 0.2],
  }),
  zIndex: 1,
});

let highlightStyle3 = new ol.style.Style({
  stroke: new ol.style.Stroke({
    color: [255, 155, 0, 0.6],
    width: 2,
  }),
  fill: new ol.style.Fill({
    color: [255, 0, 0, 0.2],
  }),
  zIndex: 1,
});

var labelStyle = new ol.style.Style({
  text: new ol.style.Text({
    font: "12px Calibri,sans-serif",
    overflow: true,
    fill: new ol.style.Fill({
      color: "#000",
    }),
    stroke: new ol.style.Stroke({
      color: "#fff",
      width: 3,
    }),
    offsetY: -12,
  }),
});

var style = [labelStyle, regularStyle];

// Popup overlay
var popup = new ol.Overlay.Popup({
  popupClass: "default", //"tooltips", "warning" "black" "default", "tips", "shadow",
  closeBox: true,
  onshow: function () {
    console.log("You opened the box");
  },
  onclose: function () {
    console.log("You close the box");
  },
  positioning: "auto",
  autoPan: true,
  autoPanAnimation: { duration: 250 },
});

class OLMap {
  //Constructor accepts html div id, zoom level and center coordinaes
  constructor(map_div, zoom, center) {
    this.map = new ol.Map({
      interactions: ol.interaction.defaults({
        doubleClickZoom: false,
      }),
      overlays: [popup],
      target: map_div,
      layers: [
        new ol.layer.Tile({
          source: new ol.source.OSM(),
        }),
      ],
      view: new ol.View({
        center: ol.proj.fromLonLat(center),
        zoom: zoom,
      }),
    });
  }
}

/*
Create Vector Layer
*/
class VectorLayer {
  //Constructor accepts title of vector layer and map object
  constructor(title, map) {
    this.layer = new ol.layer.Vector({
      title: title,
      source: new ol.source.Vector({
        projection: map.getView().projection,
      }),
      //style: regularStyle
      style: function (feature) {
        labelStyle.getText().setText(clave);
        return style;
      },
    });
  }
}

/*
Create overlay
*/
class Overlay1 {
  //Contrctor accepts map object, overlay html element, overlay offset, overlay positioning and overlay class
  constructor(
    map,
    element = document.getElementById("popup"),
    offset = [0, -15],
    positioning = "bottom-center",
    className = "ol-tooltip-measure ol-tooltip ol-tooltip-static"
  ) {
    this.map = map;
    this.overlay = new ol.Overlay({
      element: element,
      offset: offset,
      positioning: positioning,
      className: className,
    });
    this.overlay.setPosition([0, 0]);
    this.overlay.element.style.display = "block";
    //this.map.addOverlay(this.overlay);
  }
}

class Overlay {
  //Contrctor accepts map object, overlay html element, overlay offset, overlay positioning and overlay class
  constructor(
    map,
    element = document.getElementById("popup"),
    offset = [0, -15],
    positioning = "bottom-center",
    className = "ol-tooltip-measure ol-tooltip ol-tooltip-static"
  ) {
    this.map = map;
    this.overlay = new ol.Overlay({
      element: element,
      offset: offset,
      positioning: positioning,
      className: className,
    });
    this.overlay.setPosition([0, 0]);
    this.overlay.element.style.display = "block";
    this.map.addOverlay(this.overlay);
  }
}

/* 
Draw Intraction
*/
class Draw {
  //Constructor accepts geometry type, map object and vector layer
  constructor(type, map, vector_layer, vector_layer1) {
    this.type = type;
    this.vector_layer = vector_layer;
    this.vector_layer1 = vector_layer1;
    this.map = map;
    this.interaction = new ol.interaction.Draw({
      type: type,
      stopClick: true,
    });
    if (type === "LineString") {
      this.interaction.on("drawstart", this.onDrawStart);
    } else {
      this.vector_layer.getSource().clear();
    }
    this.interaction.on("drawend", this.onDrawEnd);
    this.map.addInteraction(this.interaction);
  }

  onDrawStart = (e) => {
    e.feature.getGeometry().on("change", this.onGeomChange);
  };

  onDrawEnd = (e) => {
    var polygon_extent = e.feature.getGeometry().getExtent();

    //alert('vamos '+ polygon_extent);
    overlay.setPosition([0, 0]);

    this.map.getOverlays().clear();
    this.vector_layer.setStyle(regularStyle2);
    this.map.removeInteraction(this.interaction);

    if (this.type === "Polygon") {
      this.vector_layer.getSource().addFeature(e.feature);
      polygon = e.feature;
    }
  };

  onGeomChange = (e) => {
    /*
            This function will dynamically split the polygon into two parts by a line and will follow geometry change event.
        */

    //Create jsts parser to read openlayers geometry
    let parser = new jsts.io.OL3Parser();

    //Creating line geometry from draw intraction
    let linestring = new ol.Feature({
      geometry: new ol.geom.LineString(e.target.getCoordinates()),
    });

    //Parse Polygon and Line geomtry to jsts type
    let a = parser.read(polygon.getGeometry());
    let b = parser.read(linestring.getGeometry());

    //Perform union of Polygon and Line and use Polygonizer to split the polygon by line
    let union = a.getExteriorRing().union(b);
    let polygonizer = new jsts.operation.polygonize.Polygonizer();

    //Splitting polygon in two part
    polygonizer.add(union);

    //Get splitted polygons
    let polygons = polygonizer.getPolygons();

    console.log("Poligonos: " + JSON.stringify(polygons));

    //This will execute only if polygon is successfully splitted into two parts
    if (polygons.array.length == 2) {
      //Clear old splitted polygons and measurement ovelays
      this.vector_layer.getSource().clear();
      this.map.getOverlays().clear();

      //console.log('Poligono1: '+ polygons.array[0].parser.read(geom).getCoordinates());

      polygons.array.forEach((geom, index) => {
        console.log("Index: " + index);

        if (index === 0) {
          splitted_polygon1 = new ol.Feature({
            geometry: new ol.geom.Polygon(parser.write(geom).getCoordinates()),
          });

          console.log(
            "splitted_polygon1: " + JSON.stringify(splitted_polygon1)
          );
          //console.log('Coords: '+ JSON.stringify(geometry.getCoordinates()));
        }

        splitted_polygon = new ol.Feature({
          geometry: new ol.geom.Polygon(parser.write(geom).getCoordinates()),
        });

        //console.log('splitted_polygon: '+ JSON.stringify(splitted_polygon));

        //Add splitted polygon to vector layer
        this.vector_layer.getSource().addFeature(splitted_polygon);

        //this.vector_layer.getSource().addFeature(splitted_polygon1);
        //splitted_polygon1.getSource().addFeature(splitted_polygon1);

        //Add area measurement overlay to splitted polygon
        let overlay = new Overlay(this.map).overlay;
        this.calArea(
          overlay,
          splitted_polygon.getGeometry().getFlatInteriorPoint(),
          splitted_polygon.getGeometry().getArea()
        );

        //Add line measurement overlay to segment of polygon
        let polyCoords = splitted_polygon.getGeometry().getCoordinates()[0];
        //let polyCoords1 = splitted_polygon.getGeometry().getCoordinates()[1];

        console.log("polyCoords: " + JSON.stringify(polyCoords));
        //console.log('polyCoords1: '+ JSON.stringify(polyCoords1));

        polyCoords.forEach((coords, i) => {
          if (i < polyCoords.length - 1) {
            let line = new ol.geom.LineString([coords, polyCoords[i + 1]]);
            let overlay = new Overlay(this.map).overlay;
            this.calDistance(overlay, line.getFlatMidpoint(), line.getLength());
          }
        });
      });

      splitted_polygon.set("clave", "clave2");
      splitted_polygon.setStyle(highlightStyle2);

      //vector_layer.getSource().addFeature(polygon);

      //Change Style of Splitted polygons
      //this.vector_layer.setStyle(highlightStyle);

      //this.vector_layer1.getSource().addFeature(splitted_polygon);
      //this.vector_layer.getSource().addFeature(splitted_polygon1)
      //this.vector_layer1.set('clave','1');
      //this.vector_layer.set('clave','clave1');
      //this.vector_layer.setStyle(highlightStyle3);
    } else {
      //Change style to normal if polgon is not splitted
      this.vector_layer.setStyle(regularStyle);

      //Clear measurement overlays and splitted polygon if line is not completely intersected with polygon
      this.map.getOverlays().clear();
      this.vector_layer.getSource().clear();

      //Add original polygon to vector layer if no intersection is there between line and polygon
      this.vector_layer.getSource().addFeature(polygon);
    }
  };

  //Calculates the length of a segment and position the overlay at the midpoint of it.
  calDistance = (overlay, overlayPosition, distance) => {
    if (parseInt(distance) == 0) {
      overlay.setPosition([0, 0]);
    } else {
      overlay.setPosition(overlayPosition);
      if (distance >= 1000) {
        overlay.element.innerHTML =
          "<b>" + (distance / 1000).toFixed(2) + " km</b>";
      } else {
        overlay.element.innerHTML = "<b>" + distance.toFixed(2) + " m</b>";
      }
    }
  };

  calArea = (overlay, overlayPosition, area) => {
    if (parseInt(area) == 0) {
      overlay.setPosition([0, 0]);
    } else {
      overlay.setPosition(overlayPosition);
      if (area >= 10000) {
        overlay.element.innerHTML =
          "<b>" +
          Math.round((area / 1000000) * 100) / 100 +
          " km<sup>2<sup></b>";
      } else {
        overlay.element.innerHTML =
          "<b>" + Math.round(area * 100) / 100 + " m<sup>2<sup></b>";
      }
    }
  };
}

/* 
Enable snapping on a vector layer
*/
class Snapping {
  //Constructor accepts geometry type, map object and vector layer
  constructor(map, vector_source) {
    this.map = map;
    this.vector_source = vector_source;
    this.interaction = new ol.interaction.Snap({
      source: vector_source,
    });
    this.map.addInteraction(this.interaction);
  }
}

//Create map and vector layer
//let map = new OLMap('map', 9, [-96.6345990807462, 32.81890764151014]).map;
let map = new OLMap("map", 16, [parseFloat(lat), parseFloat(lon)]).map;

//let vector_layer = new VectorLayer('Temp Layer', map).layer
vector_layer = new VectorLayer("Temp Layer", map).layer;

map.addLayer(vector_layer);

var wkt = new ol.format.WKT();
let polygon = wkt.readFeature(
  "POLYGON((-115.71092605999964 30.075249710000353,-115.70846500999963 30.07666109000035,-115.70768053313792 30.074927595751678,-115.70888757999963 30.072204380000347,-115.71092605999964 30.075249710000353))"
);
polygon.getGeometry().transform("EPSG:4326", "EPSG:3857");
polygon.set("clave", clave);

vector_layer.getSource().addFeature(polygon);

//Add Interaction to map depending on your selection
let draw = null;
let btnClick = (e) => {
  removeInteractions();
  let geomType = e.srcElement.attributes.geomtype.nodeValue;

  //Create interaction
  draw = new Draw(geomType, map, vector_layer);
  if (geomType == "LineString") {
    new Snapping(map, vector_layer.getSource());
  }
};

//Remove map interactions except default interactions
let removeInteractions = () => {
  map
    .getInteractions()
    .getArray()
    .forEach((interaction, i) => {
      if (i > 8) {
        map.removeInteraction(interaction);
      }
    });
};

var select;
//Drag feature
let dragFeature = () => {
  removeInteractions();

  //map.addInteraction(new ol.interaction.Translate());
  select = new ol.interaction.Select({
    condition: ol.events.condition.click,
    toggleCondition: ol.events.condition.shiftKeyOnly,
    style: regularStyle2,
  });

  map.addInteraction(select);

  var selected_collection = select.getFeatures();

  // On selected => show/hide popup
  select.getFeatures().on(["add"], function (e) {
    var feature = e.element;
    var content = "";
    content += "<img src='" + feature.get("img") + "'/>";
    content += feature.get("text");
    popup.show(feature.getGeometry().getFirstCoordinate(), content);
  });
  select.getFeatures().on(["remove"], function (e) {
    popup.hide();
  });

  //selected_collection.push(featurePoint);

  // var point = feature.getGeometry();
  // var coords = point.getCoordinates();

  //alert('vamos: ' +selected_collection);
};

//re-position the overlay
//var feature = e.element;

//Clear vector features and overlays and remove any interaction
let clear = () => {
  removeInteractions();
  map.getOverlays().clear();
  vector_layer.getSource().clear();
};

var container = document.getElementById("popup");
var content = document.getElementById("popup-content");
var closer = document.getElementById("popup-closer");

var overlay = new ol.Overlay({
  element: container,
  autoPan: true,
  autoPanAnimation: {
    duration: 250,
  },
});

//Bind methods to click events of buttons
let distanceMeasure = document.getElementById("btn1");
distanceMeasure.onclick = btnClick;

/*
let areaMeasure = document.getElementById('btn2');
areaMeasure.onclick = btnClick;

let clearGraphics = document.getElementById('btn3');
clearGraphics.onclick = clear;
*/
let drag = document.getElementById("btn4");
drag.onclick = dragFeature;

var container = document.getElementById("popup"),
  content_element = document.getElementById("popup-content"),
  closer = document.getElementById("popup-closer");

var popup = new ol.control.Overlay({
  hideOnClick: true,
  className: $("#anim").val(),
});
map.addControl(popup);

// Set wipe parameters before/after vivibility change
popup.on("change:visible", function (e) {
  // wipe needs to know the size of the element to clip on
  if (/wipe/.test($("#anim").val())) {
    if (e.visible) {
      $(e.element).css(
        "clip",
        "rect(0px," + map.getSize()[0] + "px," + map.getSize()[1] + "px,0px)"
      );
    } else {
      $(e.element).css("clip", "rect(0px,0px," + map.getSize()[1] + "px,0px)");
    }
  }
  // Reset clip for others
  else $(e.element).css("clip", "");
});

map.on("click", function (evt) {
  var feature = map.forEachFeatureAtPixel(evt.pixel, function (feature, layer) {
    return feature;
  });

  if (feature) {
    var geometry = feature.getGeometry();
    var coord = geometry.getCoordinates();
    //var layer = feature.getLayer(map);

    console.log("Coords: " + JSON.stringify(geometry.getCoordinates()));
    //console.log('Layer: '+ layer.get('name'));

    //var content = '<h3>Coords: ' + JSON.stringify(geometry.getCoordinates()) + '</h3>';
    var content = "<h3>Coords:</h3>";

    content += "<h5> Clave: " + feature.get("clave") + "</h5>";

    //polygon.setProperties('clave', "XX123456");

    console.log("Content: " + content);

    //overlay.setPosition(overlayPosition);
    overlay.setPosition([10, 10]);

    //alert('Vamos'+ JSON.stringify(geometry.getCoordinates()));

    //content += '<h5> Región: ' + feature.get('region') + '</h5>';
    /*            
        let overlay = new Overlay1(this.map).overlay;        
        overlay.setPosition(coord);
        overlay.element.innerHTML = '<b>' + JSON.stringify(geometry.getCoordinates())  + ' km<sup>2<sup></b>';
        */
    //console.info(feature.getProperties());
  }
});
