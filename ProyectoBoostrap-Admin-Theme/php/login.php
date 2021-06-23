<?php
session_start();
include 'conexion.php';
$link=Conectar();
$usu=$_REQUEST['usu'];
$pass=$_REQUEST['pass'];

$sql=mysqli_query($link, "SELECT * FROM usuarios WHERE usuario='".$usu."' AND pass='".$pass."'");

if (mysqli_num_rows($sql)<=0)
{
	session_unset();
	header("location:login.html?error=''");
}
else
{

	$_SESSION["Name"]=$usu;
	if (!empty($_SESSION['Name'])) 
	{
		$_SESSION["loged"]=true;
			if ($_SESSION['Name']=="admin") 
			{
				header("location:../Validar-constancia.php");
			}
	
		else
		{
			header("location:../dashboard.html");
		}
	}
}

?>