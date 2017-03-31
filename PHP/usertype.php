<?php
    require_once('connect.php');
    $response = array();
    if (isset($_GET["usertype_id"])){
    	$use = $_GET["usertype_id"];
	    $sql = "SELECT * FROM usertype where usertype_id='$use'";
		$res = mysqli_query($connect, $sql);
		
		if (mysqli_num_rows($res) == 1) {
		  	$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
	       	$response["usertype_id"] = $row['usertype_id'];
	       	$response["name"] = $row['name'];
		    $response["success"] = true;
		}
		else{
			$response["success"] = false;
		}
    }
    else{
	    $sql = "SELECT * FROM usertype  ORDER BY usertype_id ASC";
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
	}

    echo json_encode($response);
    mysqli_close($connect);
?>