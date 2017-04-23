<?php
    require_once('connect.php');

    $response =array();
    $response["success"] = false;
	if (isset($_POST["user_id"]) && trim($_POST["user_id"]) != ""){
		define( 'API_ACCESS_KEY', 'AAAA1Db7cpQ:APA91bFDboy15v176Tr04_uNgrOYLqLcUzt2fYPTj6JlNCMnTxMIB2qfgMRaKiL9d8STvLqjWCvOBoWP_I7VLNo-GRqCyD6Hhoo3gJWgwCajU6TSTBtWS2A5RC2hjqvh0Ze6gbvg5Xis' );
        $user = $_POST["user_id"];
    	
        $statement = "SELECT * FROM fcm WHERE user_id = '$user';";
        $res = mysqli_query($connect,$statement);
        if (mysqli_num_rows($res) == 1) {
    	    if ($row = mysqli_fetch_array($res)) {                

				$token = $row['token'];
				 
				// $headers = array
				// (
				// 	'Authorization: key=' . API_ACCESS_KEY
				// );
				 
				// $ch = curl_init();
				// curl_setopt( $ch,CURLOPT_URL, 'https://iid.googleapis.com/iid/info/' . $token . '?details=true' );
				// curl_setopt( $ch,CURLOPT_HTTPGET, true );
				// curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
				// curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
				// curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
				// $result = curl_exec($ch );
				// curl_close( $ch );
				// echo $result;

				$url = 'https://iid.googleapis.com/iid/info/' . $token . '?details=true';

				$options = array(
				    'http' => array(
				        'header'  => 'Authorization: key=' . API_ACCESS_KEY . "\r\n",
				        'method'  => 'GET'
				    ),
				);
				$context  = stream_context_create($options);
				$result = file_get_contents($url, false, $context);
				$json = json_decode($result, true);
				$topics = array();
				foreach ($json['rel']['topics'] as $key => $value) {
				 	array_push($topics,
				array('topic'=>$key
				));
				 };
				 if (count($topics) > 0){
				 	$response["success"] = true;
				 	$response["topics"] = $topics;
				 }
				
				
			}
		}
	}
	echo json_encode($response);
?>