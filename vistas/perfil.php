<?php
//Activamos el almacenamiento buffer
ob_start();
session_start();

if (!isset($_SESSION['nombre']))
    {
        header("location: login.html");
    }else {
    require "header.php"
    ?>

    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="administrador.php">Escritorio</a>
                    </li>
                    <li class="active">Perfil</li>
                </ul><!-- /.breadcrumb -->
            </div>

            <div class="page-content">

                <div class="row">
                    <div class="col-xs-12">

                        <div class="row">
                            <div class="space-6"></div>

                            <div class="vspace-12-sm"></div>

                        </div><!-- /.row -->
                        <!-- CONTENIDO DEL PERFIL -->
                        <div>
                            <div id="user-profile-1" class="user-profile row">
                                <div class="col-xs-12 col-sm-3 center">
                                    <div>
												<span class="profile-picture">
													<img id="avatar" class="editable img-responsive" alt="Alex's Avatar"
                                                         src="../files/usuarios/<?php echo $_SESSION['imagen'] ?>"/>
												</span>

                                        <div class="space-4"></div>

                                        <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                                            <div class="inline position-relative">
                                                <a href="#" class="user-title-label dropdown-toggle"
                                                   data-toggle="dropdown">
                                                    <i class="ace-icon fa fa-circle light-green"></i>
                                                    &nbsp;
                                                    <span class="white"><?php echo $_SESSION['nombre'] ?></span>
                                                </a>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="space-6"></div>

                                    <div class="profile-contact-info">
                                        <div class="profile-contact-links align-left">
                                            <a href="#" class="btn btn-link">
                                                <i class="ace-icon fa fa-plus-circle bigger-120 green"></i>
                                                Add as a friend
                                            </a>

                                            <a href="#" class="btn btn-link">
                                                <i class="ace-icon fa fa-envelope bigger-120 pink"></i>
                                                Send a message
                                            </a>

                                            <a href="#" class="btn btn-link">
                                                <i class="ace-icon fa fa-globe bigger-125 blue"></i>
                                                www.alexdoe.com
                                            </a>
                                        </div>

                                        <div class="space-6"></div>

                                        <div class="profile-social-links align-center">
                                            <a href="#" class="tooltip-info" title=""
                                               data-original-title="Visit my Facebook">
                                                <i class="middle ace-icon fa fa-facebook-square fa-2x blue"></i>
                                            </a>

                                            <a href="#" class="tooltip-info" title=""
                                               data-original-title="Visit my Twitter">
                                                <i class="middle ace-icon fa fa-twitter-square fa-2x light-blue"></i>
                                            </a>

                                            <a href="#" class="tooltip-error" title=""
                                               data-original-title="Visit my Pinterest">
                                                <i class="middle ace-icon fa fa-pinterest-square fa-2x red"></i>
                                f            </a>
                                        </div>
                                    </div>

                                    <div class="hr hr12 dotted"></div>

                                    <div class="clearfix">
                                        <div class="grid2">
                                            <span class="bigger-175 blue">25</span>

                                            <br/>
                                            Followers
                                        </div>

                                        <div class="grid2">
                                            <span class="bigger-175 blue">12</span>

                                            <br/>
                                            Following
                                        </div>
                                    </div>

                                    <div class="hr hr16 dotted"></div>
                                </div>

                                <div class="col-xs-12 col-sm-9">
                                    <?php if($_SESSION["cargo"] == 'Administrador'){  ?>
                                    <div class="center">
                                        <?php require_once '../modelos/Usuario.php';
                                        $total = new Usuario();
                                        ?>
												<span class="btn btn-app btn-sm btn-light no-hover">
                                                    <?php $reg = $total->admin();
                                                          $numero = mysqli_num_rows($reg); ?>
													<span class="line-height-1 bigger-170 blue"><?php echo $numero ?></span>

													<br/>
													<span class="line-height-1 smaller-90"> Admin </span>
												</span>

                                        <span class="btn btn-app btn-sm btn-yellow no-hover">
                                            <?php $reg = $total->usuario();
                                            $numero = mysqli_num_rows($reg); ?>
													<span class="line-height-1 bigger-170"><?php echo $numero ?></span>

													<br/>
													<span class="line-height-1 smaller-90"> Usuarios </span>
												</span>

                                        <span class="btn btn-app btn-sm btn-pink no-hover">
                                            <?php $reg = $total->pendiente();
                                            $numero = mysqli_num_rows($reg); ?>
													<span class="line-height-1 bigger-170"> <?php echo $numero ?></span>

													<br/>
													<span class="line-height-1 smaller-90"> Pendientes </span>
												</span>

                                        <span class="btn btn-app btn-sm btn-success no-hover">
                                            <?php $reg = $total->Enproceso();
                                            $numero = mysqli_num_rows($reg); ?>
													<span class="line-height-1 bigger-170"> <?php echo $numero ?></span>

													<br/>
													<span class="line-height-1 smaller-90"> Proceso </span>
												</span>

                                        <span class="btn btn-app btn-sm btn-primary no-hover">
                                            <?php $reg = $total->concluido();
                                            $numero = mysqli_num_rows($reg); ?>
													<span class="line-height-1 bigger-170"> <?php echo $numero ?></span>

													<br/>
													<span class="line-height-1 smaller-90"> Concluidos </span>
												</span>
                                        <span class="btn btn-app btn-sm btn-grey no-hover">
                                            <?php $reg = $total->anulado();
                                            $numero = mysqli_num_rows($reg); ?>
													<span class="line-height-1 bigger-170"> <?php echo $numero ?></span>

													<br/>
													<span class="line-height-1 smaller-90"> Anulado </span>
												</span>
                                    </div>
                                    <?php } ?>
                                    <?php if($_SESSION["cargo"] == 'Usuario'){  ?>
                                        <div class="center">
                                            <?php require_once '../modelos/Usuario.php';
                                            $total = new Usuario();
                                            ?>
                                            <span class="btn btn-app btn-sm btn-light no-hover">
                                                    <?php $reg = $total->admin();
                                                    $numero = mysqli_num_rows($reg); ?>
													<span class="line-height-1 bigger-170 blue"><?php echo $numero ?></span>

													<br/>
													<span class="line-height-1 smaller-90"> Admin </span>
												</span>

                                            <span class="btn btn-app btn-sm btn-yellow no-hover">
                                            <?php $reg = $total->usuario();
                                            $numero = mysqli_num_rows($reg); ?>
													<span class="line-height-1 bigger-170"><?php echo $numero ?></span>

													<br/>
													<span class="line-height-1 smaller-90"> Usuarios </span>
												</span>

                                            <span class="btn btn-app btn-sm btn-pink no-hover">
                                            <?php $reg = $total->PendienteU();
                                            $numero = mysqli_num_rows($reg); ?>
													<span class="line-height-1 bigger-170"> <?php echo $numero ?></span>

													<br/>
													<span class="line-height-1 smaller-90"> Pendientes </span>
												</span>

                                            <span class="btn btn-app btn-sm btn-success no-hover">
                                            <?php $reg = $total->EnprocesoU();
                                            $numero = mysqli_num_rows($reg); ?>
													<span class="line-height-1 bigger-170"> <?php echo $numero ?></span>

													<br/>
													<span class="line-height-1 smaller-90"> Proceso </span>
												</span>

                                            <span class="btn btn-app btn-sm btn-primary no-hover">
                                            <?php $reg = $total->ConcluidoU();
                                            $numero = mysqli_num_rows($reg); ?>
													<span class="line-height-1 bigger-170"> <?php echo $numero ?></span>

													<br/>
													<span class="line-height-1 smaller-90"> Concluidos </span>
												</span>
                                            <span class="btn btn-app btn-sm btn-grey no-hover">
                                            <?php $reg = $total->AnuadoU();
                                            $numero = mysqli_num_rows($reg); ?>
													<span class="line-height-1 bigger-170"> <?php echo $numero ?></span>

													<br/>
													<span class="line-height-1 smaller-90"> Anulado </span>
												</span>
                                        </div>
                                    <?php } ?>

                                    <div class="space-12"></div>

                                    <div class="profile-user-info profile-user-info-striped">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> Nombres</div>

                                            <div class="profile-info-value">
                                                <span class="editable" id="username"><?php echo $_SESSION['nombre'] ?></span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> Location</div>

                                            <div class="profile-info-value">
                                                <i class="fa fa-map-marker light-orange bigger-110"></i>
                                                <span class="editable" id="country">Netherlands</span>
                                                <span class="editable" id="city">Amsterdam</span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name">Area ds trabajo</div>

                                            <div class="profile-info-value">
                                                <span class="editable" id="age"><?php echo $_SESSION['area'] ?></span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> Fecha de registro</div>

                                            <div class="profile-info-value">
                                                <span class="editable" id="signup">2019/06/20</span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> Last Online</div>

                                            <div class="profile-info-value">
                                                <span class="editable" id="login">3 hours ago</span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> About Me</div>

                                            <div class="profile-info-value">
                                                <span class="editable" id="about">Editable as WYSIWYG</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="space-20"></div>

                                    <div class="widget-box transparent col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                    </div>

                                    <div class="hr hr2 hr-double"></div>

                                    <div class="space-6"></div>

                                </div>
                            </div>
                        </div>

                        <!-- FIN DEL CONTENIDO DEL PERFIL -->
                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <!--====== INICIO DE MI TABLA DE TODOS LOS REGISTRO DE MIS USUARIOS REGISTRADOS -------=============== -->
                <?php if($_SESSION["cargo"] == 'Administrador'){  ?>
                <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)">Nuevo Usuario</button>
                <div class="row">
                    <div class="col-xs-12">

                        <div class="row">
                            <div class="space-6"></div>

                            <div class="vspace-12-sm"></div>

                        </div><!-- /.row -->


                        <div class="panel-body table-responsive" id="listadoregistros">
                            <table id="tbllistado"
                                   class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                <th>#</th>
                                <th>nombre</th>
                                <th>dni</th>
                                <th>Area</th>
                                <th>email</th>
                                <th>Cargo</th>
                                <th>Login</th>
                                <th>imagen</th>
                                <th>Estado</th>
                                <th></th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- FORMULARIO DE REGISTRO -->
                        <div class="panel-body" style="height: 400px" id="formularioregistro">
                            <form action="" name="formulario" id="formulario" method="POST">
                                <div class="form-group col-lg-12 col-sm-12 col-sm-12 col-xs-12">
                                    <label for="">Nombre(*)</label>
                                    <input type="hidden" name="idusuarios" id="idusuarios">
                                    <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100"
                                           placeholder="Nombre" required>
                                </div>
                                <div class="form-group col-lg-6 col-sm-6 col-sm-6 col-xs-12">
                                    <label for="">DNI(*)</label>
                                    <input type="text" class="form-control" name="dni" id="dni" maxlength="100"
                                           placeholder="dni" required>
                                </div>
                                <div class="form-group col-lg-6 col-sm-6 col-sm-6 col-xs-12">
                                    <label for="">Area Trabajo(*)</label>
                                    <input type="text" class="form-control" name="area" id="area" maxlength="100"
                                           placeholder="Area" required>
                                </div>
                                <div class="form-group col-lg-6 col-sm-6 col-sm-6 col-xs-12">
                                    <label for="">Email(*)</label>
                                    <input type="email" class="form-control" name="email" id="email" maxlength="100"
                                           placeholder="Email" required>
                                </div>
                                <div class="form-group col-lg-6 col-sm-6 col-sm-6 col-xs-12">
                                    <label for="">Tipo Usuario(*)</label>
                                    <select name="cargo" id="cargo" class="form-control">
                                        <option value="Administrador">Administrador</option>
                                        <option value="Usuario">Usuario</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6 col-sm-6 col-sm-6 col-xs-12">
                                    <label for="">Login(*)</label>
                                    <input type="text" class="form-control" id="login" name="login" maxlength="30" placeholder="Login" required>
                                </div>
                                <div class="form-group col-lg-6 col-sm-6 col-sm-6 col-xs-12">
                                    <label for="">Clave(*)</label>
                                    <input type="password" class="form-control" name="clave" id="clave" maxlength="64"
                                           placeholder="Clave" required>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label>Permisos:</label>
                                    <ul style="list-style: none;" id="permisos">
                                    </ul>
                                </div>
                                <div class="form-group col-lg-6 col-sm-6 col-sm-6 col-xs-12">
                                    <label for="">Imagen(*)</label>
                                    <input type="file" class="form-control" name="imagen" id="imagen">
                                    <input type="hidden" name="imagenactual" id="imagenactual">
                                    <img src="" alt="120px" id="imagenmuestra">
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save">
                                            Guardar</i></button>
                                    <button class="btn btn-danger" onclick="cancelarform()" type="button"><i
                                                class="fa fa-arrow-circle-left"> Cancelar</i></button>
                                </div>

                            </form>
                        </div>
                        <!-- FIN DE FORMULARIO DE REGISTRO -->
                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <?php } ?>
                <!--====== FIN DE MI TABLA DE TODOS LOS REGISTRO DE MIS USUARIOS REGISTRADOS -------=============== -->
            </div><!-- /.page-content -->

        </div>
    </div><!-- /.main-content -->

    <?php require "footer.php" ?>
    <script type="text/javascript" src="scripts/usuario.js"></script>

    <?php
}
ob_end_flush();
    ?>