<?php

// now greet the caller
header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
	<Say>Hi, thanks for calling us.  Leave a message and we'll call you straight back.</Say>
	<Record maxLength="30" action="voice-response-finish.php" />
</Response>
