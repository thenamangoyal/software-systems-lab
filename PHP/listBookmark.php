<?php
    require_once('connect.php');
    $response = array();
    $response["success"] = false;
    $result = array();
    if (isset($_POST["user_id"]) && trim($_POST["user_id"]) != ""){
        $user_id = trim($_POST["user_id"]);
    $limit = 0;
    if (isset($_POST["limit"])){
        $limit = $_POST["limit"];
    }
        
        $bookmark_statement = "SELECT * FROM bookmarks WHERE (user_id = '$user_id'  AND active = 1) ORDER BY updated DESC LIMIT 10 OFFSET " . 10*$limit;
        $bookmark_res = mysqli_query($connect,$bookmark_statement);
        if (mysqli_num_rows($bookmark_res) > 0) {
            
            $category_statement = "SELECT * FROM category;";
            $category_res = mysqli_query($connect,$category_statement);
            $category_list = array();
            while ($category_row = mysqli_fetch_array($category_res)) {
                $category_list[$category_row['category_id']] = $category_row['name'];
            }

            $usertype_statement = "SELECT * FROM usertype;";
            $usertype_res = mysqli_query($connect,$usertype_statement);
            $usertype_list = array();
            while ($usertype_row = mysqli_fetch_array($usertype_res)) {
                $usertype_list[$usertype_row['usertype_id']] = $usertype_row['name'];
            }
    	    while ($bookmark_row = mysqli_fetch_array($bookmark_res)) {
    	    	$event_id = $bookmark_row["event_id"];
                $statement = "SELECT * FROM events WHERE event_id = '$event_id';";
                $res = mysqli_query($connect,$statement);
                if (mysqli_num_rows($res) ==1) {
                    if ($row = mysqli_fetch_array($res)) {

                        $user_id = $row['user_id'];
                        $user_statement = "SELECT * FROM user WHERE user_id = '$user_id';";
                        $user_res = mysqli_query($connect,$user_statement);
                        if ($user_row = mysqli_fetch_array($user_res)) {

                            array_push($result,
                            array('event_id'=>$row['event_id'],
                            'name'=>$row['name'],
                            'time'=>$row['time'],
                            'venue'=>$row['venue'],
                            'details'=>$row['details'],
                            'usertype_id'=>$row['usertype_id'],
                            'usertype'=>$usertype_list[$row['usertype_id']],
                            'creator_id'=>$row['user_id'],
                            'creator'=>$user_row['name'],
                            'category_id'=>$row['category_id'],
                            'category'=>$category_list[$row['category_id']]
                            ));
                        }
                    }
                }
                else{
                    $bookmark_id = $bookmark_row["bookmark_id"];
                    $delete_statement = "DELETE FROM bookmarks WHERE bookmark_id = '$bookmark_id';";
                    mysqli_query($connect,$delete_statement);
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