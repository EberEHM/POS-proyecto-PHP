<!--En esta seccion de modulos se crea el menu haciendo uso de iconos 
y clases de Admin LT, aqui solo est el diseno de la pagna
--> 


<aside class="main-sidebar">

     <section class="sidebar">

        <ul class="sidebar-menu">

            <li class="active"><!--Active se pone como activo el enlace -->

                <a href="inicio">

                    <i class="fa fa-home"></i> <!--Las etiquetas i son iconos-->
                    <span>Inicio</span><!--Los span son los titulos-->

                </a>

            </li>

            <?php  

            if ($_SESSION["perfil"]=="Administrador") {

                echo '<li>

                <a href="usuarios">

                    <i class="fa fa-user"></i>
                    <span>Usuarios</span>

                </a>

            </li>';
                
            }

           
        if ($_SESSION["perfil"]=="Administrador" || $_SESSION["perfil"]=="Almacen") {
           echo '<li>

                <a href="categorias">

                    <i class="fa fa-th"></i>
                    <span>Categorías</span>

                </a>

            </li>

            <li>

                <a href="productos">

                    <i class="fa fa-product-hunt"></i>
                    <span>Productos</span>

                </a>

            </li>';

        }

        if ($_SESSION["perfil"]=="Administrador" || $_SESSION["perfil"]=="Vendedor") {

           echo '<li>

                <a href="clientes">

                    <i class="fa fa-users"></i>
                    <span>Clientes</span>

                </a>

            </li>

        

            <li class="treeview">

                <a href="#">

                    <i class="fa fa-dollar"></i>
                    
                    <span>Modulo ventas</span>
                    
                    <span class="pull-right-container">
                    
                        <i class="fa fa-angle-left pull-right"></i>

                    </span>

                </a>

                <ul class="treeview-menu">
                    
                    <li>

                        <a href="ventas">
                            
                            <i class="fa fa-database"></i>
                            <span>Administrar ventas</span>

                        </a>

                    </li>

                    <li>

                        <a href="crearVenta">
                            
                            <i class="fa fa-shopping-cart"></i>
                            <span>Crear venta</span>

                        </a>

                    </li>';

                }

            if ($_SESSION["perfil"]=="Administrador") {

                  echo'  <li>

                        <a href="reporteDeVentas">
                            
                            <i class="fa fa-line-chart"></i>
                             <span>Reporte de ventas</span>

                        </a>

                    </li>';

                }

                ?>

                </ul>

            </li>
            <!--MENU PARA REPARACION -->
            <li class="treeview">

                <a href="#">

                    <i class="fa fa-cogs"></i>
                    
                    <span>Modulo reparación</span>
                    
                    <span class="pull-right-container">
                    
                        <i class="fa fa-angle-left pull-right"></i>

                    </span>

                </a>

                <ul class="treeview-menu">
                    
                    <li>

                        <a href="tipoReparacion">
                            
                            <i class="fa fa-briefcase"></i>
                            <span>Tipo de reparación</span>

                        </a>

                    </li>

                    <li>

                        <a href="dispositivos">
                            
                            <i class="fa fa-mobile-phone"></i>
                            <span>Recibir dispositivo</span>

                        </a>

                    </li>
                     <li>

                        <a href="entregarDispositivo">
                            
                            <i class="fa fa-eject"></i>
                             <span>Entregar dispositivo</span>

                        </a>

                    </li>

                    <li>

                        <a href="registroDispositivos">
                            
                            <i class="fa ion-clipboard"></i>
                             <span>Registro</span>

                        </a>

                    </li>


        </ul>

     </section>

</aside>

<!-- Para realizar todo el diseno se tomo como referencia el archivo de admin LTE:
AdminLTE-2.4.2/pages/examples/blank.html ahi se encuentra toda la estructura parecida, lo unico que realice es dividir todo basandome en un modelo MVC "Modelo Vista Controlador"
Echo por Eber Emanuel Hernandez Martinez
-->