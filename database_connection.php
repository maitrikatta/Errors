<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "errors";
    $conn = mysqli_connect($host,$user,$password,$database);
    
    if(!$conn)
        echo "Something went wrong with db connection.";
 

?>