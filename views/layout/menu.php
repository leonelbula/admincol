<?php
if (!isset($_SESSION['identity'])) {
	echo'<script>

					swal({
						  type: "success",
						  title: "Cerrado sistema",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "'.URL_BASE.'";

							}
						})

	</script>';
	//header('Location:' . URL_BASE);
}
?>
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="<?=URL_BASE?>frontend/principal" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>SACV</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b> - SACV</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Navegación</span>
      </a>	  
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">        
         <?php
			$Notificacion = homeController::Notificaciones();
			
			while ($row = $Notificacion->fetch_object()) {
				$consignacion = $row->consignacion;
				$usuario = $row->usuario;
				$comentario = $row->comentario;
				$confirmacion = $row->confirmacion;
			}
			 $totalNotificacion = $consignacion + $usuario + $comentario + $confirmacion;
	 
	  ?>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><?=$totalNotificacion?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Hay <?=$totalNotificacion?> notificaciones</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
					  <a href="" class="actualizarNotificaciones" item="consignacion">
                      <i class="fa fa-laptop text-red"></i> <?=$consignacion?>  consignacion nuevas
                    </a>
                  </li>
				  <li>
					  <a href="" class="actualizarNotificaciones" item="usuario">
                      <i class="fa fa-users text-red"></i> <?=$usuario?>  Usuario nuevos
                    </a>
                  </li>  
				  <li>
					  <a href="" class="actualizarNotificaciones" item="comentario">
                      <i class="fa fa-table text-red"></i> <?=$comentario?> comentarios nuevos
                    </a>
                  </li>  
				  <li>
					  <a href="" class="actualizarNotificaciones" item="confirmacion">
                      <i class="fa fa-dashboard text-red"></i> <?=$confirmacion?>  consignacion realizadas
                    </a>
                  </li>  
<!--                  <li>
                    <a href="" class="actualizarNotificaciones" item="cliente_mora">
                      <i class="fa fa-users text-red"></i>  Tienes Clientes mora
                    </a>
                  </li>                        -->
                </ul>
              </li>              
            </ul>
          </li>         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
              <span class="hidden-xs"><?= $_SESSION['identity']->email ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">                

                <p>
                  <?= $_SESSION['identity']->email ?>
                 
                </p>
              </li>           
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="<?=URL_BASE?>usuario/salir" class="btn btn-default btn-flat">salir</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">   
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVEGACIÓN PRINCIPAL</li>
        <li class="">
          <a href="<?=URL_BASE?>home/home">
            <i class="fa fa-dashboard"></i> <span>Principal</span>            
          </a>         
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>USUARIO</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=URL_BASE?>home/listausuario"><i class="fa fa-circle-o"></i> lista de usuario</a></li>           
            
          </ul>
        </li>
		
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>BANCOS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=URL_BASE?>bancos/"><i class="fa fa-circle-o"></i>LISTA DE BANCOS</a></li>   
      		
          </ul>
        </li>
		
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>TRANSACCIONES</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=URL_BASE?>transacciones/"><i class="fa fa-circle-o"></i> LISTA DE TRANSACCIONES</a></li>
            <li><a href="<?=URL_BASE?>transacciones/reporte"><i class="fa fa-circle-o"></i> REPORTE</a></li>         
		   
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>SOLICITUDES</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			  <li><a href="<?=URL_BASE?>solicitudes/"><i class="fa fa-circle-o"></i> LISTA SOLICITUDES</a></li>
            
                   
          </ul>
        </li>
	<li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>COMENTARIOS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			  <li><a href="<?=URL_BASE?>comentario/"><i class="fa fa-circle-o"></i> LISTA COMENTARIO</a></li>
            
                   
          </ul>
        </li>
	
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>PAGINA WEB</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=URL_BASE?>"><i class="fa fa-circle-o"></i>ADMIN PAGINA WEB</a></li><!--			<li><a href="compras/"><i class="fa fa-circle-o"></i> Compras por periodo</a></li> -->
            
          </ul>
        </li> 		
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>USUARIOS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=URL_BASE?>usuario/"><i class="fa fa-circle-o"></i>Usuario</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Permisos de Usuario
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>              
            </li>           
          </ul>
        </li>
        <li><a href="<?=URL_BASE?>parametros/"><i class="fa fa-book"></i> <span>PARAMETROS</span></a></li>
		
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>