<?php
    require_once('connect.php');
    $response = array();
    
	    $sql = "SELECT * FROM category WHERE category_id!='0'  ORDER BY category_id ASC";
		$res = mysqli_query($connect, $sql);
		
		if (mysqli_num_rows($res) > 0) {
	    	$result = array();
		    while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
		    	array_push($result,
				array('category_id'=>$row['category_id'],
				'name'=>$row['name']
				));
			       
			    }
			$response["category"] = $result;
		    $response["success"] = true;
		}
		else{
			$response["success"] = false;
		}
	

    echo json_encode($response);
    mysqli_close($connect);
?>