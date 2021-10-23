 <?php 

    require_once "../configs/dbconnection.php";
    
   if (isset($_POST["sign_up"])){    
    
    $Full_Name = mysqli_real_escape_string($conn, $_POST["Full_Name"]);
    $UserType = mysqli_real_escape_string($conn, $_POST["UserType"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phone_Number = mysqli_real_escape_string($conn, $_POST["phone_Number"]);
    $Address = mysqli_real_escape_string($conn, $_POST["Address"]);
    $DateOfBirth = mysqli_real_escape_string($conn, $_POST["DateOfBirth"]);
    $User_Name = mysqli_real_escape_string($conn, $_POST["User_Name"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $ConfirmPass = mysqli_real_escape_string($conn, $_POST["ConfirmPass"]);
    
    if($password!=$ConfirmPass){
        echo "<script type='text/javascript'>alert(\"Passwords Do Not match. \");</script>";
           }
           else{ 
            $hash_pass = password_hash($ConfirmPass, PASSWORD_DEFAULT); 

    }
     
     

    $user_insert = "INSERT INTO users (Full_Name, UserType, email,phone_Number, Address, DateOfBirth, User_Name, password, AccessTime) VALUES ('$Full_Name', '$UserType', '$email','$phone_Number', '$Address','$DateOfBirth','$User_Name','$hash_pass', UNIX_TIMESTAMP())";

    
    if($conn->query($user_insert) === TRUE){
        header("Location: ../dashboard.php");
        exit();
        print "Record stored successfully";
    }else{
        print "Failed: " . $conn->error;
    }
    
    } 
   

   




?>