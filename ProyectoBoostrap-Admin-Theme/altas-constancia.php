<?php
    session_start();
    
?>
<!DOCTYPE html>
<html class="no-js" lang="es">

<head>
    <title>Constancias</title>
    <meta charset="utf-8">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
    <link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
    
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> --> 
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> --> 
      <!-- Custom styles for this template -->
    <!--<link href="assets/css/sticky-footer-navbar.css" rel="stylesheet">-->

    <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!-- Scripts PRIPIOS-->
    <script src="js/crud-constancias-nosotras.js"></script>
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->

</head>

<body>

    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="#">Electivas</a>

                <div class="nav-collapse collapse">
                    <ul class="nav pull-right">
                        <li class="dropdown">
                            <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> ALBERTO FLORES GARCIA <i class="caret"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a tabindex="-1" href="#">Perfil</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a tabindex="-1" href="login.html">Cerrar Sesión</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row-fluid">

            <div class="span3" id="sidebar">
                <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                    <li>
                        <a href="dashboard.html"><i class="icon-chevron-right"></i> Inicio</a>
                      </li>
                      <li>
                        <a href="desglose-creditos.html"><i class="icon-chevron-right"></i> Desglose de créditos</a>
                      </li>
                      <li class="active">
                        <a href="altas-constancia.php"><i class="icon-chevron-right"></i> Alta de constancia</a>
                      </li>
                      <li>
                        <a href="login.html"><i class="icon-chevron-right"></i> Salir</a>
                      </li>
                </ul>
            </div>

            <!--/span-->
            <div class="span9" id="content">
                <h2>Constancias</h2>
                <div class="row-fluid">

                    <!-- block -->
                    <div class="block">

                        <div class="navbar navbar-inner block-header">
                            <!-- <div class="muted pull-left">Bootstrap dataTables with Toolbar</div> -->
                            <div class="muted pull-left">
                                <h3>Alta de constancias</h3>
                            </div>
                            <div class="btn-group  pull-right">
                                <a href="#NuevaConstancia" data-toggle="modal"><button class="btn btn-danger">Nueva Constancia <i class="icon-plus icon-white"></i></button></a>
                            </div>
                        </div>

                        <div class="block-content collapse in">
                            <div class="span12">
                                <div class="table-toolbar">
                                    <!-- <div class="btn-group"> -->
                                    <!--  <a href="#"><button class="btn btn-success">Nueva Constancia <i class="icon-plus icon-white"></i></button></a> -->
                                    <!-- </div>  -->
                                    <!-- <div class="btn-group pull-right">
                                         <button data-toggle="dropdown" class="btn dropdown-toggle">Herramientas <span class="caret"></span></button>
                                         <ul class="dropdown-menu">
                                            <li><a href="#">Impresión</a></li>
                                            <li><a href="#">Guardar como PDF</a></li>
                                            <li><a href="#">Exportar a Excel</a></li>
                                         </ul>
                                      </div>  -->
                                </div>

                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 153px;">Nombre de la Actividad
                                            </th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">Fecha
                                            </th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 208px;">Horas
                                            </th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 131px;">Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            //incluimos el fichero de conexion
                                            include_once('php/conexion.php');

                                            $database = new Connection();
                                            $db = $database->open();
                                            try{    
                                                $sql = 'SELECT * FROM constancia';
                                               
                                                foreach ($db->query($sql) as $row) {
                                                    ?>
                                                    <tr>
                                                        
                                                        <td><?php echo $row['actividad']; ?></td>
                                                        <td><?php echo $row['fecha_inicio']; ?></td>
                                                        <td><?php echo $row['horas']; ?></td>
                                                        <td>
                                                        <a href="#Actualizar" data-toggle="modal"><button class="btn btn-primary"><i class="icon-pencil icon-white"></i></button></a>
                                                        <a href="#Eliminar" data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-white"></i></a>
                                                            <!--<a href="#ActualizarConstancia" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Editar</a>
                                                            <a href="#Eliminar_<?php// echo $row['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Borrar</a>
                                                            */
                                                        </td>
                                                        
                                                    </tr>
                                                    <?php 
                                                }
                                            }
                                            catch(PDOException $e){
                                                echo "Hubo un problema en la conexión: " . $e->getMessage();
                                            }

                                            //Cerrar la Conexion
                                            $database->close();

                                        ?>
                                        <!--<tr class="gradeA odd">
                                            <td class="  sorting_1">Curso de Android</td>
                                            <td class=" ">23-12-2020</td>
                                            <td class=" "> 20</td>
                                            <td class="center">-->
                                        <!-- Botones Actualizar/Eliminar ---------------->
                                        <!--<a href="#Actualizar" data-toggle="modal" class="btn btn-primary"><i class="icon-pencil icon-white"></i></a>
                                                <a href="#Eliminar" data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-white"></i></a>
                                            </td>
                                        </tr>
                                        <tr class="gradeA odd">
                                            <td class=" sorting_1">Curso de Android</td>
                                            <td> 23-12-2020</td>
                                            <td> 20</td>
                                            <td class="center">-->
                                        <!-- Botones Actualizar/Eliminar ---------------->
                                        <!--<button class="btn btn-primary"><i class="icon-pencil icon-white"></i></button> -->
                                        <!--<a href="#Actualizar" data-toggle="modal" class="btn btn-primary"><i class="icon-pencil icon-white"></i></a>
                                                <a href="#Eliminar" data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-white"></i></a>
                                            </td>

                                        </tr>

                                        <tr class="gradeA odd">
                                            <td class=" sorting_1">Curso de Flutter</td>
                                            <td> 16-09-2020</td>
                                            <td> 30</td>
                                            <td>-->
                                        <!-- Validado ---------------->
                                        <!--<span class="label label-success" style="height: .5cm; width: 2cm; text-align: center;">Validada</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Curso de Read Native</td>
                                            <td>16-09-2020</td>
                                            <td>30</td>
                                            <td>-->
                                        <!-- Rechazado ---------------->
                                        <!--<a class="label label-important tooltip-top" data-original-title="La constancia no especifica horas." style="height: .5cm; width: 2cm; text-align: center;">Rechazada</a>
                                            </td>
                                        </tr>-->

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /block -->
                </div>
            </div>
        </div>
        <hr>
        <!-- <footer>
                <p>&copy; Vincent Gabriel 2013</p>
            </footer> -->
    </div>
    <!--/.fluid-container-->

    <!----------------------------------------------- INICIO DE LOS MODALES ----------------------------------------------->

    <!-- -------------------- MODAL ACTUALIZAR LA CONSTANCIA -->
    <div id="Actualizar" class="modal hide" aria-hidden="true" style="display: none;">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h3>Actualizar Constancia</h3>
        </div>
        <div class="modal-body">
            <!-- INICIA FORMULARIO DE EDICIÓN --------------------------------------------- -->
            <!-- validation -->
            <div class="row-fluid">
                <!-- BEGIN FORM
                        <form action="#" id="form_sample_1" class="form-horizontal">-->
                <form id="FormularioEditarConstancia" method="post" action="dist/rest/editaDenominacion.php?opc=6&i=<?php echo $fila["id"][$i]?>">>
                    <fieldset>
                        <div class="alert alert-error hide">
                            <button class="close" data-dismiss="alert"></button> Tienes errores o no has completado campos requeridos. Por favor revisa nuevamente.
                        </div>
                        <div class="alert alert-success hide">
                            <button class="close" data-dismiss="alert"></button> ¡Actualización Exitosa!
                        </div>
                        <div class="control-group">
                            <label class="control-label"><b>Nombre de la actividad</b><span class="required">*</span></label>
                            <div class="controls">
                                <input type="text" name="name" data-required="1" class="span12 m-wrap" />
                            </div>
                        </div>
                        <div class="control-group span6">
                            <label class="control-label"><b>Fecha de inicio</b><span class="required">*</span></label>
                            <div class="controls">
                                <input name="text" type="date" class=" m-wrap" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><b>Fecha de termino</b><span class="required">*</span></label>
                            <div class="controls">
                                <input name="text" type="date" class=" m-wrap" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><b>Horas</b><span class="required">*</span></label>
                            <div class="controls">
                                <input name="text" type="number" class="span3 m-wrap" />
                            </div>
                        </div>
                        <fieldset>
                            <div class="control-group controls">
                                <label class="control-label" for="fileInput"><b>Archivo (solo una constancia y en .pdf)</b><span class="required">*</span></label>
                                <div class="controls">
                                    <div class="uploader" id="uniform-fileInput">
                                        <input class="input-file uniform_on" id="fileInput" type="file">
                                        <span class="filename" style="user-select: none;"></span></span>
                                        <span class="action" style="user-select: none;"></span>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <div class="control-group">
                            <label class="control-label"><b>Observaciones</b><span class="required">*</span></label>
                            <div class="controls">
                                <!--<input type="text" size="15" maxlength="30" name="name" data-required="1" class="span6 m-wrap"/>-->
                                <textarea class="span12" align="center"> Ingrese las observaciones que considere necesarias </textarea>
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
            <!-- FINALIZA FORMULARIO DE EDICIÓN ------------------------------------------- -->
        </div>
        <div class="modal-footer">
            <a data-dismiss="modal" class="btn" href="#">Cancelar</a>
            <a data-dismiss="modal" class="btn btn-success" href="#" onclick="ActionUpdate();">Actualizar</a>
        </div>
    </div>
    <!-- FIN DE LA VENTANA EMERGENTE ACTUALIZAR LA CONSTANCIA -->

    <!-- VENTANA EMERGENTE PARA CONFIRMAR LA ELIMINACIÓN -->
    <div id="Eliminar" class="modal hide" aria-hidden="true" style="display: none;">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h3>Eliminar Constancia</h3>
        </div>
        <div class="modal-body">
            <p>¿Está seguro que desea eliminar este curso?</p>
        </div>
        <div class="modal-footer">
            <a data-dismiss="modal" class="btn" href="#">Cancelar</a>
            <a data-dismiss="modal" class="btn btn-success" href="bajasConstancia.php">Confirmar</a>
        </div>
    </div>
    <!-- FIN DE LA VENTANA EMERGENTE -->

    <!-- INICIO del modal "NUEVA CONSTANCIA"--------------------------------------------------------- -->
    <div id="NuevaConstancia" class="modal hide">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h3>Subir Constancia</h3>
        </div>
        <div class="modal-body">
            <!-- CONTENIDO FORMULARIO -->

            <!-- validation -->
            <div class="row-fluid">
                <!-- block -->
                <!--<div class="block">
                        <div class="block-content collapse in">-->
                <!--<div class="span20">-->

                <!-- BEGIN FORM
                                <form action="#" id="form_sample_1" class="form-horizontal">-->
                <form role="form" id="AltaConstancia" method="POST" action="altaConstancia.php">
                    <!-- <form action="php/crud-denominacion.php" method="POST" > -->
                    <fieldset>
                        <div class="alert alert-error hide">
                            <button class="close" data-dismiss="alert"></button> Tienes errores o no has completado campos requeridos. Por favor revisa nuevamente.
                        </div>
                        <div class="alert alert-success hide">
                            <button class="close" data-dismiss="alert"></button> Registro Exitoso!
                        </div>


                        <table>
                            <tr>
                                <!--Herraminetas y Nueva Constancia -->
                                <div class="table-toolbar">
                                    <div class="btn-group">
                                        <button data-toggle="dropdown" class="btn dropdown-toggle">Herramientas <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Impresión</a></li>
                                            <li><a href="#">Guardar como PDF</a></li>
                                            <li><a href="#">Exportar a Excel</a></li>
                                        </ul>
                                    </div>
                                    <!-- <div class="btn-group pull-right"> -->
                                    <!-- ya lo puse en la lìnea 114-->
                                    <!--<a href="#NuevaConstancia" data-toggle="modal"><button class="btn btn-success" style="height: 1cm;">Nueva Constancia <i class="icon-plus icon-white"></i></button></a>-->
                                </div>
                                </div>
                            </tr>

                            <tr>
                                <div class="control-group">
                                    <label class="control-label"><b>Nombre de la actividad</b><span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="actividad_create" type="text" name="name" data-required="1" class="span12 m-wrap" />
                                    </div>
                                </div>
                            </tr>
                            <tr>

                                <div class="control-group span6">
                                    <label class="control-label"><b>Fecha de inicio</b><span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="fechaInicio_create" name="text" type="date" class=" m-wrap" />
                                    </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label"><b>Fecha de fin</b><span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="fechaFin_create" name="text" type="date" class=" m-wrap" />
                                    </div>
                                </div>

                                </tr>
                                <tr>
                                    <div class="control-group">
                                        <label class="control-label"><b>Horas</b><span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="horas_create" name="text" type="number" class="span3 m-wrap" />
                                        </div>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="control-group controls">
                                        <label class="control-label" for="fileInput"><b>Archivo (solo una constancia y en .pdf)</b><span class="required">*</span></label>
                                        <div class="controls">
                                            <div class="uploader" id="uniform-fileInput">
                                                <input id="archivo_create" class="input-file uniform_on" id="fileInput" type="file">
                                                <span class="filename" style="user-select: none;"></span>
                                                <span class="action" style="user-select: none;"></span>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                <div class="control-group">
                                    <label class="control-label"><b>Observaciones</b><span class="required">*</span></label>
                                    <div class="controls">
                                        <!--<input type="text" size="15" maxlength="30" name="name" data-required="1" class="span6 m-wrap"/>-->
                                        <textarea id="observaciones_create" class="span12" align="center"> Ingrese las observaciones que considere necesarias </textarea>
                                    </div>
                                </div>


                                </fieldset>
                                </table>
                                <div class="modal-footer">
                                    <a data-dismiss="modal" class="btn btn-success" href="#" onclick="ActionCreate();">Guardar</a>
                                    <a data-dismiss="modal" class="btn" href="#">Cancelar</a>
                                </div>
                                </form>

            <!-- END FORM-->
            <!--</div>-->
            <!--</div>
                    </div>-->
            <!-- /block -->
        </div>
        <!-- /validation -->
        <!-- -->
    </div>
    <!-- FIN del modal "NUEVA CONSTANCIA" -->

    <!----------------------------------------------- FIN DE LOS MODALES ----------------------------------------------->

    <script src="vendors/jquery-1.9.1.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>

    <script src="assets/scripts.js"></script>
    <script src="assets/DT_bootstrap.js"></script>

    <!-- Librerias de AJAX y JS
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

    <!--Se agrego este scrip de interfaces.html para que funcionara el tooltip-->
    <script>
        $(function() {
            $('.tooltip').tooltip();
            $('.tooltip-left').tooltip({
                placement: 'left'
            });
            $('.tooltip-right').tooltip({
                placement: 'right'
            });
            $('.tooltip-top').tooltip({
                placement: 'top'
            });
            $('.tooltip-bottom').tooltip({
                placement: 'bottom'
            });

            $('.popover-left').popover({
                placement: 'left',
                trigger: 'hover'
            });
            $('.popover-right').popover({
                placement: 'right',
                trigger: 'hover'
            });
            $('.popover-top').popover({
                placement: 'top',
                trigger: 'hover'
            });
            $('.popover-bottom').popover({
                placement: 'bottom',
                trigger: 'hover'
            });

            $('.notification').click(function() {
                var $id = $(this).attr('id');
                switch ($id) {
                    case 'notification-sticky':
                        $.jGrowl("Stick this!", {
                            sticky: true
                        });
                        break;

                    case 'notification-header':
                        $.jGrowl("A message with a header", {
                            header: 'Important'
                        });
                        break;

                    default:
                        $.jGrowl("Hello world!");
                        break;
                }
            });
        });
    </script>

    <!--<script>  
$(document).ready(function(){
 $('#AltaConstancia').on("submit", function(event){  
  event.preventDefault();  
  if($('#name').val() == "")  
  {  
   alert("Name is required");  
  }  
  else if($('#address').val() == '')  
  {  
   alert("Address is required");  
  }  
  else if($('#designation').val() == '')
  {  
   alert("Designation is required");  
  }
   
  else  
  {  
   $.ajax({  
    url:"insertar.php",  
    method:"POST",  
    data:$('#AltaConstancia').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#AltaConstancia')[0].reset();  
     $('#NuevaConstancia').modal('hide');  
     $('#example2').html(data);  
    }  
   });  
  }  
 });



 $(document).on('click', '.view_data', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
   url:"VistaPrevia.php",
   method:"POST",
   data:{personal_id:personal_id},
   success:function(data){
    $('#personal_detalles').html(data);
    $('#dataModal').modal('show');
   }
  });
 });
});  
 </script>
-->
</body>

</html>