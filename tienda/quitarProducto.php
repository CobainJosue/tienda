<?php
require('conect.php');
$id=$_GET['id'];
$checar=mysqli_query($conexion,"SELECT * FROM productos WHERE id_producto='$id'");
$checarGerente=mysqli_num_rows($checar);
if($checarGerente == 1){
	$query = "DELETE FROM productos WHERE id_producto='$id'";
	mysqli_query($conexion,$query);
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/bootstrap.css">
		<title>Exito</title>
	</head>
	<body>
		<div class="alert alert-success">
			<h2>Producto eliminado exitosamente</h2>
			<br>
			<br>
			<a href="gerente.php" class="btn btn-success btn-lg">Volver</a>
		</div>
	</body>
</html>
<<?php
}else{
echo '<script language="javascript">alert("No se encontro el Producto a borrar :v "); </script>';
}
?>