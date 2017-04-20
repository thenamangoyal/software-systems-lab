<?php
    require_once('connect.php');

    $user_condition = "";
    if (isset($_POST["usertype_id"]) && trim($_POST["usertype_id"]) != ""){
    	$use = $_POST["usertype_id"];
    	$user_condition = " AND (usertype_id= '$use' OR usertype_id='0')";
    }
    else{
    	$user_condition = " AND usertype_id='0'";
    }

    $category_condition ="";
    if (isset($_POST["category_id"]) && trim($_POST["category_id"]) != ""){
    	$cat = $_POST["category_id"];
        if ($cat != 0){
            $category_condition = " AND category_id='$cat'";
        }    	
    }

    $limit = 0;
    if (isset($_POST["limit"])){
        $limit = $_POST["limit"];
    }
    $statement = "SELECT * FROM events WHERE `time`>= NOW()" . $user_condition . $category_condition . " ORDER BY time DESC LIMIT 10 OFFSET " . 10*$limit;
    $res = mysqli_query($connect,$statement);
    $result = array();
    if (mysqli_num_rows($res) > 0) {
	    while ($row = mysqli_fetch_array($res)) {
	    	$result[] = $row;
	    }
	    echo json_encode(array("events"=>$result, "success"=>true));
	}
	else{
		echo json_encode(array("success"=>false));
	}

    
    mysqli_close($connect);
?>