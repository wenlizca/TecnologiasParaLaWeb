/*
	Alumna: Wendy Lizeth Carrillo Ceballos
	Materia: Tecnologías para la WEB
	Actividad: Ejercicio 5 (ejercicio5_WLCC)
	Fecha de entrega: Abril 19, 2021
	Grupo: 2CM4
*/

function sumaNumeros() {
    //alert( document.getElementById("numero1").value );
    //alert( document.getElementById("numero2").value );
    var n1 = document.getElementById('numero1').value;
	var n2 = document.getElementById('numero2').value;
    var suma = parseInt(n1) + parseInt(n2);
    alert("La suma es: "+suma)
}

function restaNumeros() {
    //alert("Para restar");
    var n1 = document.getElementById('numero1').value;
	var n2 = document.getElementById('numero2').value;
    var resta = parseInt(n1) - parseInt(n2);
    alert("La resta es: "+resta)
}

function multiplicaNumeros() {
    //alert("Para multiplicar");
    var n1 = document.getElementById('numero1').value;
	var n2 = document.getElementById('numero2').value;
    var multi = parseInt(n1) * parseInt(n2);
    alert("La multiplicación es: "+multi)
}

function divideNumeros() {
    //alert("Para dividir");
    var n1 = document.getElementById('numero1').value;
	var n2 = document.getElementById('numero2').value;
    var divi = parseInt(n1) / parseInt(n2);
    alert("La división es: "+divi)
}