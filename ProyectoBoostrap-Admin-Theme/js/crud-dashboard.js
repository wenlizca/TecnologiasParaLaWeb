$(document).ready(function() {
    $('#tablaVERDE').DataTable({
    	"ajax":{            
                "url": '../php/crud-dashboard.php', 
                "method": 'POST',
                "dataSrc":""
      },
      "columns":[
                {"data": "modalidad"},
                {"data": "ejemplos"},
                {"data": "factor"}
      ]
    });
} );