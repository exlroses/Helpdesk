<?php
if (strlen(session_id()) <1)
    session_start();


?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Dashboard - Ace Admin</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../public/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../public/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../public/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>

		<![endif]-->
		<link rel="stylesheet" href="../public/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../public/css/ace-rtl.min.css" />

        <!-- data Tables -->
        <link rel="stylesheet" href="../public/datatables/jquery.dataTables.min.css">
        <link rel="stylesheet" href="../public/datatables/buttons.dataTables.min.css">
        <link rel="stylesheet" href="../public/datatables/responsive.dataTables.min.css">


        <link rel="stylesheet" href="../public/css/sweetalert.css">

		<!-- ace settings handler -->
		<script src="../public/js/ace-extra.min.js"></script>

	</head>
	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Bienvenido:  <?php echo $_SESSION['nombre'] ?>
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="../files/usuarios/<?php echo $_SESSION['imagen'] ?>" alt="Jason's Photo" />
								<span class="user-info">
									<small>Bienvenido,</small>
									<?php echo $_SESSION['nombre'] ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="perfil.php">
										<i class="ace-icon fa fa-user"></i>
										Perfil
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="../ajax/usuario.php?op=salir">
										<i class="ace-icon fa fa-power-off"></i>
										Cerrar
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			
			<div id="sidebar" class="sidebar responsive ace-save-state">

				<ul class="nav nav-list">

                    <?php
                    if  ($_SESSION["escritorio"]==1)
                        {
                            echo '
					<li class="active">
						<a href="administrador.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Escritorio</span>
						</a>

						<b class="arrow"></b>
					</li>';
					 } ?>
                    <?php

                    if ($_SESSION["concluidos"]==1)
                        {
                            echo'
                    <li class="">
                        <a href="concluidos.php">
                            <i class="menu-icon fa fa-tachometer"></i>
                            <span class="menu-text"> Concluidos</span>
                        </a>

                        <b class="arrow"></b>
                    </li>';
                        }
                    ?>
                    <?php

                    if ($_SESSION["requerimientos"]==1)
                    {
                        echo '
                    <li class="">
                        <a href="requerimientos.php">
                            <i class="menu-icon fa fa-pencil-square-o"></i>
                            <span class="menu-text"> Requerimiento</span>
                        </a>

                        <b class="arrow"></b>
                    </li>';
                        }
                    ?>

				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>