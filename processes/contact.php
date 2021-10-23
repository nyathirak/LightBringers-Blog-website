<?php
	session_start(); 
	require_once "../configs/dbconnection.php";
    
   if (isset($_POST["send_message"])){

   	$fullName = mysqli_real_escape_string($conn, $_POST["fullName"]);
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
    $message = mysqli_real_escape_string($conn, $_POST["message"]);
    
    
    $msg_insert = "INSERT INTO messages(fullName, email, message, AccessTime) VALUES ('$fullName', '$email', '$message', UNIX_TIMESTAMP())";
    
	
    if($conn->query($msg_insert) === TRUE){
		 echo "<script type='text/javascript'>alert(\"Message Sent! \");</script>";
        header("Location: ../contactus.php");
        exit();
    }else{
        print "Failed: " . $conn->error;
    }}
    ?>