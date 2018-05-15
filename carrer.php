<?php
require 'db.php';
//$fname=$_POST['firstname'];
//$lname=$_POST['lastname'];
//$mail=$_POST['mail'];
//$phone=$_POST['phone'];
//$profession=$_POST['profession']; 
//$experience=$_POST['experience'];
if(isset($_POST['firstname'])){
	$fname=$_POST['firstname'];
	if(empty($fname)){
		echo "Enter First Name";
	}
	else{
		if(isset($_POST['lastname'])){
			$lname=$_POST['lastname'];
			if(empty($lname)){
				echo "Enter Last Name";
			}
			else{
				if(isset($_POST['mail'])){
					$mail=$_POST['mail'];
					if(empty($mail)){
						echo "Enter Mail Address";
					}
					else{
						if(!preg_match('/^([a-z0-9]+([_\.\-]{1}[a-z0-9]+)*){1}([@]){1}([a-z0-9]+([_\-]{1}[a-z0-9]+)*)+(([\.]{1}[a-z]{2,6}){0,3}){1}$/i' , $mail)){
							echo "Enter Valid Mail Address";
						}
						else{
							if(isset($_POST['phone'])){
								$phone=$_POST['phone'];
								if(empty($phone)){
									echo "Enter Phone Number";
								}
								else{
									if(isset($_POST['phone'])){
									$phone = $_POST['phone'];
									if(!preg_match('/^\d{10}$/' , $phone)){
									echo "Enter Valid Phone Number";
								}
								else{
									if(isset($_POST['profession'])){
										$profession=$_POST['profession'];
										if($profession=="0"){
											echo "Please Choose Your Profession";
										}
										else{
										$target_dir = "uploads/";
										$target_file = $target_dir.$phone . basename($_FILES["fileToUpload"]["name"]);
										$uploadOk = 1;
										$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
										// Check if image file is a actual image or fake image
										if(isset($_POST["submit"])) {
										    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
										    if($check !== false) {
										       // echo "File is an image - " . $check["mime"] . ".";
										        $uploadOk = 1;
										    } else {
										        //echo "File is not an image.";
										        $uploadOk = 0;
										    }
										}
										// Check file size
										if ($_FILES["fileToUpload"]["size"] > 500000) {
										    //echo "Sorry, your file is too large.";
										    $uploadOk = 0;
										}
										// Allow certain file formats
										if($imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "pdf") {
										    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
										    $uploadOk = 0;
										}
										// Check if $uploadOk is set to 0 by an error
										if ($uploadOk == 0) {
										    echo "Please Upload PDF or docx file";
										// if everything is ok, try to upload file
										} else {
											if (!isset($_POST['experience'])){
												echo "Please Choose Your Experience";
											}
											else{
												$experience=$_POST['experience'];
												$sql = "INSERT INTO carrer (firstname, lastname, phone, email, profession, resume, experience) VALUES ('$fname', '$lname', '$phone', '$mail', '$profession', '$target_file','$experience')";
												if ($conn->query($sql) === TRUE) {
													if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
												        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
												    } else {
												        echo "Sorry, there was an error uploading your file.";
												    }
												    echo "Thank you.we will get back you soon!!!";
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
							}
						}
					}
				}
			}
		}
	}
}
}
?>