$(document).ready(function() {
var id, opcion;
opcion = 4;
    
tablaAlumnos = $('#tablaAlumnos').DataTable({  
    "ajax":{            
        "url": "php/crud-alumnos.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    "arreglo":[
        //Nombre del campo en la base de datos : nombre de la variable que lo esta creadno 
        {"data": "programa"},
        {"data": "nombre"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'>  <button type='button' class='btn btn-info btnEditar'>Editar</button>  <button type='button' class='btn btn-danger btnBorrar'>Eliminar/button> </div></div>"}
    ]
});     

var registro; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formularioAlumno').submit(function(mandar){                         
    mandar.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    //username = $.trim($('#username').val());  
    nombre = $.trim($('#nombre').val());    
    apellidoP = $.trim($('#apellidoP').val());
    apellidoM = $.trim($('#apellidoM').val());    
    programa = $.trim($('#programa').val());    
    //password = $.trim($('#password').val());
    //status = $.trim($('#status').val());                            
        $.ajax({
          url: "php/crud-alumnos.php",
          type: "POST",
          datatype:"json",    
          data:  {id:id, nombre:nombre, apellidoP:apellidoP, apellidoM:apellidoM, programa:programa, opcion:opcion},    
          success: function(data) {
            tablaAlumnos.ajax.reload(null, false);
           }
        });			        
    $('#modalNuevo').modal('hide');											     			
});
        
 

//para limpiar los campos antes de dar de Alta una Persona
$("#btnGuardar").click(function(){
    opcion = 1; //alta           
    id=null;
    $("#formularioAlumno").trigger("reset");
    $(".modal-header").css( "background-color", "#17a2b8");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Alta de Usuario");
    $('#modalNuevo').modal('show');	    
});

//Editar        
$(document).on("click", ".btnEditar", function(){		        
    opcion = 2;//editar
    registro = $(this).closest("tr");	        
    //id = parseInt(registro.find('td:eq(0)').text()); //capturo el ID		            
    nombre = registro.find('td:eq(1)').text();
    apellidoP = registro.find('td:eq(2)').text();
    apellidoM = registro.find('td:eq(3)').text();
    programa = registro.find('td:eq(4)').text();

    $("#nombre").val(nombre);
    $("#apellidoP").val(apellidoP);
    $("#apellidoA").val(apellidoM);
    $("#programa").val(programa);

    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Actualizar alumno");		
    $('#modalNuevo').modal('show');		   
});

//Borrar
$(document).on("click", ".btnBorrar", function(){
    registro = $(this);           
    //id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
    nombre = parseInt($(this).closest('tr').find('td:eq(1)').text()) ; 
    opcion = 3; //eliminar        
    var respuesta = confirm("¿Está seguro de borrar el registro "+nombre+"?");                
    if (respuesta) {            
        $.ajax({
          url: "php/crud-alumnos.php",
          type: "POST",
          datatype:"json",    
          data:  {opcion:opcion, id:id},    
          success: function() {
              tablaAlumnos.row(registro.parents('tr')).remove().draw();                  
           }
        });	
    }
 });
     
});   