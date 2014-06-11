<?php
include "messages.php";

header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

$caller_number =  $_REQUEST['From'];
$message_url = $_REQUEST['RecordingUrl'];

$message = "Voice call - " . $message_url;
saveMessage($caller_number, $message);

?>
<Response>
</Response>
