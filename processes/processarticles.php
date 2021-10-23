<?php
 session_start();  
     require_once "../configs/dbconnection.php";

      $userId = $_SESSION["control"]["userId"];

if (isset($_POST["save_article"])){    

    $article_title = mysqli_real_escape_string($conn, $_POST["article_title"]);
    $article_full_text = mysqli_real_escape_string($conn, $_POST["article_full_text"]);
  
    
    $art_insert = "INSERT INTO articles(authorId,article_title,article_full_text,article_created_date,article_last_update,article_display,article_order) VALUES ('$userId', '$article_title', '$article_full_text', UNIX_TIMESTAMP(), UNIX_TIMESTAMP(), '','')";
    
    if($conn->query($art_insert) === TRUE){
         echo "<script type='text/javascript'>alert(\"Article Saved!.\");window.location.href='../vart.php';</script>";
        
        exit();
    }else{
        print "Failed: " . $conn->error;
    }
    
    }
?>


