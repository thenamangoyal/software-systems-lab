<?php
    require_once('connect.php');
    $event_name = $_POST["event_name"];
    $user_id = $_POST["user_id"];    
    $category = $_POST["category"];
    $visible = $_POST["visible"];
    $venue = $_POST["venue"];
    $time = $_POST["time"];
    $details = $_POST["details"];
    
    function registerEvent() {
        global $connect, $event_name, $user_id, $category, $visible, $venue, $time, $details;

        $statement = mysqli_prepare($connect, "INSERT INTO events (name, user_id, category, visible, venue, time, details) VALUES (?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($statement, "siiisss", $event_name, $user_id, $category, $visible, $venue ,$time, $details);
        if (mysqli_stmt_execute($statement)){
            mysqli_stmt_close($statement);
            return true;
        }
        mysqli_stmt_close($statement);
        return false;
        
    }
    function eventAvailable() {
        return true;
    }
    $response = array();
    $response["success"] = false;  
    if (eventAvailable()){
        if(registerEvent()){
            $response["success"] = true;    
        }          
    }
    
    echo json_encode($response);
    mysqli_close($connect);
?>
