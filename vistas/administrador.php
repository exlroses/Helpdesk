<?php
//Activamos el almacenamiento buffer
ob_start();
session_start();

if (!isset($_SESSION['nombre']))
{
    header("location: login.html");
}else {
    if ($_SESSION['cargo']=='Usuario')
    {
        header("location: requerimientos.php");
    }
    require "header.php";

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
                        <h1><a href="concluidos.php" class="btn btn-pink"><i class="fa fa-plus-circle"></i> Lista de Concluidos</a></h1>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">

                            <div class="row">
                                <div class="space-6"></div>

                                <div class="vspace-12-sm"></div>

                            </div><!-- /.row -->


                            <div class="panel-body table-responsive">
                                <table id="tbllistado"
                                       class="table table-striped table-bordered table-condensed table-hover">
                                    <thead>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Area</th>
                                    <th>Email</th>
                                    <th>Problema</th>
                                    <th>Tipo Problema</th>
                                    <th>Urgencia</th>
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

                                    <div class='widget-header widget-header-small'><h4 class='smaller'><i class='ace-icon fa fa-check'></i> Acciones a tomar</h4></div>
                                    <div class="modal-body" style="border: 1px solid #eee">
                                        <form id="formularioEdit" style="padding: 0px 10px" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="idconsulta" id="idconsulta">
                                            <div class="form-group">
                                                Modo Contácto:
                                                <select name="modo_contacto" class="form-control" id="modo_contacto" required>
                                                    <option value="Personal">Personal</option>
                                                    <option value="Correo">Correo</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                Estado:
                                                <select name="tipo_estado" class="form-control" id="tipo_estado" required>
                                                    <option value="Pendiente">Pendiente</option>
                                                    <option value="En Proceso">En Proceso</option>
                                                    <option value="Ejecutado">Ejecutado</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                Acción a tomar:
                                                <textarea name="solucion" id="solucion" class="form-control" cols="10" ></textarea>
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
    <script type="text/javascript" src="scripts/administrador.js"></script>
    <?php
}
ob_end_flush();
?>


