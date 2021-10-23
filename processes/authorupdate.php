<?php
session_start();
     require_once "../configs/dbconnection.php";

    $userId = $_SESSION["control"]["userId"]; 


  if (isset($_POST["edit"])){ 
    
    $Full_Name = mysqli_real_escape_string($conn, $_POST["Full_Name"]);
    $UserType = mysqli_real_escape_string($conn, $_POST["UserType"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phone_Number = mysqli_real_escape_string($conn, $_POST["phone_Number"]);
    $Address = mysqli_real_escape_string($conn, $_POST["Address"]);
    $DateOfBirth = mysqli_real_escape_string($conn, $_POST["DateOfBirth"]);
    $User_Name = mysqli_real_escape_string($conn, $_POST["User_Name"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $ConfirmPass = mysqli_real_escape_string($conn, $_POST["ConfirmPass"]);

      //since email is a unique key

      $hash_pass = password_hash($ConfirmPass, PASSWORD_DEFAULT); 
      

            $upquery="UPDATE users SET Full_Name = 'Full_Name', email = '$email', UserType = '$UserType' ,phone_Number='$phone_Number', Address='$Address',DateOfBirth='$DateOfBirth',password = '$hash_pass'WHERE userId ='$userId';";


    if($conn->query($upquery) === TRUE){
      echo "<script type='text/javascript'>alert(\"User Details has been Updated.\");window.location.href='../dashboard.php';</script>";
        exit();
        print "Record stored successfully";
    }else{
        print "Failed: " . $conn->error;
    }
    
    } 
  
   
?>