//Create Read Update Delete 


var IdEliminar = 0;
var IdActualizar = 0;

// ------------------------------ Create

function ActionCreate(){

    //var table = $('#example').DataTable();

    var actividad_local     = document.getElementById("actividad_create").value;
    var fechaInicio_local   = document.getElementById("fechaInicio_create").value;
    var fechaFin_local      = document.getElementById("fechaFin_create").value;
    var horas_local         = document.getElementById("horas_create").value;
    var archivo_local       = document.getElementById("archivo_create").value;
    var observaciones_local = document.getElementById("observaciones_create").value;
    var id;

    /*var botones = '<a href="#Actualizar" data-toggle="modal" class="btn btn-primary">';
    botones = botones + '<i class="icon-pencil icon-white">';
    botones = botones + '</i>';
    botones = botones + '</a>';
    botones = botones + '<a href="#Eliminar" data-toggle="modal" class="btn btn-danger">';
    botones = botones + '<i class="icon-trash icon-white">';
    botones = botones + '</i>';
    botones = botones + '</a>'; */
 
    //table.row.add([row.actividad_local, row.fechaFin_local, row.horas_local, botones]).draw(false);
    /*table.row.add([
        actividad_local,
        fechaInicio_local,
        horas_local,
        botones
    ]).draw(false);*/

    $.ajax({
        url: "php/crud-constancias.php",
        method: 'POST',
        data: {
            //Nombre del campo en la base de datos : nombre de la variable que lo esta creadno 
            actividad       : actividad_local,
            fecha_inicio    : fechaInicio_local,
            fecha_fin       : fechaFin_local,
            horas           : horas_local,
            archivo         : archivo_local,
            observaciones   : observaciones_local,
            accion          : 'Create'
        },
        success: function(result) {
            //var resJSON = JSON.parse(result);
			//if (resJSON.estado==1) {
			//	id=resJSON.id;
				/*table.row.add([
                    id,
                    actividad_local,
                    fechaInicio_local,
                    horas_local,
                    botones
					]).draw().node().id="row_"+id; */  
              //  }
            
            alert("Esto me responde el servidor" + result);
        }
    });


}

// ------------------------------ Read

//function ActionRead() {
    //GET
    /*$.ajax({
        url: "php/crud-constancias.php",
        method: 'POST',
        data: {
            accion: 'Read'
        },
        success: function(result) {
            var resultJSON = JSON.parse(result);
	  	
	  	    if(resultJSON.estado==1){
	  		
	  		var tabla=$('#example').DataTable();

	  		resultJSON.constancia.forEach(function(constancia){
	  			
                var botones = '<a href="#Actualizar" data-toggle="modal" class="btn btn-primary">';
                botones = botones + '<i class="icon-pencil icon-white">';
                botones = botones + '</i>';
                botones = botones + '</a>';
                botones = botones + '<a href="#Eliminar" data-toggle="modal" class="btn btn-danger">';
                botones = botones + '<i class="icon-trash icon-white">';
                botones = botones + '</i>';
                botones = botones + '</a>';
	  			
	  			/*tabla.row.add([
                    actividad_local,
                    fechaInicio_local,
                    horas_local,
	  				botones
	  				]).draw().node().id="row_"+constancia.id; */

	  		/*});
            }
            alert("Esto me responde el servidor" + result);
        }
    });

}*/

// ------------------------------ Update

