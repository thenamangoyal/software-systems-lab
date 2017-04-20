<?php
    require_once('connect.php');

    if (isset($_POST["event_id"]) && trim($_POST["event_id"]) != ""){
    	$use = $_POST["event_id"];
    	
        $statement = "SELECT * FROM events WHERE event_id = '$use';";
        $res = mysqli_query($connect,$statement);
        $result = array();
        if (mysqli_num_rows($res) ==1) {
    	    if ($row = mysqli_fetch_array($res)) {

                $user_id = $row['user_id'];
                $user_statement = "SELECT * FROM user WHERE user_id = '$user_id';";
                $user_res = mysqli_query($connect,$user_statement);
                if ($user_row = mysqli_fetch_array($user_res)) {

        	    	array_push($result,
        			array('event_id'=>$row['event_id'],
        			'name'=>$row['name'],
                    'creator'=>$user_row['name'],
        			'time'=>$row['time'],
        			'venue'=>$row['venue'],
        			'details'=>$row['details'],
                    'category_id'=>$row['category_id']
        			));
                    echo json_encode(array("events"=>$result, "success"=>true));
                }                
                else{
                    echo json_encode(array("success"=>false));
                }
    	    }
    	}
        else{
            echo json_encode(array("success"=>false));
        }

    }   
	else{
		echo json_encode(array("success"=>false));
	}

    
    mysqli_close($connect);
?>