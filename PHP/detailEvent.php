<?php
    require_once('connect.php');
    $response = array();
    if (isset($_POST["event_id"])){
    	$eve = $_POST["event_id"];
	    $sql = "SELECT * FROM events WHERE event_id='$eve'";
		$res = mysqli_query($connect, $sql);
		
		if (mysqli_num_rows($res) == 1) {
		  	$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
	       	$response["event_id"] = $row['event_id'];
	       	$response["name"] = $row['name'];
	       	$response["category_id"] = $row['category_id'];
	       	$response["usertype_id"] = $row['usertype_id'];
	       	$response["time"] = $row['time'];
	       	$response["venue"] = $row['venue'];
	       	$response["details"] = $row['details'];
	       	$response["created"] = $row['created'];
	       	$response["going_count"] = $row['going_count'];
	       	$response["maybe_count"] = $row['maybe_count'];
		    $response["success"] = true;
		}
		else{
			$response["success"] = false;
		}
    }
    else{
	    $response["success"] = false;
	}

    echo json_encode($response);
    mysqli_close($connect);
?>