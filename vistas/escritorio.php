<?php require "header.php" ?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Dashboard</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">

						<div class="page-header">
							<h1>
								Dashboard
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									overview &amp; stats............................
								</small>
							</h1>
						</div><!-- /.page-header -->
                        <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)">Nuevo Usuario</button>
						<div class="row">
							<div class="col-xs-12">

								<div class="row">
									<div class="space-6"></div>

									<div class="vspace-12-sm"></div>

								</div><!-- /.row -->

							
                                <div class="panel-body table-responsive" id="listadoregistros">
                                    <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
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
                                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-6 col-sm-6 col-xs-12">
                                            <label for="">DNI(*)</label>
                                            <input type="text" class="form-control" name="dni" id="dni" maxlength="100" placeholder="dni" required>
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-6 col-sm-6 col-xs-12">
                                            <label for="">Area Trabajo(*)</label>
                                            <input type="text" class="form-control" name="area" id="area" maxlength="100" placeholder="Area" required>
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-6 col-sm-6 col-xs-12">
                                            <label for="">Email(*)</label>
                                            <input type="email" class="form-control" name="email" id="email" maxlength="100" placeholder="Email" required>
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-6 col-sm-6 col-xs-12">
                                            <label for="">Cargo(*)</label>
                                            <input type="text" class="form-control" name="cargo" id="cargo" maxlength="100" placeholder="Cargo" required>
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-6 col-sm-6 col-xs-12">
                                            <label for="">Login(*)</label>
                                            <input type="text" class="form-control" name="login" id="login" maxlength="64" placeholder="Login" required>
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-6 col-sm-6 col-xs-12">
                                            <label for="">Clave(*)</label>
                                            <input type="password" class="form-control" name="clave" id="clave" maxlength="64" placeholder="Clave" required>
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
                                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"> Guardar</i></button>
                                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"> Cancelar</i></button>
                                        </div>

                                    </form>
                                </div>
                                <!-- FIN DE FORMULARIO DE REGISTRO -->
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

<?php require"footer.php" ?>

<script type="text/javascript" src="scripts/usuario.js"></script>
