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
                <a href="#modal-form" class="btn btn-success" data-toggle="modal">Nuevo Usuario</a>
                <div class="row">
                    <div class="col-xs-12">

                        <div class="row">
                            <div class="space-6"></div>

                            <div class="vspace-12-sm"></div>

                        </div><!-- /.row -->


                        <div class="panel-body table-responsive" id="listadoregistro">
                            <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                <th>#</th>
                                <th>nombre</th>
                                <th>dni</th>
                                <th>are de trabajo</th>
                                <th>email</th>
                                <th>Cargo</th>
                                <th>Login</th>
                                <th>imagen</th>
                                <th>Condición</th>
                                <th></th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-body" style="height: 400px" id="formularioregistro">
                            aqui va el form
                        </div>
                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

<?php require"footer.php" ?>

    <script type="text/javascript" src="scripts/usuario.js"></script>
<!-- INICIO DEL MODAL PARA REGISTRAR UN USUARIO -->
<div id="modal-form" class="modal fade">

    <div class="modal-dialog modal-content">

        <div class="modal-header" style="border: 1px solid #eee">
            <button type="button" class="close" data-dismiss="modal">X</button>
            <h3 class="modal-title">Registrar Nuevo Usuario </h3>
        </div>
        <div class="modal-body" style="border: 1px solid #eee" id="fomulario">

            <form style="padding: 0px 10px" method="post" enctype="multipart/form-data">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    Nombre:
                    <input name="nombre" type="text" placeholder="Ingrese su nombre.." class="form-control" required>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    DNI:
                    <input name="dni" type="text" placeholder="Ingrese su número de DNI.." class="form-control" required>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    Area de trabajo:
                    <input name="area" type="text" placeholder="Ingrese su areade trabajo" class="form-control" required>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    Cargo:
                    <select name="cargo" id="" class="form-control">
                        <option value="Administrador">Administrador</option>
                        <option value="Usuario">Usuario</option>
                    </select>
                </div>

                <input type="hidden" name="txtId" value="">

                <div class="form-group">
                    &par;
                </div>

                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal">
                        <i class="ace-icon fa fa-times"></i>
                        Cancel
                    </button>

                    <button class="btn btn-sm btn-success">
                        <i class="ace-icon fa fa-check"></i>
                        Agregar
                    </button>
                </div>

            </form>
        </div>
    </div>
</div><!-- PAGE CONTENT ENDS -->
<!-- FIN DEL MODAL REGISTRAR USUARIO-->




