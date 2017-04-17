<?php 

require('conect.php');
require('sesion.php');

$usuario=$_GET['user'];
$contra=$_GET['clave'];

if(empty($_GET['user']) || empty($_GET['clave'])){
	echo "<center>";
	echo "<div class='alert alert-danger'>";
	echo "<strong>Error!</strong>Te faltaron datos";
	echo "</div>";
	echo "<a href='index.html' class='btn btn-warning' role='button'>Regresa al login</a>";
	echo "</center>";
}else{
	$query=mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario='$usuario' and password='$contra'");

	$existe = $query->num_rows;

	if($existe != 0){
		$renglon=mysqli_fetch_assoc($query);

		if($renglon['gerente']){
			
			echo "<center>";
			echo "<div class='alert alert-info'>";
			echo "<strong>Gerente!</strong>Hola Gerente!";
			echo "</div>";
			echo "<a href='index.html' class='btn btn-warning' role='button'>Regresa al login</a>";
			echo "</center>";

			session_start();

			$_SESSION['usuario']=$usuario;
			$_SESSION['clave']=$contra;
			$_SESSION['nombre']=$renglon['nombre'];
			$_SESSION['ap_pat']=$renglon['ap_paterno'];
			$_SESSION['ap_mat']=$renglon['ap_materno'];
			$_SESSION['edad']=$renglon['edad'];
			$_SESSION['gerente']=$renglon['gerente'];

			print_r($_SESSION);

			header("Location: gerente.php");

		}else{
			session_start();

			$_SESSION['usuario']=$usuario;
			$_SESSION['clave']=$contra;
			$_SESSION['nombre']=$renglon['nombre'];
			$_SESSION['ap_pat']=$renglon['ap_paterno'];
			$_SESSION['ap_mat']=$renglon['ap_materno'];
			$_SESSION['edad']=$renglon['edad'];

			echo "<strong>Hola usuario normal</strong>";

			$_SESSION['usuario']=$usuario;

			print_r($_SESSION);

			header("Location: usuarioNormal.php");

		}
	}else{
		echo "<h2>El usuario o la contraseña no existen</h2>";
	}
}

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<link rel="stylesheet" href="css/bootstrap.css">
 	<title>Login</title>
 </head>
 <body>
 	
 </body>
 </html>