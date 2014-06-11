<?php
function saveMessage($caller_number, $caller_message, $message_type = "sms") {

	//where are we posting to?
	$url = 'http://localhost/messages/received';

	//what post fields?
	$fields = array(
	   'from'=>$caller_number,
	   'content'=>$caller_message,
	   'type'=>$message_type
	);

	//build the urlencoded data
	$postvars='';
	$sep='';
	foreach($fields as $key=>$value) 
	{ 
	   $postvars.= $sep.urlencode($key).'='.urlencode($value); 
	   $sep='&'; 
	}

	//open connection
	$ch = curl_init();

	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_POST,count($fields));
	curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	//execute post
	$result = curl_exec($ch);

	//close connection
	curl_close($ch);
}

//OBSOLETE!
function saveMessageDirect($caller_number, $caller_message) {

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
