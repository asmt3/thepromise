<?php

function saveMessage($caller_number, $caller_message) {

	// Create connection
	//TODO Put these details somewhere common!
	$conn=mysqli_connect("localhost","root","","promise");

	// Check connection
	if (mysqli_connect_errno()) {
	  die("Failed to connect to MySQL: " . mysqli_connect_error());
	}

	if(!($stmt = $conn->prepare("INSERT INTO messages (`from`, content) VALUES (?, ?)"))) {
	   die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
	}

	$stmt->bind_param("ss", $caller_number, $caller_message);
	$stmt->execute();
}

?>
