// Este Java Script es llamado del HTML y este JS llama al PHP


var obtenerID_e = 0;	//guardo el ID en esta variable para identificar el registro a editar
var obtenerID_b = 0;	//guardo el ID en esta variable para identificar el registro a borrar


// FUNCION para GUARDAR un nuevo registro ----------------------------------------------------------------------------------
function ActionCreate(){

	// creo la variable, y almacena mediante el ID lo que contenga el input del form en el HTML
	var nombre_n	= 	document.getElementById("nuevoNombre").value;
	var programa_n	=	document.getElementById("nuevoPrograma").value;
  	var apellidoP_n	= 	document.getElementById("nuevoApellidoP").value;
	var apellidoM_n	=	document.getElementById("nuevoApellidoM").value;

	$.ajax({
	  method:"POST",
	  url: "php/alta_alumnos.php",
	  data: { accion:"create", programa:programa_n, nombre:nombre_n, apellidoP:apellidoP_n, apellidoM:apellidoM_n},
	  success: function( result ) 
	  	{
	    	resultJSON = JSON.parse(result);

		    if(resultJSON.estado==1)
		    {
		    	var tabla=$('#example2').DataTable(); //cargo la tabla

		        Botones='<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalEditar" onclick="IdenticaActualizar('+resultJSON.id+');">Actualizar</button>';
		        Botones=Botones+' <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalBorrar" onclick="IndentificaEliminar('+resultJSON.id+');">Eliminar</button></div>';

		        //muestrp la tabla y agrego el registro nuevo
		  		tabla.row.add([
	  			  programa_n, nombre_n, Botones
	  				]).draw().node().id="row_"+resultJSON.id;

		  		//Cuando de clic en guardar se cerrará el modal en caso de ser una operacion exitosa
	          $('#modalNuevo').modal('hide');
		    }
		    else
		    {
	      		alert("Esto me responde el servidor" + result);
		  	}
	  	}
	});
}



// FUNCION para MOSTRAR todos los registros ----------------------------------------------------------------------------------
function ActionRead(){

	$.ajax({
	  method:"post",
	  url: "./php/alta_alumnos.php",
	  data: { accion: "read" },
	  success: function(result) {
	  	var resultJSON = JSON.parse(result);

	  	if(resultJSON.estado==1)
	  	{

	  		var tabla=$('#example2').DataTable();
	  		resultJSON.crud.forEach(function(alumno){

	  			Botones='<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalEditar" onclick="IdenticaActualizar('+alumno.id+');">Actualizar</button>';
	  			Botones=Botones+' <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalBorrar" onclick="IndentificaEliminar('+alumno.id+');">Eliminar</button>';

	  			tabla.row.add([
	  				alumno.programa, alumno.nombre, Botones
	  				]).draw().node().id="row_"+alumno.id;

	  		});


	  	}
	  	else
	  	{

	    	alert(resultJSON.mensaje);
    	}
	  }
	});
}


//--------- UPDATE
function ActionUpdate() {

  var id = obtenerID_e;
  var nombre_e     	= 	document.getElementById("editaNombre").value;
  var programa_e  	= 	document.getElementById("editaPrograma").value;
  var apellidoP_e  	= 	document.getElementById("editaApellidoP").value;
	var apellidoM_e =	document.getElementById("editaApellidoM").value;

  $.ajax({
      method: "POST",
      url: "php/alta_alumnos.php",
      data: { accion:"update", id: id, nombre: nombre_e, programa: programa_e, apellidoP:apellidoP_e, apellidoM: apellidoM_e},
      success: function(result) {
	        resultJSON = JSON.parse(result);
	        if (resultJSON.estado == 1) 
	        {

	        	var tabla = $("#example2").DataTable();

	        	renglon = tabla.row("#row_" + id).data();
	        	renglon[0] = programa_e;
	        	renglon[1] = nombre_e;

	        	tabla.row("#row_" + id).data(renglon);

	        	$('#modalEditar').modal('hide');
	        } 
	        else
	        {
	            alert(resultJSON.mensaje);
	        }

      }
  });
}



//--------- DELETE
function ActionDelete(){

	IdElim=obtenerID_b;

			$.ajax({
				method:"post",
				url: "php/alta_alumnos.php",
				data: {
					accion: "delete",
					id: IdElim
				},
				success: function( result ) {
					console.log(result);
					resultJSON = JSON.parse(result);

					if(resultJSON.estado==1)
					{
						//Eliminar el renglon de la tabla
						tabla = $("#example2").DataTable();

						tabla.row("#row_"+IdElim).remove().draw();

					$('#modalBorrar').modal('hide');
					}else{
						alert(resultJSON.mensaje);
					}
				}
			});

}





function IndentificaEliminar(id){

  alert("Desea eliminar al registro con ID: "+id);
	obtenerID_b=id;

}



function IdenticaActualizar(id){
	obtenerID_e = id;

	//Referencia a la tabla
	tabla		 = $("#example2").DataTable();

	//Referencia al contenido del renglon
	renglon			   =  tabla.row("#row_"+obtenerID_e).data();

	programa         = renglon[0];
  	nombre      	   = renglon[1];
  //apellidoP        = renglon[2];
  //apellidoM        = renglon[3];

	$("#editaPrograma").val(programa);
	$("#editaNombre").val(nombre);

}
