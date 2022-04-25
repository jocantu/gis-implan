<nav class="navbar navbar-expand-lg navbar-dark ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="<?php echo $root_directory ?>/resources/logos/logo-ayuntamientoXXIV-gris.svg" alt="Logo IMPLAN Tijuana" width="160" class="d-inline-block align-text-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
        <a class="nav-link" href="#">Ver Mapa</a>
        <a class="nav-link" href="#">Estadísticas</a>
        <a class="nav-link" href="#">Católogo</a>
        <a class="nav-link" href="#">Trámites</a>
        <a class="nav-link" href="#">Recursos adicionales</a>
        <a class="nav-link" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">
            <img src="<?php echo $root_directory ?>/resources/icons/account.svg" alt="Imagen de perfil" width="40px">
        </a>
      </div>
  </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title col-11 text-center" id="staticBackdropLabel">Inicia Sesión</h5>
        <button type="button" class="btn-close col-1" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="login-form">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Recordar datos</label>
            </div>
            <div class="mb-3">
                <a href="#">Olvidé mi contraseña</a>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-secondary" width="120px">Entrar</button>
            </div>
            <div class="d-flex mt-4 justify-content-center">
                <a data-bs-target="#register-form2" data-bs-toggle="modal">Registrarse</a>
            </div>
            
        </form>
      </div>
    </div>
  </div>
</div>