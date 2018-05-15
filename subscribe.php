<?php 
require 'db.php';

if(isset($_POST['newsletter'])){
$newsletter=$_POST['newsletter'];
if(empty($newsletter)){
	echo "empty";
}
else{
	if(!preg_match('/^([a-z0-9]+([_\.\-]{1}[a-z0-9]+)*){1}([@]){1}([a-z0-9]+([_\-]{1}[a-z0-9]+)*)+(([\.]{1}[a-z]{2,6}){0,3}){1}$/i' , $newsletter)){
		echo "empty";
	}
	else{
		$sql = "INSERT INTO subscribe (mail) VALUES ('$newsletter')";

		if ($conn->query($sql) === TRUE) {
	  		echo "perfect";
		} else {
	    	echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}
}
?>