/*
	Alumna: Wendy Lizeth Carrillo Ceballos
	Materia: Tecnologías para la WEB
	Actividad: Ejercicio 6 (ejercicio6_WLCC)
	Fecha de entrega: Abril 19, 2021
	Grupo: 2CM4
*/


var numpantalla="0"; //Registra los datos del display
var pantallaconnumero="si"; //Variable Booleana para indicar que si tiene o no contenido el display
var usarpunto="no"; //Variable Booleana para saber si ya se esta usando un punto anteriormente o si se puede usar
var numespera=0;
var operapendiente=""; //Indica la operación que se hará entre los dos valores ingresados
var solucion=""; //Variable que almacena en forma de cadena el primer valor ingresado, el operando y el segundo numero

function ingresarNumero(x)
{
    //Con las siguientes dos lineas se probo que si se mostrara en pantalla el dígito presionado
    //var display= document.getElementById("display");
    //display.value= digito;

    //Compruebo si ya hubo o no algún punto, si no lo hay se habilita el botón, y de ser contrario se bloquea el botón
    if(x!=".")
    {
        //verifico si la pantalla esta en 0(o sin contenido) o si tiene contenido mostrando
        if(numpantalla=="0" || pantallaconnumero=="si")
            {
                document.CalculadoraCientifica.display.value=x;
                numpantalla=x;
            }
        //Busco si es que ahora si ya se puso un punto o si aún no   
        else if(x!=".")
            {
                document.CalculadoraCientifica.display.value+=x;
                numpantalla+=x;
            }
    }
    //si el punto se presiona cuando el display estaba en 0, no se había usado el punto antes y no existen números en pantalla
    if(x=="." && usarpunto=="no" && numpantalla=="0")
    {
        document.CalculadoraCientifica.display.value="0.";
        numpantalla=x;
        usarpunto="si";
    }   
     //si ya hay contenido y ningun punto, apenas se presionará el punto, el punto se posicionara a lado del digito último ingresado
    else if(x=="." && usarpunto=="no")
    {
        document.CalculadoraCientifica.display.value +=x;
        numpantalla +=x;
        usarpunto="si";
    }
    //PERO si el punto ya fue seleccionado anteriormente, entonces
    else if(x=="." && usarpunto=="si")
    {

    }
        pantallaconnumero="no";
}

/* Funcion para operaciones básicas tales como: + , - , * , / */
function operacionBasica(y)
{
    if(operapendiente =="")
    {

        numespera=document.CalculadoraCientifica.display.value;
        document.CalculadoraCientifica.display.value +=y;
        operapendiente = y;
        pantallaconnumero = "no";
        numpantalla = "";
        usarpunto = "no";
    _
    }

}

/* funcion para encontrar el factorial de un número*/
function funcionFactorial(y)
{
    numespera=document.CalculadoraCientifica.display.value;

    var total = 1; 

    for (i=1; i<=numespera; i++) {
        total = total * i; 
    }

    y=total;

    document.CalculadoraCientifica.display.value =y;
}

/* funcion para encontrar el cuadrado de un número*/
function funcionExponente(y)
{
    var aux=0;
    numespera = document.CalculadoraCientifica.display.value;

    document.CalculadoraCientifica.display.value +=y;

    aux=Math.pow(numespera, numpantalla);
    document.CalculadoraCientifica.display.value =aux;


}


function funcionLn()
{
    if(operapendiente == "")
    {
        document.CalculadoraCientifica.display.value=Math.log(numpantalla);
        pantallaconnumero = "no";
        operapendiente = "";
        usarpunto = "no";
    }

}

function funcionLogaritmo()
{
    if(operapendiente == "")
    {
        document.CalculadoraCientifica.display.value=Math.log10(numpantalla);
        pantallaconnumero = "no";
        operapendiente = "";
        usarpunto = "no";
    }

}


function operacionRaiz()
{
    if(operapendiente == "")
    {
        document.CalculadoraCientifica.display.value=Math.sqrt(numpantalla);
        pantallaconnumero = "no";
        operapendiente = "";
        usarpunto = "no";
    }
}

function funcionPorcentaje()
{
    if(operapendiente == "")
    {
        document.CalculadoraCientifica.display.value=(numpantalla*0.01);
        pantallaconnumero = "no";
        operapendiente = "";
        usarpunto = "no";
    }
}

function funcionAC()
{

     numpantalla="0";
     pantallaconnumero="si";
     usarpunto="no"; 
     numespera=0;
     operapendiente="";
     solucion="";
     document.CalculadoraCientifica.display.value="0";
}

function funcionResultado()
{

    if(operapendiente != "") 
    {
        solucion=numespera+operapendiente+numpantalla;
        //document.(nombre del form que contiene los botones).(nombre del cuadrito donde se muestran los numeros).value
        document.CalculadoraCientifica.display.value=eval(solucion);
        numpantalla=eval(solucion);
        pantallaconnumero="si";
        operapendiente = "";
        usarpunto = "no";
    }

}