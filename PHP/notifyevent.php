<?php
// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AAAA1Db7cpQ:APA91bFDboy15v176Tr04_uNgrOYLqLcUzt2fYPTj6JlNCMnTxMIB2qfgMRaKiL9d8STvLqjWCvOBoWP_I7VLNo-GRqCyD6Hhoo3gJWgwCajU6TSTBtWS2A5RC2hjqvh0Ze6gbvg5Xis' );
if ($argc >= 1){
	$msg = unserialize($argv[1]);
	$topic = $msg["usertype_id"];
	$fields = array
	(
		'condition'	=> "'$topic' in topics",
		'data'	=> $msg
	);

	// $headers = array
	// (
	// 	'Authorization: key=' . API_ACCESS_KEY,
	// 	'Content-Type: application/json'
	// );
	 
	// $ch = curl_init();
	// curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
	// curl_setopt( $ch,CURLOPT_POST, true );
	// curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
	// curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
	// curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
	// curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
	// $result = curl_exec($ch );
	// curl_close( $ch );

	$url = 'https://fcm.googleapis.com/fcm/send';
	$header = array( );     		 
	$jsonData  = json_encode( $fields );
	$header[ ] = 'Content-type: application/json';
	$header[ ] = 'Authorization: key=' . API_ACCESS_KEY;
	$header[ ] = 'Content-Length: ' . mb_strlen( $jsonData );
	$header[ ] = 'Connection: close';
	$opts = array(
		 'http' => array(
			 'method' => 'POST'
		)
	);
	$opts[ 'http' ][ 'header' ] = implode( "\r\n", $header );
	$opts[ 'http' ][ 'content' ] = $jsonData;
	$opts[ 'ssl' ]               = array(
		 'verify_peer' => false
	);
	$context = stream_context_create( $opts );

	$result = file_get_contents( $url, false, $context );
	// echo $result;
}

?>