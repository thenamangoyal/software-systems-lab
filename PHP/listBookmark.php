<?php
    require_once('connect.php');

    if (isset($_POST["user_id"]) && trim($_POST["user_id"]) != ""){
        $user_id = trim($_POST["user_id"]);
    $limit = 0;
    if (isset($_POST["limit"])){
        $limit = $_POST["limit"];
    }
        $statement = "SELECT * FROM bookmarks WHERE (user_id = '$user_id'  AND active = 1) ORDER BY created DESC LIMIT 10 OFFSET " . 10*$limit;
        $res = mysqli_query($connect,$statement);
        $result = array();
        if (mysqli_num_rows($res) > 0) {
    	    while ($row = mysqli_fetch_array($res)) {
    	    	$event_id = $row["event_id"];

                $event_statement = "SELECT * FROM events WHERE event_id = '$event_id';";
                $event_res = mysqli_query($connect,$event_statement);
                $event_result = array();
                if (mysqli_num_rows($event_res) ==1) {
                    if ($event_row = mysqli_fetch_array($event_res)) {

                        $user_id = $event_row['user_id'];
                        $user_statement = "SELECT * FROM user WHERE user_id = '$user_id';";
                        $user_res = mysqli_query($connect,$user_statement);
                        if ($user_row = mysqli_fetch_array($user_res)) {

                            array_push($result,
                            array('event_id'=>$event_row['event_id'],
                            'name'=>$event_row['name'],
                            'creator'=>$user_row['name'],
                            'time'=>$event_row['time'],
                            'venue'=>$event_row['venue'],
                            'details'=>$event_row['details'],
                            'usertype_id'=>$event_row['usertype_id'],
                            'user_id'=>$event_row['user_id'],
                            'category_id'=>$event_row['category_id']
                            ));
                        }
                    }
                }
    	    }
    	}
    }
    if (count($result) > 0){
        echo json_encode(array("events"=>$result, "success"=>true));
    }
    else{
        echo json_encode(array("success"=>false));
    }
    
    mysqli_close($connect);
?>