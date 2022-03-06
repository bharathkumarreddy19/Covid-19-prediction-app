<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	// Database connection
	$conn = new mysqli('localhost','root','','final');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 
	else {
		$stmt = $conn->prepare("insert into registration(name, email, subject, message) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $name,  $email, $subject, $message);
		$execval = $stmt->execute();
        echo "Thank you for contacting us. We will get back to you soon...";
		$stmt->close();
		$conn->close();
	}
?>
