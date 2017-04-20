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
                	$update_statement = "UPDATE bookmarks SET active = 0 WHERE event_id = '$event' AND user_id = '$user';";
                	if (mysqli_query($connect, $update_statement)){
                		echo json_encode(array("success"=>true));
                	}
                	else{
                		echo json_encode(array("success"=>false));
                	}
                }
                else{
                    $update_statement = "UPDATE bookmarks SET active = 1 WHERE event_id = '$event' AND user_id = '$user';";
                	if (mysqli_query($connect, $update_statement)){
                		echo json_encode(array("success"=>true));
                	}
                	else{
                		echo json_encode(array("success"=>false));
                	}
                }
                            
    	    }
    	}
        else if (mysqli_num_rows($res) == 0){
        	$insert_statement = mysqli_prepare($connect, "INSERT INTO bookmarks (user_id, event_id, active) VALUES (?, ?, ?)");
        		$val = 1;
                mysqli_stmt_bind_param($insert_statement, "iii", $user, $event, $val);
                if (mysqli_stmt_execute($insert_statement)){
                    mysqli_stmt_close($insert_statement);
                    echo json_encode(array("success"=>true));
                }
                else{
                	mysqli_stmt_close($insert_statement);
            		echo json_encode(array("success"=>false));
                }
                
        }
        else{
        	$delete_statement = "DELETE FROM bookmarks WHERE event_id = '$event' AND user_id = '$user';";
        	mysqli_query($connect,$delete_statement);
        	$insert_statement = mysqli_prepare($connect, "INSERT INTO bookmarks (user_id, event_id, active) VALUES (?, ?, ?)");
        		$val = 1;
                mysqli_stmt_bind_param($insert_statement, "iii", $user, $event, $val);
                if (mysqli_stmt_execute($insert_statement)){
                    mysqli_stmt_close($insert_statement);
                    echo json_encode(array("success"=>true));
                }
                else{
                	mysqli_stmt_close($insert_statement);
            		echo json_encode(array("success"=>false));
                }

        }

    }   
	else{
		echo json_encode(array("success"=>false));
	}

    
    mysqli_close($connect);
?>