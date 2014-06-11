<?php

include "messages.php";

header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

//Extract form post variables
$sms_number = $_POST["From"];
$sms_content = $_POST["Body"];

saveMessage($sms_number, $sms_content);

?>
<Response>
	<Message>Hi, thanks for the contact - we'll be in touch shortly</Message>
</Response>
