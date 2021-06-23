<!DOCTYPE html>
<html class="no-js" lang="es">
    
    <head>
        <title>Denominanción de electivas</title>
        <!--Lenguaje ESPAÑOL con caracteres especiales-->
        <meta charset="utf-8">
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="js/crud-denominacion-nosotras.js"></script>
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>

        <style >
        .modal 
        {
            width: 480px;
            /*left: 50%;
            transform:translateY(-20%);
            transform:translateX(-20%);*/
        }
    </style>

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
                    <li>
                        <a href="validar-constancia.php"><i class="icon-chevron-right"></i> Validar Constancias</a>
                    </li>
                    <li class="active">
                        <a href="altas-denominacion.php"><i class="icon-chevron-right"></i> Denominacion Electivas</a>
                    </li>
                    <li>
                        <a href="login.html"><i class="icon-chevron-right"></i> Salir</a>
                    </li>
                </ul>
            </div>

    
    <!-- ---------------------------------------------TABLAS DE CONTENIDO ..................................................... -->
                    <!-- PRIMER TABLA DE CONTENIDO ............................................... -->
                   <!-- </div> _______________________ A Q U I  -->

                   <div class="span9" id="content"> <!-- A Q U I -->

                    <h2>Denominación de electivas</h2>

                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">
                                    <h3>Alta de denominación</h3>
                                </div>
                                <!-- Botón para NUEVA DENOMINACION -->
                                    <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#NuevaDenominacion">
                                Nueva denominación
                               </button>
                        </div>
                                <!-- FIN DE BOTÔN NUEVA DENOMINACION -->

                            

                        <!---------- INICIA TABLA  ----------------------------------------------------------------------------->
                            <div class="block-content collapse in">
                                <div class="span12">
                                    
                                    <div id="example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                        
                                        <div class="row">

                                        <!-- SELEECIONAR NUMERO DE REGISTROS -->
                                            <div class="span6">
                                                <div id="example_length" class="dataTables_length">
                                                    <label>
                                                        <select size="1" name="example_length" aria-controls="example">
                                                            <option value="10" selected="selected">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option><option value="100">100</option>
                                                        </select> 
                                                    </label>
                                                </div>
                                            </div>

                                        <!-- BUSCAR REGISTRO -->
                                            <div class="span6">
                                                <div class="dataTables_filter" id="example_filter">
                                                        <input type="text" aria-controls="example">
                                                        <button class="btn"><i class=" icon-search icon-white"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <br>

                                    <!------------- INICIA LA TABLA DE REGISTROS ------------------------------------------------>
                                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example" aria-describedby="example_info">
                                        <!-- INICIAN ENCABEZADOS DE LA TABLA -->
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 153px;">Eje temático

                                                </th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">Modalidad
                                                </th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 208px;">Creditos
                                                </th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 131px;">Acciones

                                                </th>
                                            </tr>
                                        </thead>
                                        <!-- FINALIZAN ENCABEZADOS DE LA TABLA -->
                                        
                                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                                            <!-- MOSTRAR LOS REGISTROS DE LA BASE DE DATOS -->
                                            <?php
                                            //incluimos el fichero de conexion
                                            include_once('php/conexion.php');

                                            $database = new Connection();
                                            $db = $database->open();
                                            try{    
                                                $sql = 'SELECT * FROM denominacion';
                                                foreach ($db->query($sql) as $row) {
                                                    ?>
                                                    <tr>
                                                    
                                                        <td><?php echo $row['eje_tematico']; ?></td>
                                                        <td><?php echo $row['modalidad']; ?></td>
                                                        <td><?php echo $row['descripcion']; ?></td>
                                                        <td>
                                                            <!-- <a href="  //?php echo $fila["id"][$i]; ?> " class="btn btn-success btn-sm" data-toggle="modal" data-target="#Actualizar"><span class="glyphicon glyphicon-edit"></span> Editar</a> -->
                                                            <a href="#Actualizar" data-toggle="modal"><button class="btn btn-primary" id="editbtn"><i class="icon-pencil icon-white"></i></button></a>
                                                    <a href="#Eliminar" data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-white"></i></a>
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
                                             <!-- CONTENIDO DE LA TABLA -->
                                            <!--<tr class="gradeA odd">
                                                <td class="  sorting_1">Dato actualizado K</td>
                                                <td class=" ">En linea 1</td>
                                                <td class=" ">1 crédito por cada 50 horas</td>
                                                <td class="center ">
                                                    
                                                    <a href="#Actualizar" data-toggle="modal"><button class="btn btn-primary"><i class="icon-pencil icon-white"></i></button></a>
                                                    <a href="#Eliminar" data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-white"></i></a>
                                                </td>
                                            </tr>
                                            <tr class="gradeA odd">
                                                <td class="  sorting_1">Inquietudes vocacionales propias</td>
                                                <td class=" ">Docencia</td>
                                                <td class=" ">1 crédito por cada 16 horas</td>
                                                <td class="center ">
                                                    
                                                    <a href="#Actualizar" data-toggle="modal"><button class="btn btn-primary"><i class="icon-pencil icon-white"></i></button></a>
                                                    <a href="#Eliminar" data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-white"></i></a>
                                                </td>
                                            </tr>
                                            <tr class="gradeA even">
                                                <td class="  sorting_1">Inquietudes vocacionales propias</td>
                                                <td class=" ">Docencia</td>
                                                <td class=" ">1 crédito por cada 16 horas</td>
                                                <td class="center ">
                                                    
                                                    <a href="#Actualizar" data-toggle="modal"><button class="btn btn-primary"><i class="icon-pencil icon-white"></i></button></a>
                                                    <a href="#Eliminar" data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-white"></i></a>
                                                </td>
                                            </tr>
                                            <tr class="gradeA odd">
                                                <td class="  sorting_1">Inquietudes vocacionales propias</td>
                                                <td class=" ">Independiente</td>
                                                <td class=" ">1 crédito por cada 20 horas</td>
                                                <td class="center ">-->
                                                    <!-- Botones Actualizar/Eliminar -----------------><!--
                                                    <a href="#Actualizar" data-toggle="modal"><button class="btn btn-primary"><i class="icon-pencil icon-white"></i></button></a>
                                                    <a href="#Eliminar" data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-white"></i></a>
                                                </td>
                                            </tr>-->
                                        </tbody>
                                    </table>
                                    
                                        <div class="span12 pull-right">
                                            <div class="dataTables_paginate paging_bootstrap pagination">
                                                <ul>
                                                    <li class="prev disabled"><a href="#">← Atrás</a></li>
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
                        <!-- /block -->
                    </div>
                        <!-- FIN SEGUNDA TABLA DE CONTENIOD -->
                       
                    </div>






                   

    <!-- ______________________ INICIO del modal ACTUALIZAR________________________________________________________ -->
    <div id="Actualizar" tabindex="-1" role="dialog" class="modal hide" aria-hidden="true" style="display: none;">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h3>Actualizar Denominación</h3>
        </div>
        <div class="modal-body">
            <!-- INICIA FORMULARIO DE ACTUALIZAR --------------------------------------------- -->
            
            <!-- validation -->
            <div class="row-fluid">
                <!-- BEGIN FORM

                        <form action="#" id="form_sample_1" class="form-horizontal">-->
                <form role="form" id=editDenominacionModal method="post" action="editaDenominacion.php">
                    <fieldset>
                        <div class="alert alert-error hide">
                            <button class="close" data-dismiss="alert"></button> Tienes errores o no has completado campos requeridos. Por favor revisa nuevamente.
                        </div>
                        <div class="alert alert-success hide">
                            <button class="close" data-dismiss="alert"></button> ¡Actualización Exitosa!
                        </div>


                        <!---------- INICIA LA TABLA DE ORDENAMIENTO DEL MODAL ------------------------------------------>
                        <table>
                            <tr>
                                <td>
                                    <div class="control-group">
                                    <label class="control-label"><b>Eje temático</b><span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="editareje" type="text" name="name" data-required="1" class="span12 m-wrap" placeholder="Digitte eje temático" require />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="control-group">
                                    <label class="control-label"><b>Modalidad</b><span class="required">*</span></label>
                                        <div class="controls">
                                            <input  id="editarmodalidad" type="text" name="name" data-required="1" class="span12 m-wrap" placeholder="Digite modalidad" require />
                                        </div>
                                    </div>
                                </td>    
                            </tr>
                            <tr>
                                <td>
                                    <div class="control-group">
                                        <label class="control-label"><b>Descripcion de Créditos</b><span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="editardescripcion" type="text" name="text" class=" m-wrap" placeholder="Digite descripción" require/>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="control-group">
                                        <label class="control-label"><b>Factor</b><span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="editarfactor" name="text" type="number" class=" m-wrap" require/>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            
                            <tr>
                                <td colspan="2">
                                    <div class="control-group">
                                        <label class="control-label"><b>Ejemplos de actividades</b><span class="required">*</span></label>
                                        <div class="controls">
                                            <!--<input type="text" size="15" maxlength="30" name="name" data-required="1" class="span6 m-wrap"/>-->
                                            <textarea id="editarejemplos" class="span12" align="center" placeholder="Ingrese ejemplos de actividades"></textarea>
                                        </div>
                                    </div>  
                                </td>
                            </tr>                          
                        </table>
                        

                    </fieldset>
                </form>
            </div>
            <!-- FINALIZA FORMULARIO DE EDICIÓN ------------------------------------------- -->
        </div>
        <div class="modal-footer">
            <a data-dismiss="modal" class="btn btn-success" href="editaDenominacion.php">Actualizar</a>
            <a data-dismiss="modal" class="btn" href="#">Cancelar</a>
        </div>
    </div>

    <!-- Método para actualizar -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js" integity=""></script>-->
    <!--<script src="https://stackpath.bootstrapdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>-->
    <!--<script>
        $(document).ready(function(){
            $('.editbtn').on('click', function(){
                $('#editDenominacion').modal('show');
            });
        });
    </script>-->
    <!-- ______________________ FIN del modal "ACTUALIZAR DENOMINACION" _______________________________________________________ -->

    <!-- ______________________ INICIO del modal "ELIMINAR DENOMINACION"________________________________________________________ -->
    <div id="Eliminar" class="modal hide" aria-hidden="true" style="display: none;">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h3>Eliminar Denominación</h3>
        </div>
        <div class="modal-body">
            <p>¿Está seguro que desea eliminar esta denominacion?</p>
        </div>
        <div class="modal-footer">
            <a data-dismiss="modal" class="btn" href="#">Cancelar</a>
            <a data-dismiss="modal" class="btn btn-success" href="bajaDenominacion.php">Confirmar</a>
        </div>
    </div>
    <!-- ______________________FIN del modal "ELIMINAR DENOMINACION"________________________________________________________ -->

    <!-- ______________________ INICIO del modal "NUEVA DENOMINACION"________________________________________________________ -->
    <div id="NuevaDenominacion" class="modal hide">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h3>Subir Denominación</h3>
        </div>

        <form action="php/creaDenominacion.php" method="POST"> 
        <div class="modal-body">
            <!-- CONTENIDO FORMULARIO -->

            <!-- validation -->
            <div class="row-fluid">
                <!-- BEGIN FORM-->
                <form role="form">
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
                                <td>
                                    <div class="control-group">
                                        <label class="control-label"><b>Eje temático</b><span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="creareje" type="text" name="name" data-required="1" class=" m-wrap" placeholder="Digite eje temático" required />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="control-group span6">
                                        <label class="control-label"><b>Modalidad</b><span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="crearmodalidad" type="text" name="name" data-required="1" class=" m-wrap" placeholder="Digite modalidad" required />
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="control-group">
                                        <label class="control-label"><b>Descripción de creditos</b><span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="creardescripcion" name="text" type="text" class=" m-wrap" placeholder="Digite descripción" required />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="control-group">
                                        <label class="control-label"><b>Factor</b><span class="required">*</span></label>
                                        <div class="controls">
                                            <input id="crearfactor" name="text" type="number" class=" m-wrap" required />
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="control-group">
                                        <label class="control-label"><b>Ejemplos de actividades</b><span class="required">*</span></label>
                                        <div class="controls">
                                            <!--<input type="text" size="15" maxlength="30" name="name" data-required="1" class="span6 m-wrap"/>-->
                                            <textarea id="crearejemplos" class="span12" align="center" placeholder="Ingrese ejemplos de actividades"></textarea>
                                        </div>
                                    </div>  
                                </td>
                            </tr>    
                        </table>
                    </fieldset>
                </form>
            <!-- END FORM-->
            <!-- /block -->
        </div>
        </form>
        <!-- /validation -->
        <!-- -->
    </div>
    <div class="modal-footer">
                <a data-dismiss="modal" class="btn btn-success" href="#" onclick="ActionCreate();" >Guardar</a>
                <a data-dismiss="modal" class="btn" href="#">Cancelar</a>
            </div>
    </div>
    <!-- ______________________FIN del modal "NUEVA DENOMINACION"________________________________________________________ -->
  



<!--------------------------------------------HINDU------------------------------------------------------------------------------------------------>
    


                   
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
        /*$(function() {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        }); */
        </script>
        <!--<script>
        $(document).ready(function() {
            $('.editbtn').on('click', function(){
                $('#Actualizar').modal('show');

                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                });
                console.log(data);

            });
        }); 
        </script>-->
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
        <!-- <script src="https://stackpath.bootstrapdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script> -->
       

    </body>
</html>