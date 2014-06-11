<?php echo json_encode(array(
	'serverTime' => date('Y-m-d H:i:s'),
	'investigations' => $investigations
), JSON_PRETTY_PRINT);