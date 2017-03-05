<?php
    require_once('connect.php');

    $statement = "SELECT * FROM events";
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