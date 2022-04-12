<?php
	$firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
	$email = $_POST['email'];
    $no = $_POST['no'];

	// Database connection
	$conn = new mysqli('localhost:3309','root','','test2');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstname,lastname,email,no) values(?, ?, ?, ?)");
		$stmt->bind_param("sssi", $firstname,$lastname,$email,$no);
		$execval = $stmt->execute();
		echo $execval;
		echo "... Registration successfully ...";
		$stmt->close();
		$conn->close();
	}
?>