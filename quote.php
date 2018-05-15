<?php
require 'db.php';


$area = $_POST['area'];
if(empty($area)){
	$area="Null";
}
$desc = $_POST['desc'];
if(empty($desc)){
	$desc="Null";
}

if(isset($_POST['name'])){
	$name = $_POST['name'];
	if(empty($name)){
		echo "wrong";
	}
	else{
		if(isset($_POST['mail'])){
			$mail = $_POST['mail'];
			if(!preg_match('/^([a-z0-9]+([_\.\-]{1}[a-z0-9]+)*){1}([@]){1}([a-z0-9]+([_\-]{1}[a-z0-9]+)*)+(([\.]{1}[a-z]{2,6}){0,3}){1}$/i' , $mail)){
				echo "wrong";
			}
	else{
		if(isset($_POST['phone'])){
			$phone = $_POST['phone'];
			if(!preg_match('/^\d{10}$/' , $phone)){
				echo "wrong";
		}
else{
 	$sql = "INSERT INTO quote (name, mail, phone, area, message) VALUES ('$name', '$mail', '$phone', '$area', '$desc')";

	if ($conn->query($sql) === TRUE) {
	    echo "Thank you.We Will get back you soon!!!";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	}
}
}
}
}
}
?>