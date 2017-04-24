<?php
    require_once('connect.php');
    $result = array();
    $result["success"] = false;
    if (isset($_POST["event_id"]) && trim($_POST["event_id"]) != "" && isset($_POST["user_id"]) && trim($_POST["user_id"]) != ""){

        $user = $_POST["user_id"];
    	$event = $_POST["event_id"];

        $event_statement = "SELECT * FROM events WHERE event_id = '$event';";
        $event_res = mysqli_query($connect,$event_statement);
        if (mysqli_num_rows($event_res) ==1) {
    	
            $statement = "SELECT * FROM bookmarks WHERE event_id = '$event' AND user_id = '$user';";
            $res = mysqli_query($connect,$statement);
            if (mysqli_num_rows($res) == 1) {
        	    if ($row = mysqli_fetch_array($res)) {
                    if ($row['active'] == 1){
                    	$update_statement = "UPDATE bookmarks SET active = 0, updated = now() WHERE event_id = '$event' AND user_id = '$user';";
                    	if (mysqli_query($connect, $update_statement)){
                    		$result["success"] = true;
                    	}
                    }
                    else{
                        $update_statement = "UPDATE bookmarks SET active = 1, updated = now() WHERE event_id = '$event' AND user_id = '$user';";
                    	if (mysqli_query($connect, $update_statement)){
                    		$result["success"] = true;
                    	}
                    }
                                
        	    }
        	}
            else if (mysqli_num_rows($res) == 0){
            	$insert_statement = mysqli_prepare($connect, "INSERT INTO bookmarks (user_id, event_id, active,updated) VALUES (?, ?, ?, now())");
            		$val = 1;
                    mysqli_stmt_bind_param($insert_statement, "iii", $user, $event, $val);
                    if (mysqli_stmt_execute($insert_statement)){                    
                        $result["success"] = true;
                    }
                    mysqli_stmt_close($insert_statement);
                    
            }
            else{
            	$delete_statement = "DELETE FROM bookmarks WHERE event_id = '$event' AND user_id = '$user';";
            	mysqli_query($connect,$delete_statement);
            	$insert_statement = mysqli_prepare($connect, "INSERT INTO bookmarks (user_id, event_id, active,updated) VALUES (?, ?, ?, now())");
            		$val = 1;
                    mysqli_stmt_bind_param($insert_statement, "iii", $user, $event, $val);
                    if (mysqli_stmt_execute($insert_statement)){
                        $result["success"] = true;
                    }
                    mysqli_stmt_close($insert_statement);

            }
        }
        else{
            $delete_statement = "DELETE FROM bookmarks WHERE event_id = '$event';";
            mysqli_query($connect,$delete_statement);
        }

    }
    echo json_encode($result);
    
    mysqli_close($connect);
?>