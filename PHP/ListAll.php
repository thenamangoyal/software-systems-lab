<?php
    require_once('connect.php');

    $user_condition = "";
    if (isset($_GET["usertype_id"])){
    	$use = $_GET["usertype_id"];
    	$user_condition = " AND (usertype_id= '$use' OR usertype_id='0')";
    }
    else{
    	$user_condition = " AND usertype_id='0'";
    }

    $category_condition ="";
    if (isset($_GET["category_id"])){
    	$cat = $_GET["category_id"];
    	$category_condition = " AND category_id='$cat'";
    }
    $statement = "SELECT * FROM events WHERE `time`>= NOW()" . $user_condition . $category_condition . "  ORDER BY time DESC ;";
    $res = mysqli_query($connect,$statement);
    $result = array();
    if (mysqli_num_rows($res) > 0) {
	    while ($row = mysqli_fetch_array($res)) {
	    	array_push($result,
			array('event_id'=>$row['event_id'],
			'name'=>$row['name'],
			'time'=>$row['time'],
			'venue'=>$row['venue'],
			'details'=>$row['details']
			));
	    }
	    echo json_encode(array("events"=>$result, "success"=>true));
	}
	else{
		echo json_encode(array("success"=>false));
	}

    
    mysqli_close($connect);
?>