<?php

include(conection.php);

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$cedula = $_POST["cedula"];
$opcion = $_POST["cedula"];
$informacion = [];

/* Menu */

if ($opcion = 'modificar') {
    modificar($nombre, $apellido, $cedula, $id, $conexion);
}else if ($opcion = 'eliminar'){
    eliminar($id, $conexion);
}else{
    /* Aun no lo he programado :v */
}

function modificar($nombre, $apellido, $cedula, $id, $conexion){
    $query = "UPDATE persona SET
            nombre = '$nombre',
            apellido = '$apellido',
            cedula = '$cedula',
            WHERE id = $id
    ";

    $result = mysqli_query($conexion, $query);
    verificar_resultado($result);
    mysqli_close($conexion);
}

function eliminar($id, $conexion){
    $query = "DELETE FROM persona
            WHERE id = $id
    ";

    $result = mysqli_query($conexion, $query);
    verificar_resultado($result);
    mysqli_close($conexion);
}

function verificar_resultado($resultado){
    if (!$resultado) {
        $informacion["respuesta"] = "ERROR";
    }else{
        $informacion["respuesta"] = "EXITO";
    }
    echo json_encode($informacion);
}

?>