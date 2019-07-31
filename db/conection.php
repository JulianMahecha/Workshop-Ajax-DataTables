<?php
$server = "127.0.0.1";
$user = "root";
$db = "datatables_ws";

$conection = mysqli_connect($server, $user, "", $db);
if (!$conection) {
    die('Error de conexión '.mysqli_connect_errno());
}

?>