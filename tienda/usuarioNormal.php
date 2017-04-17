<?php
require('sesion.php');
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/bootstrap.css">
		<script src="js/jquery-3.2.0.js"></script>
		<script src="js/bootstrap.js"></script>
		<title>Usuario</title>
	</head>
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<ul class="nav navbar-nav navbar-right">
					<li><form action="destruir.php">
						<button class="btn btn-danger btn-md" type="submit" name="">Salir</button>
					</form></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid well well-lg">
		<ul class="nav nav-pills">
			<li class="active"><a href="#info" data-toggle="pill">Perfil</a></li>
			<li><a data-toggle="pill" href="#articulos">Mostrar Articulos</a></li>
		</ul>
		<div class="tab-content">
			<div id="info" class="tab-pane fade in active">
				<h3>Informacion del perfil</h3>
				<table class='table'>
					<tbody>
						<tr>
							<td>Usuario</td>
							<td> <?php echo $_SESSION["usuario"] ; ?> </td>
						</tr>
						<tr>
							<td>Nombre</td>
							<td><?php echo $_SESSION["nombre"]; ?></td>
						</tr>
						<tr>
							<td>Apellido Paterno</td>
							<td><?php echo $_SESSION["ap_pat"]; ?></td>
						</tr>
						<tr>
							<td>Apellido Materno</td>
							<td><?php echo $_SESSION["ap_mat"] ?></td>
						</tr>
						<tr>
							<td>Edad</td>
							<td><?php echo $_SESSION["edad"] ?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div id="articulos" class="tab-pane fade">
				<h3>Articulos en venta</h3>
				<?php
					require('conect.php');
					$query=mysqli_query($conexion,"SELECT * FROM productos");
					while ($renglon=mysqli_fetch_assoc($query)) {
						echo "<div class='media'>";
						echo "<div class='media-left'>";
						echo "<img src='img/imagen' alt='imagen no disponible'>";
						echo "</div>";
						echo "<div class='media-body'>";
						echo "<h4 class='media-heading'>".$renglon['nombre']."</h4>";
						echo "<h2>".$renglon['precio']."</h2>";
						echo "<p>".$renglon['descripcion']."</p>";
						echo "</div>";
						echo "</div>";
						echo "</tr>";
					}
					?>
			</div>
		</div>
	</div>
</body>
</html>