<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
     <link rel="stylesheet" href="indexDesktop.css">
     <link rel="stylesheet" href="welcomePageStyle.css">
     <script src="validate-CSV-File.js"></script>
</head>
<body>
    <?php

        session_start();
        if(isset($_SESSION['user']))
        {
            $user = $_SESSION['user'];

            if(isset($_SESSION['user_id']))
            {
                $user_id=  $_SESSION['user_id'];
            }
        }
        else
        {
            $user= false;
            $user_id=  false;
        }
        if($user==false){
            echo ("<div class='animateErrors'> 
            <h3>Account not created/log in. </h3> 
            <a href='index.html'> Go Back</a>
            </div>
            ");
        }
        else{
    ?>
        <div id="heading-menu">
                <div> <p> Welcome  <?php  echo($user)?> </p></div>
                <div>                    
                     <a href="logout.php">Logout</a>
                     <?php } ?> 
                </div> 
        </div>
        <?php if($user==false){} else{ ?>
        <div id="csv-form">
            <form  method="post" enctype="multipart/form-data" >
                <label for="csv-input">Upload CSV file</label>
                <input name="myCSVfile" required accept=".csv" id="csv-input" type="file">
                <span>
                    <button name="submit" type="submit" >submit</button>
                </span>
            </form>
        </div>
        <?php }?>
</body>
</html>
 <?php            
            
        if(isset($_POST['submit']))
        {
            include("database_connection.php");
            
            $file = $_FILES["myCSVfile"]["tmp_name"];
            $handle = fopen($file,"r");

            //check valid fields numbers
           while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
               $fieldNums = count($data);
           }
           rewind($handle); //reseting pointer
           if($fieldNums==2)
           {
                $countUsers=0;
                while(($row = fgetcsv($handle,1000,","))!==false)
                {
                    $password = randomPassword();
                    $query = "insert into imported_users(created_by,full_name,email,password) values('$user_id','$row[0]','$row[1]','$password') ";
                    $result = mysqli_query($conn,$query);
                    $countUsers++;
                }  
                 echo ("<div class='animateErrors'> 
                        <h3>Total: $countUsers Users Imported Successfuly </h3> 
                        </div>
                        ");
                              
           }
           else
           {
              echo ("<div class='animateErrors'> 
                    <h3> Has $fieldNums fields. Expected two.</h3> 
                    </div>
                    ");
           }
        }  

    function randomPassword() {
                $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                $pass = array(); //remember to declare $pass as an array
                $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
                for ($i = 0; $i < 8; $i++) {
                    $n = rand(0, $alphaLength);
                    $pass[] = $alphabet[$n];
                }
                return implode($pass); //turn the array into a string
}

 ?>