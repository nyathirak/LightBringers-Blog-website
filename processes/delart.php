
<?php
session_start();
require_once "../configs/dbconnection.php";

 if (isset($_GET["articleId"])){
  $articleId = $_GET["articleId"];


$delete_article="DELETE FROM articles WHERE articleId = '$articleId'";


if($conn->query($delete_article) === TRUE ){
  echo "<script type='text/javascript'>alert(\"Record Could Deleted! \");</script>";
  header ("Location: vart.php");
  }else{
    echo "<script type='text/javascript'>alert(\"Record Could Not be Deleted! \");</script>";
    header ("Location: delart.php");
    //print "Record Could Not be Deleted";
  }
  
}


?>