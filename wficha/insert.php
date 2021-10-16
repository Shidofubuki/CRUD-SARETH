<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$Ficha=$_POST['Ficha'];
		$Programa=$_POST['Programa'];

		if(!empty($Ficha) && !empty($Programa) ){
			if(!filter_var($Programa)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_insert=$con->prepare('INSERT INTO ficha(Ficha,Programa) VALUES(:Ficha,:Programa)');
				$consulta_insert->execute(array(
					':Ficha' =>$Ficha,
					':Programa' =>$Programa,
				
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
	<title>Nuevo Ficha</title>
	<link rel="stylesheet" href="/css/estilo.css">
	<link rel="icon" type="image/png" sizes="16x16" href="/images/3.jfif">
</head>
<body>
	<div class="contenedor">
		<h2>Insertar Fichas</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="Ficha" placeholder="Numero de ficha" class="input__text">
				<input type="text" name="Programa" placeholder="Numero de programa" class="input__text">
			</div>
			
		
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
