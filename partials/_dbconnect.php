<?php
$server = "localhost";
$username = "id16057528_rocco";
$password = "Rsehgal087@#";
$database = "id16057528_idiscuss";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){
/*     echo "success";
 }
 else{*/
    die("Error". mysqli_connect_error($conn));
}

?>
