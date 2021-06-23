<?php
    session_start();
    
?>
<!DOCTYPE html>
<html class="no-js" lang="es">

<head>
    <title>Validar Constancias</title>
    <meta charset="utf-8">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
    <link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="vendors/flot/excanvas.min.js"></script><![endif]-->
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!-- CSS propio -->
    <!--<link rel="stylesheet" type="text/css" href="assets/ToValidar.css">-->


    <!--<style >
        .modal 
        {
            width: 575px;
            left: 50%;
            transform:translateY(-20%);
            transform:translateX(-20%);
        }
    </style>-->

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
                            <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> Administrador <i class="caret"></i>
                            </a>
                            <ul class="dropdown-menu">
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
                    <li class="active">
                        <a href="validar-constancia.php"><i class="icon-chevron-right"></i> Validar Constancias</a>
                    </li>
                    <li>
                        <a href="altas-denominacion.php"><i class="icon-chevron-right"></i> Denominacion Electivas</a>
                    </li>
                    <li>
                        <a href="login.html"><i class="icon-chevron-right"></i> Salir</a>
                    </li>
                </ul>
            </div>
        
    

    <!-----------------INICIO DATATABLE--------------------------------------------------------------------------->
                        <div class="span9">
                            <h2>Validar Constancias</h2>
                        </div>
                        <div class="block span9">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Validar Constancias</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="table-toolbar">

                                      <!--<div class="btn-group">
                                         <a href="#"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>-->

                                    <div class="btn-group pull-left">
                                        <button data-toggle="dropdown" class="btn dropdown-toggle">Herramientas <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                        <li><a href="#">Imprimir</a></li>
                                        <li><a href="#">Guardar como PDF</a></li>
                                        <li><a href="#">Exportar a Excel</a></li>
                                        </ul>
                                    </div>

                                      <!--<div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="span6"><div id="example2_length" class="dataTables_length"><label><select size="1" name="example2_length" aria-controls="example2"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> records per page</label></div></div>-->

                                    <div class="span9">
                                        <div class="dataTables_filter pull-right" id="example2_filter">                    
                                            <label>Buscar: <input type="text" aria-controls="example2"></label>
                                        </div>
                                    </div>

                                    <!---------------------------- INICIA LA TABLA -------------------------------------->
                                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example2" aria-describedby="example2_info">

                                        <!-- -------------------- ENCABEZADOS TABLA ------------------------------------->
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 154px;">
                                                    Programa Académico
                                                </th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">
                                                    Nombre
                                                </th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 208px;">
                                                    Actividad
                                                </th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 131px;">
                                                    Horas
                                                </th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 94px;">
                                                    Acciones
                                                </th>
                                            </tr>
                                        </thead>


                                        <!-------------------------- CONTENIDO TABLA ------------------------------------>
                                        <!--<tbody role="alert" aria-live="polite" aria-relevant="all">-->

                                        <?php
                                            //incluimos el fichero de conexion
                                            include_once('php/conexion.php');
                                            //$link=Conectar();
                                            
                                                    //$conectar=mysql_connect('localhost','root','');
                                                    //mysql_select_db('electivas',$conectar);
                                                
                                                    //  Consulta de Mysql donde haremos consultas con INNER JOIN
                                                    //$mi_consulta="SELECT alumno.programa, alumno.nombre, constancia.actividad, constancia.hora FROM alumno INNER JOIN constancias ON constancias.id_alumno=alumno.id";
                                                    //$resultado=mysql_query($mi_consulta,$conectar);

                                                    /*while ($dato=mysql_fetch_array($resultado))
                                                    {	
                                                        echo"<tbody role='alert' aria-live='polite' aria-relevant='all'>";
                                                        echo"<tr>";
                                                       
                                                        echo"<td>".$dato['programa']."</td>";
                                                        echo"<td>".$dato['nombre']."</td>";
                                                        echo"<td>".$dato['actividad']."</td>";
                                                        echo"<td>".$dato['horas']."</td>";
                                                        echo "<td>";
                                                                echo "<a href='#Actualizar' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Editar</a>";
                                                                echo "<a href='#Eliminar' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Borrar</a>";
                                                                echo "</td>";
                                                        echo"</tr>";
                                                        echo"  </tbody>";
                                                    }*/
                                                    $database = new Connection();
                                                    $db = $database->open();
                                                    try{    
                                                        $sql = 'SELECT * FROM constancia';
                                                        foreach ($db->query($sql) as $row) {
                                                            ?>
                                                            <tr>

                                                                <<td><?php echo "Ingenieria Mecatronica"; ?></td>
                                                                <td><?php echo $row['alumno_id']; ?></td>
                                                                <td><?php echo $row['actividad']; ?></td>
                                                                <td><?php echo $row['horas']; ?></td>
                                                                <td>
                                                                <a href="#Validar" data-toggle="modal" class="btn btn-danger">Validar</a>
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

                                                <!--</table>-->

                                
                                            

                                            <!-- PRIMER REGISTRO EJEMPLO -->
                                            <!-- <tr class="gradeA odd">
                                                <td class="  sorting_1">Gecko</td>
                                                <td class=" ">Firefox 1.0</td>
                                                <td class=" ">Win 98+ / OSX.2+</td>
                                                <td class="center ">1.7</td>
                                                <td class="center ">
                                                    <a href="#Validar" data-toggle="modal" class="btn btn-danger">Validar</a>
                                                </td>
                                            </tr> -->
                                        
                                        <!--
                                            <tr class="gradeA even">
                                                <td class="  sorting_1">Gecko</td>
                                                <td class=" ">Firefox 1.5</td>
                                                <td class=" ">Win 98+ / OSX.2+</td>
                                                <td class="center ">1.8</td>
                                                <td class="center ">A</td>
                                            </tr><tr class="gradeA odd">
                                                <td class="  sorting_1">Gecko</td>
                                                <td class=" ">Firefox 2.0</td>
                                                <td class=" ">Win 98+ / OSX.2+</td>
                                                <td class="center ">1.8</td>
                                                <td class="center ">A</td>
                                            </tr><tr class="gradeA even">
                                                <td class="  sorting_1">Gecko</td>
                                                <td class=" ">Firefox 3.0</td>
                                                <td class=" ">Win 2k+ / OSX.3+</td>
                                                <td class="center ">1.9</td>
                                                <td class="center ">A</td>
                                            </tr><tr class="gradeA odd">
                                                <td class="  sorting_1">Gecko</td>
                                                <td class=" ">Camino 1.0</td>
                                                <td class=" ">OSX.2+</td>
                                                <td class="center ">1.8</td>
                                                <td class="center ">A</td>
                                            </tr><tr class="gradeA even">
                                                <td class="  sorting_1">Gecko</td>
                                                <td class=" ">Camino 1.5</td>
                                                <td class=" ">OSX.3+</td>
                                                <td class="center ">1.8</td>
                                                <td class="center ">A</td>
                                            </tr><tr class="gradeA odd">
                                                <td class="  sorting_1">Gecko</td>
                                                <td class=" ">Netscape 7.2</td>
                                                <td class=" ">Win 95+ / Mac OS 8.6-9.2</td>
                                                <td class="center ">1.7</td>
                                                <td class="center ">A</td>
                                            </tr><tr class="gradeA even">
                                                <td class="  sorting_1">Gecko</td>
                                                <td class=" ">Netscape Browser 8</td>
                                                <td class=" ">Win 98SE+</td>
                                                <td class="center ">1.7</td>
                                                <td class="center ">A</td>
                                            </tr><tr class="gradeA odd">
                                                <td class="  sorting_1">Gecko</td>
                                                <td class=" ">Netscape Navigator 9</td>
                                                <td class=" ">Win 98+ / OSX.2+</td>
                                                <td class="center ">1.8</td>
                                                <td class="center ">A</td>
                                            </tr><tr class="gradeA even">
                                                <td class="  sorting_1">Gecko</td>
                                                <td class=" ">Mozilla 1.0</td>
                                                <td class=" ">Win 95+ / OSX.1+</td>
                                                <td class="center ">1</td>
                                                <td class="center ">A</td>
                                            </tr>-->

                                        <<!--/tbody>-->
                                    </table>
                                    <div class="row">
                                        <div class="span6">
                                            <div class="dataTables_info" id="example2_info">
                                                 1 a 10 de 50 registros
                                            </div>
                                        </div>
                                        <div class="span6">
                                            <div class="dataTables_paginate paging_bootstrap pagination">
                                                <ul>
                                                    <li class="prev disabled"><a href="#">← Anterior</a></li>
                                                    <li class="active"><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li><li><a href="#">3</a></li>
                                                    <li><a href="#">4</a></li><li><a href="#">5</a></li>
                                                    <li class="next"><a href="#">Siguiente → </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    <!-------------------FIN DATATABLE---------------------------------------------------------------------------->

    <!-- ----------------CONTENIDO DEL MODAL "Validar constancia"------------------------------------------------->
                    <div id="Validar" class="modal hide">
                        <div class="modal-header">
                            <button data-dismiss="modal" class="close" type="button">×</button>
                            <h4>Validar Constancia de (llamar el nombre del alumno)</h4>
                        </div>
                        <div class="modal-body">
                            <!-- CONTENIDO FORMULARIO -->
                            <!-- validation -->
                            <div class="row-fluid">
                                            <form action="#" class="span12">
                                                <fieldset>
                                                    <div class="alert alert-error hide">
                                                        <button class="close" data-dismiss="alert"></button>
                                                        No se ha validado.
                                                    </div>
                                                    <div class="alert alert-success hide">
                                                        <button class="close" data-dismiss="alert"></button>
                                                        Validacion completada!
                                                    </div>

                                        <!-- INICIA LA TABLA ---------------------------------------------------------------->
                                            <!-- INICIA LO QUE DEBE IR EN EL DIV CON AZULITO ARRIBA ------------------------->
                                            <table>
                                                <tr>
                                                    <td colspan="3">
                                                            <div class="control-group">
                                                                <label class="control-label"><b>Nombre de la actividad</b></label>
                                                                    <input type="text" name="name" data-required="1" class="span12" value="Curso de Android" readonly=""/>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <!--<div class="control-group">-->
                                                            <label class="control-label"><b>Fecha de inicio</b><span class="required">*</span></label>
                                                            <div class="controls">
                                                                <input id="fechaInicio_create" name="text" type="date" class=" m-wrap span10" readonly="" />
                                                            </div>
                                                        <!--</div>-->
                                                    </td>
                                                    <td>
                                                        <!--<div class="control-group">-->
                                                            <label class="control-label"><b>Fecha de fin</b><span class="required">*</span></label>
                                                            <div class="controls">
                                                                <input id="fechaFin_create" name="text" type="date" class=" m-wrap span10" readonly="" />
                                                            </div>
                                                        <!--</div>-->
                                                    </td>
                                                    <td>
                                                        <!--<div class="control-group">-->
                                                            <label class="control-label"><b>Horas</b><span class="required">*</span></label>
                                                            <div class="controls">
                                                                <input id="horas_create" name="text" type="number" class=" m-wrap span10" readonly="" />
                                                            </div>
                                                        <!--</div>-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                       <div class="control-group span12">
                                                            <label class="control-label"><b>Observaciones</b><span class="required">*</span></label>
                                                            <div class="controls">
                                                                <textarea class="span12" align="center" readonly=""> Observaciones del alumno </textarea>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- TERMINA LO QUE DEBE IR EN EL DIV CON AZULITO ARRIBA ------------------------->
                                                <tr>
                                                    <td colspan="3">
                                                        <hr>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                            <div class="control-group">
                                                                <label class="control-label" for="fileInput"><b>Mostrar Archivo</b></label>
                                                                <a href="#MostrarArchivo" data-toggle="modal"><button class="btn btn-warning span6"><i class=" icon-zoom-in"></i></button></a>
                                                              
                                                              <!-- INICO MODAL QUE MUESTRA EL ARCHIVO ------------------------------------------->
                                                                <div id="MostrarArchivo" class="modal hide">
                                                                    <div class="controls">
                                                                        <div class="modal-header"> 
                                                                            <h4 class="modal-title">
                                                                                Constancia: (llamar nombre archivo)<br>
                                                                                Horas: (llamar horas que contiene) 
                                                                            </h4>
                                                                            <button type="button" class="close"  data-didmiss="modal" aria-label="close"><samp aria-hidden="true">&times;</samp></button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <embed src="" type="application/pdf" width="100" height="500"></embed>
                                                                        </div>
                                                                            <div class="modal-footer alin=right">
                                                                                <button type="button" class="btn btn-warning" data-dismiss="modal" >Cerrar</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <!-- FIN MODAL QUE MUESTRA EL ARCHIVO ------------------------------------------->
                                                            </div> 
                                                    </td>                
                                                    <td>
                                                            <!--<div class="control-group span3">-->
                                                            <div class="form-group">
                                                                <label class="control-label"><b>Constancias Validas</b><span class="required">*</span></label>
                                                                <div class="btn-group">
                                                                    <button class="btn">Seleccionar</button>
                                                                    <button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
                                                                        <ul class="dropdown-menu">
                                                                            <li><a href="#">Seleccionar</a></li>
                                                                            <li><a href="#">1</a></li>
                                                                            <li><a href="#">2</a></li>
                                                                        </ul>
                                                                </div>
                                                            </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                       <div class="control-group pull-left">
                                                            <!--<div class="form-group">-->
                                                                <label class="control-label"><b>Denominación</b><span class="required">*</span></label>
                                                                <div class="btn-group">
                                                                    <button class="btn">Seleccionar</button>
                                                                    <button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a href="#">Seleccionar</a></li>
                                                                        <li><a href="#">Escolarizada</a></li>
                                                                        <li><a href="#">No Escolarizada</a></li>
                                                                    </ul>
                                                                </div>
                                                            <!--</div>-->
                                                        </div>   
                                                    </td>
                                                    <td>
                                                        <div class="control-group">
                                                            <!--<div class="form-group">-->
                                                                <label class="control-label"><b>Modalidad</b><span class="required">*</span></label>
                                                                <div class="btn-group">
                                                                    <button class="btn">Seleccionar</button>
                                                                    <button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a href="#">Seleccionar</a></li>
                                                                        <li><a href="#">Escolarizada</a></li>
                                                                        <li><a href="#">No Escolarizada</a></li>
                                                                    </ul>
                                                                </div>
                                                            <!--</div>-->
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                       <div class="control-group span12">
                                                            <label class="control-label"><b>Observaciones</b><span class="required">*</span></label>
                                                            <div class="controls">
                                                                <textarea class="span12" align="center">Observaciones del docente </textarea>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                    
                                                    </fieldset>
                                                </table>
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
                        <div class="modal-footer">
                            <div class="pull-left">
                                <a data-dismiss="modal" class="btn" href="#">Cancelar</a>
                            </div>
                            <div class="pull-right">
                                <a data-dismiss="modal" class="btn btn-success" href="AltaConstancia.php">Guardar</a>
                            </div>

                            
                        </div>
                    </div>

        <!-- FIN CONTENIDO DEL MODAL -->
                                                
                </div>
            </div>
        </div>
        <!-- FIN DE BOTÔN VALIDAR CONSTANCIA -->

                   
            </div>
            <hr>
           <!-- PIE DE PÁGINA-->
           <!--
           <footer>
                <p>&copy; Vincent Gabriel 2013</p>
            </footer> 
            -->
        </div>
        <!--/.fluid-container-->

        <!-- BOTON DE ALERTA PARA EL CUADRO DE DIALOGO EMERGENTE -->
        <script src="vendors/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/jGrowl/jquery.jgrowl.js"></script>
        <script src="assets/scripts.js"></script>

        <script src="vendors/jquery-1.9.1.min.js"></script>
        
        <script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        
        <script>
        $(function() {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        });
        </script>
        <script>
         /*$(function() {
           
            $('.tooltip').tooltip();    
            $('.tooltip-left').tooltip({ placement: 'left' });  
            $('.tooltip-right').tooltip({ placement: 'right' });    
            $('.tooltip-top').tooltip({ placement: 'top' });    
            $('.tooltip-bottom').tooltip({ placement: 'bottom' });

            $('.popover-left').popover({placement: 'left', trigger: 'hover'});
            $('.popover-right').popover({placement: 'right', trigger: 'hover'});
            $('.popover-top').popover({placement: 'top', trigger: 'hover'});
            $('.popover-bottom').popover({placement: 'bottom', trigger: 'hover'});

            $('.notification').click(function() {
                var $id = $(this).attr('id');
                switch($id) {
                    case 'notification-sticky':
                        $.jGrowl("Stick this!", { sticky: true });
                    break;

                    case 'notification-header':
                        $.jGrowl("A message with a header", { header: 'Important' });
                    break;

                    default:
                        $.jGrowl("Hello world!");
                    break;
                }
            });
        }); */
        </script>
    </body>

</html>