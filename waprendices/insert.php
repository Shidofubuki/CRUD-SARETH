<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$id=$_POST['id'];
		$tipo=$_POST['tipo'];
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$direccion=$_POST['direccion'];
		$telefono=$_POST['telefono'];
		$ficha=$_POST['ficha'];	

		if(!empty($id) && !empty($tipo) && !empty($nombre) && !empty($apellido) && !empty($direccion) && !empty($telefono) && !empty($ficha)){
			if(!filter_var($ficha)){
				
			}else{
				$consulta_insert=$con->prepare('INSERT INTO aprendices (id,tipo,nombre,apellido,direccion,telefono,ficha) VALUES(:id,:tipo,:nombre,:apellido,:direccion,:telefono,:ficha)');
				$consulta_insert->execute(array(
					':id' =>$id,
					':tipo' =>$tipo,
					':nombre' =>$nombre,
					':apellido' =>$apellido,
					':direccion' =>$direccion,
					':telefono' =>$telefono,
					':ficha' =>$ficha					
				));
				header('Location: index.php');
			}
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Servicio</title>
	<link rel="stylesheet" href="/css/estilo.css">
	<link rel="icon" type="image/png" sizes="16x16" href="/images/1.jfif">
</head>
<body>
	<div class="contenedor">
		<h2>Insertar Aprendices</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="id" placeholder="Ficha de documento" class="input__text">
				<input type="text" name="tipo" placeholder="Tipo de documento" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="nombre" placeholder="Nombres" class="input__text">
				<input type="text" name="apellido" placeholder="Apellidos" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="direccion" placeholder="Direccion" class="input__text">
				<input type="text" name="telefono" placeholder="Ficha de telefono" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="ficha" placeholder="Ficha de ficha" class="input__text">
			</div>
		
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
