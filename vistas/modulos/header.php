<header class="main-header">
<!--===================================
            LOGO TIPO
======================================-->
<a href="inicio" class="logo"><!--Logo es una clase de admin LT-->

<!--Logo mini-->
<span class="logo-mini">
<img src="vistas/img/plantilla/caiman.png" class="img-responsive" style="padding:10px">
</span>

<!--Logo Normal-->
<span class="logo-lg">
<img src="vistas/img/plantilla/bannerlineal.png" class="img-responsive" style="padding:10px 0px">
</span>
<a/>

<!--===================================
            BARRA DE NAVEGACION
======================================-->
<nav class="navbar navbar-static-top" role="navigation">

                    <!--boton de navegacion-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                 <span class="sr-only">Toggle navegation</span>
            </a>

<!--Boton de usuario-->
<div class="navbar-custom-menu">

    <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                    <?php

                    if($_SESSION["foto"] != ""){

                        echo '<img src="'.$_SESSION["foto"].'" class="user-image">';

                    }else{
                echo '<img src="vistas/img/usuarios/default/anonimo.png" class="user-image">';
            }
            ?>
            <span class="hidden-xs"><?php  echo $_SESSION["nombre"]; ?></span>
            </a>
    <!--Drop down toggle -->
    <ul class="dropdown-menu">

        <li class="user-body">

                <div class="pull-right">

                    <a href="salir" class="btn btn-default btn-flat">Salir <i class="fa fa-sign-out"></i></a>

              
                </div>

        </li>

    </ul>  


        </li>
    </ul>
</div>


</nav>

</header>
