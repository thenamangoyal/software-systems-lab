<?php
	require_once('connect.php');

	if (isset($_POST["token"]) && trim($_POST["token"]) != "" && isset($_POST["user_id"]) && trim($_POST["user_id"]) != ""){

		$user = $_POST["user_id"];
		$token = $_POST["token"];

		
		$statement = "SELECT * FROM fcm WHERE user_id = '$user';";
		$res = mysqli_query($connect,$statement);
		$result = array();
		if (mysqli_num_rows($res) == 1) {
			if ($row = mysqli_fetch_array($res)) {
				$update_statement = "UPDATE fcm SET token = '$token', updated = now() WHERE user_id = '$user';";
				if (mysqli_query($connect, $update_statement)){
					echo json_encode(array("success"=>true));
				}
				else{
					echo json_encode(array("success"=>false));
				}
			}
		}
		else if (mysqli_num_rows($res) == 0){
			$insert_statement = "INSERT INTO fcm (`user_id`, `token`, `updated`) VALUES ('$user', '$token', now());";
				if (mysqli_query($connect, $insert_statement)){
					echo json_encode(array("success"=>true));
				}
				else{
					echo json_encode(array("success"=>false));
				}
		}
		else{
			$delete_statement = "DELETE FROM fcm WHERE user_id = '$user';";
			mysqli_query($connect,$delete_statement);
			$insert_statement = "INSERT INTO fcm (`user_id`, `token`, `updated`) VALUES ('$user', '$token', now());";
				if (mysqli_query($connect, $insert_statement)){
					echo json_encode(array("success"=>true));
				}
				else{
					echo json_encode(array("success"=>false));
				}

		}

	}   
	else{
		echo json_encode(array("success"=>false));
	}

	
	mysqli_close($connect);
?>