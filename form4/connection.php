<?php
	$Fullname = $_POST['Fullname'];
	$Phonenumber = $_POST['Phonenumber'];
	$email = $_POST['email'];

	// Database connection
	$conn = new mysqli('localhost:3309','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(Fullname, Phonenumber,email) values(?, ?, ?)");
		$stmt->bind_param("sis", $Fullname, $Phonenumber,$email);
		$execval = $stmt->execute();
		echo $execval;
		echo "... Registration successfully ...";
		$stmt->close();
		$conn->close();
	}
?>