<?php
	include_once 'conexion.php';

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$con->prepare('SELECT * FROM aprendices WHERE id=:id');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: index.php');
	}
	
    if(isset($_POST['guardar'])){
		$tipo=$_POST['tipo'];
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$direccion=$_POST['direccion'];
		$telefono=$_POST['telefono'];
		$ficha=$_POST['ficha'];	
		$id=(int) $_GET['id'];
    
        
        $cnx = mysqli_connect("localhost", "root", "", "crud");
        $sql = "UPDATE aprendices set tipo='$tipo', nombre='$nombre', apellido='$apellido', direccion='$direccion', telefono='$telefono', ficha='$ficha'  WHERE id = '$id'";
        $rta = mysqli_query($cnx, $sql);
        header("Location: index.php");
    }


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Cliente</title>
	<link rel="stylesheet" href="/css/estilo.css">
	<link rel="icon" href="/images/Simbolo tu valle.png">
</head>
<body>
	<div class="contenedor">
		<h2>Editar Aprendices</h2>
		<form action="" method="post">

            <div class="form-group"> 
				<input type="text" name="id" value="<?php if($resultado) echo $resultado['id']; ?>" class="input__text">
				<input type="text" name="tipo" value="<?php if($resultado) echo $resultado['tipo']; ?>" class="input__text">
			</div>

			<div class="form-group"> 
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input__text">
				<input type="text" name="apellido" value="<?php if($resultado) echo $resultado['apellido']; ?>" class="input__text">
			</div>

			<div class="form-group">
				<input type="text" name="telefono" value="<?php if($resultado) echo $resultado['telefono']; ?>" class="input__text">
				<input type="text" name="direccion" value="<?php if($resultado) echo $resultado['direccion']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="ficha" value="<?php if($resultado) echo $resultado['ficha']; ?>" class="input__text">
			</div>
			
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
