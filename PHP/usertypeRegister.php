<?php
    require_once('connect.php');
    $response = array();
    
	    $sql = "SELECT * FROM usertype WHERE usertype_id!='0' ORDER BY usertype_id ASC";
		$res = mysqli_query($connect, $sql);
		
		if (mysqli_num_rows($res) > 0) {
	    	$result = array();
		    while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
		    	array_push($result,
				array('usertype_id'=>$row['usertype_id'],
				'name'=>$row['name']
				));
			       
			    }
			$response["usertype"] = $result;
		    $response["success"] = true;
		}
		else{
			$response["success"] = false;
		}

    echo json_encode($response);
    mysqli_close($connect);
?>