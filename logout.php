<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logged out</title>
      <link rel="stylesheet" href="indexDesktop.css">
</head>
<body>
    
</body>
</html>

<?php
session_start();
session_destroy();
echo ("<div class='animateErrors'> 
            <h3>logged out successfuly.</h3> 
            </div>
            ");
?>