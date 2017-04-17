<?php
require('sesion.php');
if ($_SESSION['gerente'] == 0) {
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/bootstrap.css">
		<script src="js/jquery-3.2.0.js"></script>
		<script src="js/bootstrap.js"></script>
		<title>Ban</title>
	</head>
	<body>
		<h3>Nel prro >:v</h3>
		<a href='destruir.php' class='btn btn-warning btn-lg'>Volver</a>
	</body>
	</html>
	<?php
}else{
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.css">
		<script src="js/jquery-3.2.0.js"></script>
		<script src="js/bootstrap.js"></script>
		<title>Gerente</title>
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
			<li><a data-toggle="pill" href="#agregar">Agregar Gerente</a></li>
			<li><a href="#quitarG" data-toggle="pill">Quitar Gerente</a></li>
			<li><a href="#agregarU" data-toggle="pill">Agregar Usuario</a></li>
			<li><a href="#quitarU" data-toggle="pill">Quitar Usuario</a></li>
			<li><a href="#agregarP" data-toggle="pill">Agregar Producto</a></li>
			<li><a href="#quitarP" data-toggle="pill">Quitar Producto</a></li>
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
			<div id="agregar" class="tab-pane fade">
				<h3>Agregar un nuevo Gerente</h3>
				
				<form action="registroGerente.php" method="GET">
					<div class="form-group">
						<label for="usuario">Usuario:</label>
						<input type="text" class="form-control" name="user">
					</div>
					<div class="form-group">
						<label for="pwd">Password:</label>
						<input type="password" class="form-control" name="clave">
					</div>
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control" name="nombre">
					</div>
					<div class="form-group">
						<label for="ap_paterno">Apellido Paterno</label>
						<input type="text" class="form-control" name="ap_pat">
					</div>
					<div class="form-group">
						<label for="ap_materno">Apellido Materno</label>
						<input type="text" class="form-control" name="ap_mat">
					</div>
					<div class="form-group">
						<label for="edad">Edad</label>
						<input type="text" class="form-control" name="edad">
					</div>
					<button type="submit" class="btn btn-success">Registrar</button>
				</form>
			</div>
			<div id="quitarG" class="tab-pane">
				<h3>Borrar del sistema un Gerente</h3>
				<h4>Gerentes en el sistema:</h4>
				<table class="table">
					<thead>
						<tr>
							<th>id</th>
							<th>Usuario</th>
							<th>Nombre</th>
							<th>Apellido Paterno</th>
							<th>Apellido Materno</th>
							<th>Edad</th>
						</tr>
					</thead>
					<?php
					require('conect.php');
					$query=mysqli_query($conexion,"SELECT * FROM usuarios WHERE gerente='1'");
					while ($renglon=mysqli_fetch_assoc($query)) {
						echo "<tr>";
								echo "<th>".$renglon['id_usr']."</th>";
								echo "<th>".$renglon['usuario']."</th>";
								echo "<th>".$renglon['nombre']."</th>";
								echo "<th>".$renglon['ap_paterno']."</th>";
								echo "<th>".$renglon['ap_materno']."</th>";
								echo "<th>".$renglon['edad']."</th>";
						echo "</tr>";
					}
					?>
				</table>
				<h4>Ingresa el id del gerente a borrar</h4>
				<form action="quitarGerente.php" method="GET">
					<input type="text" class="form-control" name="id">
					<button class="btn btn-success btn-md" type="submit">Borrar</button>
				</form>
			</div>
			<div id="agregarU" class="tab-pane fade">
				<h4>Usuarios normalmes del sistema</h4>
				<table class="table">
					<thead>
						<tr>
							<th>id</th>
							<th>Usuario</th>
							<th>Nombre</th>
							<th>Apellido Paterno</th>
							<th>Apellido Materno</th>
							<th>Edad</th>
						</tr>
					</thead>
					<?php
					require('conect.php');
					$query=mysqli_query($conexion,"SELECT * FROM usuarios WHERE gerente='0'");
					while ($renglon=mysqli_fetch_assoc($query)) {
						echo "<tr>";
								echo "<th>".$renglon['id_usr']."</th>";
								echo "<th>".$renglon['usuario']."</th>";
								echo "<th>".$renglon['nombre']."</th>";
								echo "<th>".$renglon['ap_paterno']."</th>";
								echo "<th>".$renglon['ap_materno']."</th>";
								echo "<th>".$renglon['edad']."</th>";
						echo "</tr>";
					}
					?>
				</table>
				<h3>Forma de registro de usuarios normales</h3>
				<form action="registroUsuarioD.php" method="GET">
					<div class="form-group">
						<label for="usuario">Usuario:</label>
						<input type="text" class="form-control" name="user">
					</div>
					<div class="form-group">
						<label for="pwd">Password:</label>
						<input type="password" class="form-control" name="clave">
					</div>
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control" name="nombre">
					</div>
					<div class="form-group">
						<label for="ap_paterno">Apellido Paterno</label>
						<input type="text" class="form-control" name="ap_pat">
					</div>
					<div class="form-group">
						<label for="ap_materno">Apellido Materno</label>
						<input type="text" class="form-control" name="ap_mat">
					</div>
					<div class="form-group">
						<label for="edad">Edad</label>
						<input type="text" class="form-control" name="edad">
					</div>
					<button type="submit" class="btn btn-success">Registrar</button>
				</form>
			</div>
			<div id="quitarU" class="tab-pane fade">
				<h3>Borrar del sistema un usuario normal</h3>
				<h4>Usuarios en el sistema:</h4>
				<table class="table">
					<thead>
						<tr>
							<th>id</th>
							<th>Usuario</th>
							<th>Nombre</th>
							<th>Apellido Paterno</th>
							<th>Apellido Materno</th>
							<th>Edad</th>
						</tr>
					</thead>
					<?php
					require('conect.php');
					$query=mysqli_query($conexion,"SELECT * FROM usuarios WHERE gerente='0'");
					while ($renglon=mysqli_fetch_assoc($query)) {
						echo "<tr>";
								echo "<th>".$renglon['id_usr']."</th>";
								echo "<th>".$renglon['usuario']."</th>";
								echo "<th>".$renglon['nombre']."</th>";
								echo "<th>".$renglon['ap_paterno']."</th>";
								echo "<th>".$renglon['ap_materno']."</th>";
								echo "<th>".$renglon['edad']."</th>";
						echo "</tr>";
					}
					?>
				</table>
				<h4>Ingresa el id del usuario a borrar</h4>
				<form action="quitarUsuario.php" method="GET">
					<input type="text" class="form-control" name="id">
					<button class="btn btn-success btn-md" type="submit">Borrar</button>
				</form>
			</div>
			<div id="agregarP" class="tab-pane fade">
				<form action="agregarProducto.php" method="GET">
					<div class="form-group">
						<label for="nombre">Nombre del producto</label>
						<input type="text" class="form-control" name="nombre">
					</div>
					<div class="form-group">
						<label for="precio">Precio</label>
						<input type="text" class="form-control" name="precio">
					</div>
					<div class="form-group">
						<label for="descripcion">Descripcion del producto</label>
						<input type="text" class="form-control" name="descripcion">
					</div>
					<button class="btn btn-success btn-md" type="submit">Agregar</button>
				</form>
			</div>
			<div id="quitarP" class="tab-pane fade">
				<h3>Quitar un producto en venta</h3>
				<h4>Productos en el sistema:</h4>
				<table class="table">
					<thead>
						<tr>
							<th>id</th>
							<th>Nombre</th>
							<th>Precio</th>
							<th>Descripcion</th>
						</tr>
					</thead>
					<?php
					require('conect.php');
					$query=mysqli_query($conexion,"SELECT * FROM productos");
					while ($renglon=mysqli_fetch_assoc($query)) {
						echo "<tr>";
								echo "<th>".$renglon['id_producto']."</th>";
								echo "<th>".$renglon['nombre']."</th>";
								echo "<th>".$renglon['precio']."</th>";
								echo "<th>".$renglon['descripcion']."</th>";
						echo "</tr>";
					}
					?>
				</table>
				<h4>Ingresa el id del producto a borrar</h4>
				<form action="quitarProducto.php" method="GET">
					<input type="text" class="form-control" name="id">
					<button class="btn btn-success btn-md" type="submit">Borrar</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<?php } ?>