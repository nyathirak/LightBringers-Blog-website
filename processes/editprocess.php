<?php 
 require_once "../configs/dbconnection.php";

if (isset($_POST["sign_up"])){   


    $Full_Name = mysqli_real_escape_string($conn, $_POST["Full_Name"]);
    $Email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phone_Number = mysqli_real_escape_string($conn, $_POST["phone_Number"]);
    $User_Name = mysqli_real_escape_string($conn, $_POST["User_Name"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $ConfirmPass = mysqli_real_escape_string($conn, $_POST["ConfirmPass"]);
    $UserType = mysqli_real_escape_string($conn, $_POST["UserType"]);
    $Address = mysqli_real_escape_string($conn, $_POST["Address"]);
    
    
      $hash_pass = password_hash($ConfPass, PASSWORD_BCRYPT);
      
      $edit_users = "UPDATE users SET Full_Name='$Full_Name' ,email='$Email',phone_Number='$phone_Number',User_Name='$User_Name', password='$hash_pass',UserType='$UserType',Address='$Address') WHERE userId='$userId')";
    
    if($conn->query($insert_users) === TRUE){
        header("Location: ../editprofile.php");
        exit();
        print "Record updated successfully";
    }else{
        print "Failed: " . $conn->error;
    }
}
    

?>