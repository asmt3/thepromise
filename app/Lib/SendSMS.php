<?php

class SendSMS {



	static function go($sms_number, $sms_content) {
		$url = 'https://AC020483e97e28907308082f3f01462f8c:3550d43b39505fdf565bf039cd2a1643@api.twilio.com/2010-04-01/Accounts/AC020483e97e28907308082f3f01462f8c/Messages';
		$From = '+441290366056';

		$fields = array(
			'From' => $From,
			'To' => $sms_number,
			'Body' => $sms_content,
		);

		$fields_string = '';
		foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
		rtrim($fields_string, '&');


		//open connection
		$ch = curl_init();

		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_POST, count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		//execute post
		$result = curl_exec($ch);

		//close connection
		curl_close($ch);

	}
	


}