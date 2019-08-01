<?php

include("conection.php");

$opcion = $_POST["opcion"];
$id = $_POST["id"];
$informacion = [];

if (!($opcion == "eliminar")) {

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $cedula = $_POST["cedula"];
}


/* Menu */

if ($opcion == 'modificar') {
    modificar($nombre, $apellido, $cedula, $id, $conection);
}else if ($opcion == 'eliminar'){
    eliminar($id, $conection);
}else{
    /* Aun no lo he programado :v */
}

function modificar($nombre, $apellido, $cedula, $id, $conection){
    $query = "UPDATE persona SET
            nombre = '$nombre',
            apellido = '$apellido',
            cedula = '$cedula'
            WHERE id = $id
    ";  
    $result = mysqli_query($conection, $query);
    verificar_resultado($result);
    mysqli_close($conection);
}

function eliminar($id, $conection){
    $query = "DELETE FROM persona
            WHERE id = $id
    ";

    $result = mysqli_query($conection, $query);
    verificar_resultado($result);
    mysqli_close($conection);
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