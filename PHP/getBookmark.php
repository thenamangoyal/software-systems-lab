<?php
    require_once('connect.php');

    if (isset($_POST["event_id"]) && trim($_POST["event_id"]) != "" && isset($_POST["user_id"]) && trim($_POST["user_id"]) != ""){

        $user = $_POST["user_id"];
    	$event = $_POST["event_id"];
    	
        $statement = "SELECT * FROM bookmarks WHERE event_id = '$event' AND user_id = '$user';";
        $res = mysqli_query($connect,$statement);
        $result = array();
        if (mysqli_num_rows($res) == 1) {
    	    if ($row = mysqli_fetch_array($res)) {
                if ($row['active'] == 1){
                    array_push($result,
                    array('event_id'=>$row['event_id'],
                    'user_id'=>$row['user_id'],
                    ));
                    echo json_encode(array("bookmark"=>$result, "success"=>true));
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