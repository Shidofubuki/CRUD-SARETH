<?php
	include_once 'conexion.php';

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$con->prepare('SELECT * FROM ficha WHERE id=:id');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: index.php');
	}
	
    if(isset($_POST['guardar'])){
		$Ficha=$_POST['Ficha'];
		$Programa=$_POST['Programa'];
		$id=(int) $_GET['id'];
    
        
        $cnx = mysqli_connect("localhost", "root", "", "crud");
        $sql = "UPDATE ficha set Ficha='$Ficha', Programa='$Programa' WHERE id = '$id'";
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
	<link rel="icon" href="/images/3.jfif">
</head>
<body>
	<div class="contenedor">
		<h2>Editar Fichas</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="Ficha" value="<?php if($resultado) echo $resultado['Ficha']; ?>" class="input__text">
				<input type="text" name="Programa" value="<?php if($resultado) echo $resultado['Programa']; ?>" class="input__text">
			</div>
			
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
