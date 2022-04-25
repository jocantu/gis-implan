<?php include "includes/init.php" ?>

<!DOCTYPE html>
<html lang="en">
    <?php include "includes/header.php" ?>
    <body>
        <?php include "includes/nav.php" ?>

        <div class="container-md main-container">
            <div class="row  gy-5">
                <div class="col-md-6">
                    <div class="row gy-2">
                        <h2>Bienvenidos</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt quod modi harum provident veritatis est libero delectus? Facilis est cum fuga possimus asperiores sapiente tempore officia repudiandae sit, cumque aliquam.</p>
                    </div>
                    <div class="row">
                      <div id='map' style='width: 100%; height: 300px;'></div>
                      <script>
                            mapboxgl.accessToken = 'pk.eyJ1Ijoiam9jYW50dSIsImEiOiJja21kejI2b2wycXV4MnFvOWt6MTdzb2c5In0.fejnLvT5sU76D6hK5hyprg';
                          const map = new mapboxgl.Map({
                              container: 'map', // container ID
                              style: 'mapbox://styles/jocantu/cl281krpu002815mtnncya5y1', // style URL
                              center: [-116.925172, 32.478624], // starting position [lng, lat]
                              zoom: 16, // starting zoom
                              pitch: 45,
                              bearing: -17.6,
                          });
                      </script>

                        <a hrerf="#" class="btn btn-secondary">Ver Mapa</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row gy-5 mb-3 buscar-tramite-container">
                        <div class="col-2 d-flex justify-content-center align-items-center tramites-icon">
                            <span class="material-icons-outlined">
                                file_present
                            </span>
                        </div>
                        <div class="col-10 buscar-tramite">
                            <h3>Trámites</h3>
                            <input type="text" name="buscar-tramite--input" id="buscar-tramite--input" placeholder="¿Qué estas buscando?">
                            <div class="d-flex mt-2 justify-content-center align-items-center">
                                <a href="#">Ver Todos los Trámites</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="quicklinks">
                        <button class="quicklink">
                          <div class="quicklink-image">
                            <i class="material-icons-outlined">
                              task
                            </i>
                          </div>
                          <div class="quicklink-text">
                            <p>Catálogo</p>
                          </div>
                        </button>
                        <button class="quicklink">
                          <div class="quicklink-image">
                            <i class="material-icons-outlined">
                              task
                            </i>
                          </div>
                          <div class="quicklink-text">
                            <p>Estadísticas</p>
                          </div>
                        </button>
                        <button class="quicklink">
                          <div class="quicklink-image">
                            <i class="material-icons-outlined">
                              task
                            </i>
                          </div>
                          <div class="quicklink-text">
                            <p>Recursos Adicionales</p>
                          </div>
                        </button>
                      </div>
                    </div>
                    <div class="row gy-3">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a href="#"><img src="https://picsum.photos/300/180" class="d-block w-100" alt="photo1"></a>
                            </div>
                            <div class="carousel-item">
                                <a href="#"><img src="https://picsum.photos/300/180" class="d-block w-100" alt="photo2"></a>
                            </div>
                            <div class="carousel-item">
                                <a href="#"><img src="https://picsum.photos/300/180" class="d-block w-100" alt="photo3"></a>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
                    </div>

                    <!-- <div class="container">
                        <div class="row row-cols-2 row-cols-lg-3 g-3 g-lg-3">
                            <div class="col">
                                <div class="row">
                                    <div class="col-1">
                                        
                                    </div>
                                </div>
                            <div class="p-3 quick-links">Enlace 1</div>
                            </div>
                            <div class="col">
                            <div class="p-3 quick-links">Enlace 2</div>
                            </div>
                            <div class="col">
                            <div class="p-3 quick-links">Enlace 3</div>
                            </div>
                            <div class="col">
                            <div class="p-3 quick-links">Enlace 4</div>
                            </div>
                            <div class="col">
                            <div class="p-3 quick-links">Enlace 5</div>
                            </div>
                            <div class="col">
                            <div class="p-3 quick-links">Enlace 6</div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

        

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header d-block d-sm-none">
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="uinfo position-relative">
                    <a href="#" class="uinfo--settings position-absolute top-0 end-0">
                        <span class="material-icons config-icon">
                            settings
                        </span>
                    </a>
                    <div class="container-fluid position-relative">
                        <div class="uinfo-avatar position-absolute top-50 start-50 translate-middle">
                            <span class="material-icons position-relative uinfo-icon">
                                account_circle
                                <span class="material-icons uinfo--add-photo position-absolute">
                                    add_a_photo
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="uinfo--data position-relative text-center">
                    <span class="material-icons-outlined position-absolute edit-icon">
                        edit
                    </span>
                    Información del Usuario
                </div>
                <div class="side-menu-div text-center">
                    <h4>Notificaciones</h4>
                </div>
                <div class="quick-menu-btn-container">
                    <button class="quick-menu-btn d-flex justify-content-md-center align-items-center">
                        Trámite 
                        <span class="material-icons-outlined add-tramite-icon">
                            add_circle
                        </span>
                    </button>
                    <button class="quick-menu-btn">Ver Mapa</button>
                </div>
                <div class=" side-menu-div text-center">
                    <h4>Lista de tramites activos</h4>
                </div>
                <a href="#">Cerrar sesión</a><br>
                <a href="#staticBackdrop" data-bs-toggle="modal">Iniciar sesión</a>
            </div>
        </div>
        <div class="modal fade" id="register-form2">
                <div class="container">
                  <div class="row mb-2">
                      <a class="btn btn-secondary col form-stage form-stage-active" id="tab1" onclick="openTab(event, 'd_personales')">
                        1. Datos<br>Personales 
                      </a>
                      <a class="btn btn-secondary col form-stage" id="tab2" onclick="openTab(event, 't_y_c')">
                        2. Términos<br> y Condiciones
                      </a>
                      <a class="btn btn-secondary col form-stage" id="tab3" onclick="openTab(event, 'resumen')">
                        3. Resumen
                      </a>
                  </div>
                </div>
                 
                  
                  <form class="register-form">
                    <div id="d_personales" class="registerTab">
                        <div class="ps-3 pt-1 pb-1" style="border-left: 5px solid var(--grey5);">
                            <p class="m-0">Favor de llenar los siguientes campos.</p>
                        </div>
                      <div>
                        <label for="nombre" class="form-label">Nombre (s)</label>
                        <input type="text" class="form-control name-input register-input" id="nombre" />
                      </div>
                      <div class="row">
                          <div class="col">
                            <label for="ap_paterno" class="form-label">Apellido Paterno</label>
                            <input type="text" class="form-control name-input register-input" id="ap_paterno" />
                          </div>
                          <div class="col">
                            <label for="ap_materno" class="form-label">Apellido Materno</label>
                            <input type="text" class="form-control name-input register-input" id="ap_materno" />
                          </div>
                      </div>
                      <div>
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control single-input register-input" id="email" />
                      </div>
                      <div>
                        <label for="fecha-de-nacimiento" class="form-label"
                          >Fecha de nacimiento</label
                        >
                        <div class="fecha-de-nacimiento">
                          <label for="fn_dia">Día:
                            <select name="fn_dia" id="fn_day" class="fn-input">
                              <option value="">--</option>
                              <option value="01">01</option>
                              <option value="02">02</option>
                              <option value="03">03</option>
                              <option value="04">04</option>
                              <option value="05">05</option>
                              <option value="06">06</option>
                              <option value="07">07</option>
                              <option value="08">08</option>
                              <option value="09">09</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>
                              <option value="17">17</option>
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20">20</option>
                              <option value="21">21</option>
                              <option value="22">22</option>
                              <option value="23">23</option>
                              <option value="24">24</option>
                              <option value="25">25</option>
                              <option value="26">26</option>
                              <option value="27">27</option>
                              <option value="28">28</option>
                              <option value="29">29</option>
                              <option value="30">30</option>
                              <option value="31">31</option>
                            </select>
                          </label>
                          <label for="fn_mes">Mes:
                            <select name="fn_mes" id="fn_month" class="fn-input">
                                <option value="">--</option>
                                <option value="01">Ene</option>
                                <option value="02">Feb</option>
                                <option value="03">Mar</option>
                                <option value="04">Abr</option>
                                <option value="05">May</option>
                                <option value="06">Jun</option>
                                <option value="07">Jul</option>
                                <option value="08">Ago</option>
                                <option value="09">Sep</option>
                                <option value="10">Oct</option>
                                <option value="11">Nov</option>
                                <option value="12">Dic</option>
                            </select>
                          </label>
                          <label for="fn_year">Año:
                            <select name="fn_year" id="fn_year" class="fn-input">
                                <option value="">----</option>
                                <option value="1940">1940</option>
                                <option value="1941">1941</option>
                                <option value="1942">1942</option>
                                <option value="1943">1943</option>
                                <option value="1944">1944</option>
                                <option value="1945">1945</option>
                                <option value="1946">1946</option>
                                <option value="1947">1947</option>
                                <option value="1948">1948</option>
                                <option value="1949">1949</option>
                                <option value="1950">1950</option>
                                <option value="1951">1951</option>
                                <option value="1952">1952</option>
                                <option value="1953">1953</option>
                                <option value="1954">1954</option>
                                <option value="1955">1955</option>
                                <option value="1956">1956</option>
                                <option value="1957">1957</option>
                                <option value="1958">1958</option>
                                <option value="1959">1959</option>
                                <option value="1960">1960</option>
                                <option value="1961">1961</option>
                                <option value="1962">1962</option>
                                <option value="1963">1963</option>
                                <option value="1964">1964</option>
                                <option value="1965">1965</option>
                                <option value="1966">1966</option>
                                <option value="1967">1967</option>
                                <option value="1968">1968</option>
                                <option value="1969">1969</option>
                                <option value="1970">1970</option>
                                <option value="1971">1971</option>
                                <option value="1972">1972</option>
                                <option value="1973">1973</option>
                                <option value="1974">1974</option>
                                <option value="1975">1975</option>
                                <option value="1976">1976</option>
                                <option value="1977">1977</option>
                                <option value="1978">1978</option>
                                <option value="1979">1979</option>
                                <option value="1980">1980</option>
                                <option value="1981">1981</option>
                                <option value="1982">1982</option>
                                <option value="1983">1983</option>
                                <option value="1984">1984</option>
                                <option value="1985">1985</option>
                                <option value="1986">1986</option>
                                <option value="1987">1987</option>
                                <option value="1988">1988</option>
                                <option value="1989">1989</option>
                                <option value="1990">1990</option>
                                <option value="1991">1991</option>
                                <option value="1992">1992</option>
                                <option value="1993">1993</option>
                                <option value="1994">1994</option>
                                <option value="1995">1995</option>
                                <option value="1996">1996</option>
                                <option value="1997">1997</option>
                                <option value="1998">1998</option>
                                <option value="1999">1999</option>
                                <option value="2000">2000</option>
                                <option value="2001">2001</option>
                                <option value="2002">2002</option>
                                <option value="2003">2003</option>
                                <option value="2004">2004</option>
                                <option value="2005">2005</option>
                                <option value="2006">2006</option>
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                            </select>
                          </label>
                        </div>
                      </div>
                      <div class="flow-control text-end">
                        <a
                        class="btn btn-secondary flow-control"
                        onclick="openTab(event, 't_y_c')"
                      >
                        Siguiente
                      </a>
                      </div>
                      
                    </div>
              
                    <div id="t_y_c" class="registerTab" style="display: none">
                      <p>Favor de leer y aceptar los términos y condiciones.</p>
                      <textarea name="terminos_y_condiciones" id="" cols="30" rows="10" style="width: 100%; max-width: 100%; resize: none;" readonly>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse odit eum adipisci repellat dolores commodi, exercitationem aliquid alias, aut at sed architecto doloremque quis provident laborum dignissimos cumque laboriosam assumenda! Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt quod modi harum provident veritatis est libero delectus? Facilis est cum fuga possimus asperiores sapiente tempore officia repudiandae sit, cumque aliquam. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae, similique molestias praesentium id, odit repudiandae sint explicabo amet ad excepturi repellat corporis recusandae. Aspernatur sunt similique quos explicabo voluptate voluptatum.  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi quaerat, eos molestias expedita neque, quia reiciendis tenetur minus eligendi modi nam unde. Debitis distinctio magnam quod odit possimus eaque obcaecati quidem sint necessitatibus eius vero, aut laudantium sed numquam libero perferendis omnis minus enim molestias iusto praesentium adipisci. Consequuntur nihil dolore, quos maxime nulla harum voluptatum cum atque architecto temporibus assumenda in impedit magni laudantium explicabo similique libero nobis provident! Iste, id sapiente vel pariatur quia voluptates. Beatae voluptas veniam delectus perspiciatis obcaecati reprehenderit, amet nisi fugiat illo officia rerum rem ullam ut eveniet! Veniam rem pariatur explicabo dolor. Nobis.</textarea
                      >
                      <div>
                        <input type="checkbox" />
                        He leído y aceptado los términos y condiciones.
                      </div>
                      <div class="flow-control d-flex justify-content-between">
                        <a
                        class="btn btn-light flow-control"
                        onclick="openTab(event, 'd_personales')"
                      >
                        Atrás
                      </a>
                      <a
                        class="btn btn-secondary flow-control"
                        onclick="openTab(event, 'resumen')"
                      >
                        Siguiente
                      </a>
                      </div>
                      
                    </div>
              
                    <div id="resumen" class="registerTab" style="display: none">
                      <h2>3. Resumen</h2>
                      <div class="ps-3 pt-1 pb-1" style="border-left: 5px solid var(--grey5);">
                        <p class="m-0">Favor de verificar que todos sus datos sean correctos.</p>
                    </div>
                    <div class="d-flex justify-content-between my-2">
                      <h3>Datos Personales</h3> <a href="#" onclick="openTab(event, 'd_personales')">Editar</a>
                    </div>

                      <div class="datos-resumen my-2">
                        <p class="resumen-label">Nombre completo:</p>
                        <p id="nombre-output" class="resumen-output"></p>
                        <p class="resumen-label">Correo Electrónico:</p>
                        <p id="email-output" class="resumen-output"></p>
                        <p class="resumen-label">Fecha de nacimiento:</p>
                        <p id="fn-output" class="resumen-output"></p>
                      </div>
                      <div class="flow-control d-flex justify-content-between">
                          <a
                          class="btn btn-light flow-control"
                          onclick="openTab(event, 't_y_c')"
                        >
                          Atrás
                        </a>
                        <a
                          class="btn btn-secondary flow-control"
                          onclick="openTab(event, 'resumen')"
                        >
                          Finalizar
                        </a>
                      </div>

                    </div>
                  </form>
            </div>
        <link rel="stylesheet" href="<?php echo $root_directory ?>/css/bootstrap.css">
        <script src="<?php echo $root_directory ?>/js/bootstrap.bundle.js"></script>
    </body>
</html>