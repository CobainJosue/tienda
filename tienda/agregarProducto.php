<?php 
require('conect.php');

$nombre=$_GET['nombre'];
$precio=$_GET['precio'];
$descripcion=$_GET['descripcion'];

$checar=mysqli_query($conexion,"SELECT * FROM productos WHERE nombre='$nombre'");
$checarP=mysqli_num_rows($checar);
if($checarP>0){
	echo '<script language="javascript">alert("Ya existe este producto "); </script>';
}else{
	$query = "INSERT INTO `productos` (id_producto, nombre, precio, descripcion ) VALUES (NULL, '".$nombre."', '".$precio."','".$descripcion."')";
mysqli_query($conexion,$query);
	?>
<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/bootstrap.css">
		<title>Vuelve...</title>
	</head>
	<body>
		<div class="alert alert-success">
			<h1>Producto agregado correctamente</h1>
			<br>
			<br>
			<a href="gerente.php" class="btn btn-success btn-lg">Volver</a>
		</div>
	</body>
	</html>	
<?php } ?>