<?php
require('conect.php');
$id=$_GET['id'];
$checar=mysqli_query($conexion,"SELECT * FROM usuarios WHERE id_usr='$id'");
$checarGerente=mysqli_num_rows($checar);
if($checarGerente == 1){
	$query = "DELETE FROM usuarios WHERE id_usr='$id'";
	mysqli_query($conexion,$query);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/bootstrap.css">
		<title>Exito</title>
	</head>
	<body>
		<div class="alert alert-success">
			<h2>Gerente eliminado exitosamente</h2>
			<br>
			<br>
			<a href="gerente.php" class="btn btn-success btn-lg">Volver</a>
		</div>
	</body>
</html>
<<?php
}else{
echo '<script language="javascript">alert("No se encontro el Gerente a borrar :v "); </script>';
}
?>