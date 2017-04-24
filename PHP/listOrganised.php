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
        $statement = "SELECT * FROM events WHERE user_id = '$user_id' ORDER BY time DESC LIMIT 10 OFFSET " . 10*$limit;
        $res = mysqli_query($connect,$statement);
        if (mysqli_num_rows($res) > 0) {
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

            while ($row = mysqli_fetch_array($res)) {
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
    }
    if (count($result) > 0){
       $response["events"] = $result;
       $response["success"] = true;
    }

    echo json_encode($response);
    
    mysqli_close($connect);
?>