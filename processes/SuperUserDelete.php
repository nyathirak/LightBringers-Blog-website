<?php

require_once "../configs/dbconnection.php";
	
if(isset($_GET['userId'])){
$userId= $_GET['userId'];

$delete_record="DELETE FROM users WHERE userId = '$userId'";


if($conn->query($delete_record) === TRUE ){
	header ("Location: ../SuperUser_Delete.php");
	}else{
		 echo "<script type='text/javascript'>alert(\"Record Could Not be Deleted! \");</script>";
		//print "Record Could Not be Deleted";
	}
	
	
}

?>


