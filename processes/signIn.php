<?php
session_start(); 
require_once "../configs/dbconnection.php";

if (isset($_POST["sign_in"]))
{    
    $username_entered = mysqli_real_escape_string($conn, $_POST["User_Name"]);
    $password_entered = mysqli_real_escape_string($conn, $_POST["password"]);

   //$hash_entered = password_hash($password_entered,PASSWORD_DEFAULT); 

    $sqlquery="SELECT * FROM users WHERE User_Name = '$username_entered' LIMIT 1";   

    $query_result = $conn->query($sqlquery);

    //$result= $query_result->fetch_assoc();
    //echo"<pre>";
    //print_r($result);
    //echo"</pre>";

 //echo $hash_entered;
    
   if ($query_result->num_rows > 0)
        {

                    $_SESSION["control"] = $query_result->fetch_assoc();

                    $password_stored = $_SESSION["control"]["password"];
                    $username_stored = $_SESSION["control"]["User_Name"];


            if (password_verify($password_entered, $password_stored) && $username_entered == $username_stored )
                    {
                    
                        header("Location: ../dashboard.php");

                        exit();
                     
                    }else{
                        echo "<script type='text/javascript'>alert(\"Your Username or Password is  wrong \");window.location.href='../';</script>";

                    }
        
       } else
        {
            echo "<script type='text/javascript'>alert(\"Please Enter a Valid Username and Password \");window.location.href='../?not_set';</script>";
             
       }

}


?>
     