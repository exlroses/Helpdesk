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
                            <a href="administrador.php">Escritorio</a>
                        </li>
                        <li class="active">Concluidos</li>
                    </ul><!-- /.breadcrumb -->
                </div>

                <div class="page-content">


                    <div class="box-header with-border">
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box-header with-border">
                                <h1><a href="administrador.php" class="btn btn-pink"><i class="fa fa-plus-circle"></i> Volver</a></h1>
                            </div>
                            <div class="row">
                                <div class="space-6"></div>

                                <div class="vspace-12-sm"></div>

                            </div><!-- /.row -->


                            <div class="panel-body table-responsive" id="listadoregistros">
                                <table id="tbllistadoAdmin"
                                       class="table table-striped table-bordered table-condensed table-hover">
                                    <thead>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Problema</th>
                                    <th>Tipo Problema</th>
                                    <th>Solución</th>
                                    <th>Modo de Contacto</th>
                                    <th>Tipo de estado</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>

                            </div>

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


