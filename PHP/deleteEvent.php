<?php
    require_once('connect.php');

    $response = array();
    $response["success"] = false;

    if (isset($_POST["event_id"]) && trim($_POST["event_id"]) != "" && isset($_POST["user_id"]) && trim($_POST["user_id"]) != ""){

	    $event_id = trim($_POST["event_id"]);
	    $user_id = trim($_POST["user_id"]);

	    $event_statement = "DELETE FROM events WHERE event_id = '$event_id' AND user_id = '$user_id';";
        if (mysqli_query($connect,$event_statement)) {
        	$statement = "DELETE FROM events SET name = '$name', venue = '$venue', time = '$eventtime', details = '$details'";
			$bookmark_statement = "DELETE FROM bookmarks WHERE event_id = '$event_id';";
            mysqli_query($connect,$bookmark_statement);
            $response["success"] = true;
        }
    }
    echo json_encode($response);
    mysqli_close($connect);
    $_POST = array();
?>
