<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$tipo=$_POST['tipo'];

		if(!empty($nombre) && !empty($tipo) ){
			if(!filter_var($tipo)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_insert=$con->prepare('INSERT INTO Programa(nombre,tipo) VALUES(:nombre,:tipo)');
				$consulta_insert->execute(array(
					':nombre' =>$nombre,
					':tipo' =>$tipo,
				
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
	<title>Nuevo Programa</title>
	<link rel="stylesheet" href="/css/estilo.css">
	<link rel="icon" type="image/png" sizes="16x16" href="/images/3.jfif">
</head>
<body>
	<div class="contenedor">
		<h2>Insertar Programas</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" placeholder="Nombre" class="input__text">
				<input type="text" name="tipo" placeholder="Tipo" class="input__text">
			</div>
			
		
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
