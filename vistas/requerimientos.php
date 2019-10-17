<?php
//Activamos el almacenamiento buffer
ob_start();
session_start();

if (!isset($_SESSION['nombre']))
{
    header("location: login.html");
}else {

 require "header.php";

    if ($_SESSION['cargo']=='Administrador')
    {
        header("location: administrador.php");
    }
    if ($_SESSION["requerimientos"]==1) {

        ?>

        <div class="main-content">
            <div class="main-content-inner">
                <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="ace-icon fa fa-home home-icon"></i>
                            <a href="#">Escritorio</a>
                        </li>
                        <li class="active">Dashboard</li>
                    </ul><!-- /.breadcrumb -->
                </div>

                <div class="page-content">

                    <div class="box-header with-border">
                        <h1 class="box-title"> <button class="btn btn-pink" onclick="mostrarform(true)">
                                <i class="fa fa-plus-circle"></i> Requerimiento</button>
                        </h1>
                    </div>
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
                                    <th>Problema</th>
                                    <th>Tipo Problema</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>

                            </div>

                            <!-- INICIO DEL MODAL PARA actualizar -->
                            <div id="modal-edit" class="modal fade">
                                <div class="modal-dialog modal-content">

                                    <div class='widget-header widget-header-small'><h4 class='smaller'><i class='ace-icon fa fa-check'></i> Actualizar Requerimiento</h4></div>
                                    <div class="modal-body" style="border: 1px solid #eee">
                                        <form id="formularioEdit" style="padding: 0px 10px" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="idconsulta" id="idconsulta">
                                            <div class="form-group">
                                                Máquina:
                                                <input name="problema" id="problema" type="text"  class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                Tipo de Problema:
                                                <input name="tipo_problema" id="tipo_problema" type="text"  class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                Estado:
                                                <select name="estado" class="form-control" id="estado" required>
                                                    <option value="Urgente">Urgente</option>
                                                    <option value="No urgente">No urgente</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-sm" data-dismiss="modal">
                                                    <i class="ace-icon fa fa-times"></i>
                                                    Cancel
                                                </button>

                                                <button type="submit" class="btn btn-sm btn-success" aria-label="Close" id="btnGuardarEdit">
                                                    <i class="ace-icon fa fa-check"></i>
                                                    Guardar
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- PAGE CONTENT ENDS -->
                            <!-- FIN DEL MODAL ACTUALIZAR-->
                            <!-- FIN DE FORMULARIO DE REGISTRO -->
                            <!-- PAGE CONTENT ENDS -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <!-- INICIO DEL MODAL PARA REGISTRAR REGISTRAR NUEVO REQUERIMIENTO -->
                    <div id="modal-registro" class="modal fade">
                        <div class="modal-dialog modal-content">

                            <div class='widget-header widget-header-small'><h4 class='smaller'><i class='ace-icon fa fa-check'></i> Nuevo Requerimiento</h4></div>
                            <div class="modal-body" style="border: 1px solid #eee">
                                <form id="formularioReg" style="padding: 0px 10px" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        Máquina:
                                        <input name="problema" id="problema" type="text"  class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        Tipo de Problema:
                                        <input name="tipo_problema" id="tipo_problema" type="text"  class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        Estado:
                                        <select name="estado" class="form-control" id="estado" required>
                                            <option value="No urgente">No Urgente</option>
                                            <option value="Urgente">Urgente</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-sm" data-dismiss="modal">
                                            <i class="ace-icon fa fa-times"></i>
                                            Cancel
                                        </button>

                                        <button type="submit" class="btn btn-sm btn-success" aria-label="Close" id="btnGuardarReg">
                                            <i class="ace-icon fa fa-check"></i>
                                            Guardar
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div><!-- PAGE CONTENT ENDS -->
                    <!-- FIN DEL MODAL REGISTRAR REGISTRAR NUEVO REQUERIMIENTO-->
                </div><!-- /.page-content -->
            </div>
        </div><!-- /.main-content -->

        <?php
    }
    else
    {
        require "noacceso.php";
    }


        require"footer.php" ?>
    <script type="text/javascript" src="scripts/consulta.js"></script>
    <?php
}
ob_end_flush();
?>


