<div id="back"></div>

<div class="login-box">

  <div class="login-logo">

<img src="vistas/img/plantilla/caiman.png" class="img-responsive" style="padding:30px 100px 0px 100px">    
  </div> 
  <!-- /.login-logo -->
  <div class="login-box-body">

    <p class="login-box-msg">Iniciar secion</p>

    <form method="post">

      <div class="form-group has-feedback">

        <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>

        <span class="glyphicon glyphicon-user form-control-feedback"></span>

      </div>

      <div class="form-group has-feedback">

        
        <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>

        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

      </div>

      <div class="row">


        
        <!-- /.col -->
        <div class="col-xs-4">

          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>

        </div>
        <!-- /.col -->
      </div>
      <?php

        $login = new ControladorUsuarios();//clase traida de controlador usuarios
        $login -> ctrIngresoUsuario();//metodo que recupera solo el usuario
        
      ?>

    </form>

  </div>

</div>

    <!--

    <div class="social-auth-links text-center">

      <p>- OR -</p>

      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>

      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>

    </div>
    <!-- /.social-auth-links 
    <a href="#">I forgot my password</a><br>

    <a href="register.html" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body
</div> -->