<?php  
    function BarraLateral($tipo){
            if($_SESSION['RolUser']=="0"){
            }
            switch($_SESSION['RolUser']){
                    case 0:$EstiloG="";break;
                    case 1:$EstiloG="pointer-events: none; text-decoration:line-through;";break;
                    case 2:$EstiloG="pointer-events: none; text-decoration:line-through;";break;
        }
            $index='';
            $formregistrar='';
            $formcrear='';
            $formactualizar='';
            switch($tipo){
                    case 1:$index='active';break;
                    case 2:$formregistrar='active';break;
                    case 3:$formcrear='active';break;
                    case 4:$formactualizar='active';break;
                    case 5:$formUser='active';break;

            }
        echo  '
            <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="FormProductos.php">
                    <span class="align-middle">Panel administrativo</span>
                </a>

                <ul class="sidebar-nav">
                    <h1>
                        <li class="sidebar-header">MENU</li>
                    </h1>
                    <li class="sidebar-item ';echo($index); echo'">
                        <a class="sidebar-link" href="../view/FormProductos.php" >
                            <i class="align-middle" data-feather="database"></i> <span class="align-middle">Lista de productos</span>
                        </a>
                    </li>
                    <li class="sidebar-item ' ;echo($formregistrar);echo'">
                        <a class="sidebar-link" href="../view/FormRegistrar.php" style="';if($_SESSION['RolUser']==2){echo ($EstiloG);}; echo'">
                            <i class="align-middle"  data-feather="clipboard"></i> <span class="align-middle">Registrar producto</span>
                        </a>
                    </li>
                

                    <li class="sidebar-item ' ;echo($formcrear);echo'">
                        <a class="sidebar-link" href="../view/FormCrearUsuario.php" style="';echo ($EstiloG); echo'">
                        <i class="align-middle" data-feather="users"></i> <span class="align-middle">Registrar Usuario ADMIN</span>
                    </a>
                    <li class="sidebar-item ' ;echo($formactualizar);echo'">
                        <a class="sidebar-link" href="../view/FormRegistrar.php" style="';if($_SESSION['RolUser']==2){echo ($EstiloG);}; echo'">
                            <i class="align-middle"  data-feather="clipboard"></i> <span class="align-middle">Actualizar producto</span>
                        </a>
                    </li>
                    </li>
                    <li class="sidebar-item ' ;echo($formUser);echo'">
                        <a class="sidebar-link" href="../view/FormListaUsuarios.php" style="';if($_SESSION['RolUser']==2){echo ($EstiloG);}; echo'">
                            <i class="align-middle" data-feather="user-check"></i> <span class="align-middle">Lista de USUARIOS</span>
                        </a>
                    </li>

                    
            
                </ul>


            </div>
            </nav>';

            // <li class="sidebar-item ">
            //     <a class="sidebar-link" href="https://laboratorio-express.azurewebsites.net/"  target="_blank">
            //         <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Ir Pagina de la Tienda</span>
            //     </a>
            // </li>
        $index='';
        $formregistrar='';
        $formcrear='';
        $formactualizar='';
    }
    function BarraSuperior($usuario, $dni, $rol, $path){
        switch($rol){
            case 0: $textrol="Administrador";
                break;
            case 1: $textrol="Gerente";
                break;
            case 2: $textrol="Vendedor";
                break;
        }
        echo 	'<nav class="navbar navbar-expand navbar-light navbar-bg">
            <a class="sidebar-toggle js-sidebar-toggle">
                <i class="hamburger align-self-center"></i>
            </a>

            <div class="navbar-collapse collapse">
                <ul class="navbar-nav navbar-align">
                    <li class="nav-item dropdown">
                        <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                            <i class="align-middle" data-feather="settings"></i>
                        </a>
                        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                            <img src="'; echo $path ;echo '" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark">'; echo $usuario ;echo '</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="../view/FormProductos.php"><i class="align-middle me-1" data-feather="user"></i> '; echo"DNI: ". $dni ;echo '</a>
                            <a class="dropdown-item" href="../view/FormProductos.php"><i class="align-middle me-1" data-feather="info"></i> '; echo"Cargo: ". $textrol ;echo '</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"  href="../controller/CtrlCerrarSesion.php"><i class="align-middle me-1" data-feather="log-out"></i> Cerrar Sesion</a>
                        </div>
                    </li>
                </ul>
            </div>
            </nav>';
            }
        
?>
