<?php 
require('conect.php');

$usuario=$_GET['user'];
$clave=$_GET['clave'];
$nombre=$_GET['nombre'];
$ap_pat=$_GET['ap_pat'];
$ap_mat=$_GET['ap_mat'];
$edad=$_GET['edad'];

$checar=mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario='$usuario'");
$checarUsuario=mysqli_num_rows($checar);
if($checarUsuario>0){
	echo '<script language="javascript">alert("Ya existe este usuario "); </script>';
}else{
	$query = "INSERT INTO `usuarios` (id_usr, usuario, nombre, password, ap_paterno, ap_materno, edad, gerente ) VALUES (NULL, '".$usuario."', '".$nombre."','".$clave."', '".$ap_pat."', '".$ap_mat."', '".$edad."',0)";
mysqli_query($conexion,$query);
	?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/bootstrap.css">
		<title>Vuelve...</title>
	</head>
	<body>
		<div class="alert alert-success">
			<h1>Usuario registrado correctamente</h1>
			<br>
			<br>
			<a href="index.html" class="btn btn-success btn-lg">Volver</a>
		</div>
	</body>
	</html>	
<?php } ?>