<?php 

require_once "../connection.php";

$id =  $_GET["id"];

$sql = "DELETE FROM SOLDIERS WHERE id = $id ";

mysqli_query($conn , $sql); 

header("Location: manage-soldier.php?delete-success-where-id=" .$id );


?>
