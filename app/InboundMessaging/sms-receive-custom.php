<?php

include "messages.php";

//Extract form post variables
$sms_number = $_POST["sms_number"];
$sms_content = $_POST["sms_content"];

saveMessage($sms_number, $sms_content);
?>
<html><body>Success</body></html>
