<?php

include ("conection.php");

$query = "SELECT * FROM persona ORDER BY cedula desc;";
$result = mysqli_query($conection, $query);

if (!$result) {
    die("Error");
}else{
    
    while($data = mysqli_fetch_assoc($result)){
       $array["data"][] = $data;
    }
    echo json_encode($array);
}

mysqli_free_result($result);
mysqli_close($conection);

?>