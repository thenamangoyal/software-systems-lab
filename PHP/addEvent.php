<?php
    require_once('connect.php');

    $response = array();
    $response["success"] = false;

    if (isset($_POST["event_name"]) && trim($_POST["event_name"]) != "" && isset($_POST["user_id"]) && trim($_POST["user_id"]) != ""  && isset($_POST["category_id"]) && trim($_POST["category_id"]) != "" && isset($_POST["usertype_id"]) && trim($_POST["usertype_id"]) != "" && isset($_POST["venue"]) && trim($_POST["venue"]) != "" && isset($_POST["time"]) && trim($_POST["time"]) != "" && isset($_POST["details"]) && trim($_POST["details"]) != "" ){

	    $event_name = trim($_POST["event_name"]);
	    $user_id = trim($_POST["user_id"]);    
	    $category_id = trim($_POST["category_id"]);
	    $usertype_id = trim($_POST["usertype_id"]);
	    $venue = trim($_POST["venue"]);
	    $eventtime = trim($_POST["time"]);
	    $details = trim($_POST["details"]);
		$statement = mysqli_prepare($connect, "INSERT INTO events (name, user_id, category_id, usertype_id, venue, time, details) VALUES (?, ?, ?, ?, ?, ?, ?)");
		mysqli_stmt_bind_param($statement, "siiisss", $event_name, $user_id, $category_id, $usertype_id, $venue ,$eventtime, $details);
		if (mysqli_stmt_execute($statement)){
		    mysqli_stmt_close($statement);
		    $response["success"] = true;
		    $event_id =  mysqli_insert_id($connect);
		    exec('php notifyevent.php '. $details . ' '. $event_name . ' ' . $event_id . ' > /dev/null 2>/dev/null &');
		}
		mysqli_stmt_close($statement);
	    
    }
    echo json_encode($response);
    mysqli_close($connect);
    $_POST = array();
?>
