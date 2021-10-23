<?php
    session_start();
    include("database_connection.php");
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $pass = $_POST['password'];


   $status = validate_data( $fullName,$email,$pass);
    if($status){
        $query = "insert into my_users(full_name,email,password) values ('$fullName','$email','$pass')";
        $result = mysqli_query($conn,$query);
        if($result){
            echo("<b> Successfuly Submited. </b>");
            //setting auto user_id
            $query = "select user_id, full_name from my_users where full_name='$fullName' and email='$email'";
            $result = mysqli_query($conn,$query);
            while($rowArray =mysqli_fetch_assoc($result)){
                $_SESSION['user'] = $rowArray['full_name'];
                $_SESSION['user_id'] = $rowArray['user_id'];
            }
        }
    }
    else{
        $_SESSION['user'] = false;
    }


    function validate_data($fullName,$email,$pass){
  
        if(strlen($fullName)<4){
            echo("<b> Invalid Name. Failed! </b>");
            return false;
        }
        if(strlen($email)<4){
            echo("<b> Invalid Email. Failed! </b>");
            return false;
        }
        if(strlen($pass)<6){
            echo("<b> Invalid Password. Failed! </b>");
            return false;
        }
        return true; // everything looks good.

    }
    


?>