function ActionUpdate() {

    idAct = IdActualizar;
    var actividad_local_UP     = document.getElementById("actividad_create").value;
    var fechaInicio_local_UP   = document.getElementById("fechaInicio_create").value;
    var fechaFin_local_UP      = document.getElementById("fechaFin_create").value;
    var horas_local_UP        = document.getElementById("horas_create").value;
    var archivo_local_UP      = document.getElementById("archivo_create").value;
    var observaciones_local_UP = document.getElementById("observaciones_create").value;
    var idAct;

    /*actividad_local_UP      = $("#actividad_Update").value;
    fechaInicio_local_UP    = $("#fechaInicio_Update").value;
    fechaFin_local_UP       = $("#fechaFin_Update").value;
    horas_local_UP          = $("#horas_Update").value;
    archivo_local_UP        = $("#archivo_Update").value;
    observaciones_local_UP  = $("#obervaciones_Update").value;*/

    $.ajax({
        method: "post",
        url: "php/crud-constancias.php",
        data: {
            accion      : "update",
            id          : idAct,
            actividad   : actividad_local_UP,
            fecha_inicio: fechaInicio_local_UP,
            fecha_fin   : fechaFin_local_UP,
            horas       : horas_local_UP,
            archivo     : archivo_local_UP,
            observaciones: observaciones_local_UP,
        },
        success: function(result) {
            resultJSON = JSON.parse(result);
            if (resultJSON.estado == 1) {

                var tabla = $("#example").DataTable();

                //Temporal
                renglon = tabla.row("#row_" + idAct).data();
                renglon[0] = actividad_local_UP;
                renglon[1] = fechaInicio_local_UP;
                renglon[2] = horas_local_UP;

                tabla.row("#row_" + idAct).data(renglon);

            } else
                alert(resultJSON.mensaje);
        }
    });
}

// ------------------------------ Delete

function ActionDelete() {

    IdElim = IdEliminar;

    $.ajax({
        method: "post",
        url: "../../php/evento.php",
        data: {
            accion: "delete",
            id: IdElim
        },
        success: function(result) {
            console.log(result);
            resultJSON = JSON.parse(result);

            if (resultJSON.estado == 1) {
                //Eliminar el renglon de la tabla
                tabla = $("#example1").DataTable();
                tabla.row("#row_" + IdElim).remove().draw();
            } else {
                alert(resultJSON.mensaje);
            }
        }
    });
}





function IndentificaEliminar(id) {
    IdEliminar = id;
}

function IdenticaActualizar(id) {
    IdActualizar = id;

    //Referencia a la tabla
    tabla = $("#example").DataTable();

    //Referencia al contenido del renglon
    renglon = tabla.row("#row_" + IdActualizar).data();

    actividad       = renglon[0];
    fecha_inicio    = renglon[1]
    horas           = renglon[2];

    $("#nombreAct").val(actividad);
    $("#nombreAct").val(fecha_inicio);
    //$("#nombreAct").val(fecha_fin);
    $("#nombreAct").val(horas);
    //$("#nombreAct").val(archivo);
    //$("#obervacionesAct").val(observaciones);

}







/*
function ActionCreate() {

    actividad_create = $("#actividad").val();
    fecha_in_create = $("#fecha_inicio").val();
    fecha_fin_create = $("#fecha_fin").val();
    horas_create = $("#horas").val();
    archivo_create = $("#archivo").val();
    observaciones_create = $("#observaciones").val();

    $.ajax({
        url: "php/crud-constancias.php",
        method: 'POST',
        data: {
            actividad: actividad_create,
            fecha_inicio: fecha_inicio_create,
            fecha_fin: fecha_fin_create,
            horas: horas_create,
            archivo: archivo_create,
            observaciones: observaciones_create,
            accion: 'Create'

        },
        success: function(resultado) {
            //resultado = String = {"estado":0, mensaje:"Ocurrio un error desconocido", "id":-1}

            //alert(resultado); //Nos dice si esta o no registrando

            var objetoJSON = JSON.parse(resultado);

            if (objetoJSON.estado >= 1) {
                //Mostrar en la tabla los datos
                var tabla = $('#example2').DataTable();
                //Vista //línea 35 code del profe

                var botones = '<a href="#Actualizar" data-toggle="modal" class="btn btn-primary">';
                botones = botones + '<i class="icon-pencil icon-white">';
                botones = botones + '</i>';
                botones = botones + '</a>';
                botones = botones + '<a href="#Eliminar" data-toggle="modal" class="btn btn-danger">';
                botones = botones + '<i class="icon-trash icon-white">';
                botones = botones + '</i>';
                botones = botones + '</a>';

                tabla.row.add([
                    nomEvento,
                    obsEvento,
                    Botones
                ]).draw().node().id = "row_" + objetoJSON.id;

            }
            alert("Estado que me regresa: " + objetoJSON.estado);
            alert("El mensaje que me regresa: " + objetoJSON.mensaje);
            alert("El id que me regresa es: " + objetoJSON.id);

        }
    });
}
*/
