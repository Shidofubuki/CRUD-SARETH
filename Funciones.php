<?php
    Function conectar_bd($clave,$basedatos) 
    { 
        $conexion= new mysqli('localhost','root','','crud');
        
        if ($conexion->connect_error) { die('Error de Conexión (' . $conexion->connect_errno . ') '. $conexion->connect_error); } return $conexion; }

    Function consulta ($conexion,$consulta_sql)
    {
    $resultado=$conexion->query($consulta_sql);
    
    if (!$resultado)
    {
    echo 'No se pudo ejecutar la consulta: ' .$conexion->error;
    exit;
}   
    return $resultado;
}

?>      
