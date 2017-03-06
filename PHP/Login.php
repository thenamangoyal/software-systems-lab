<?php
    require_once('connect.php');
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $statement = mysqli_prepare($connect, "SELECT * FROM users WHERE username = ?");
    mysqli_stmt_bind_param($statement, "s", $username);
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $colUserID, $colName, $colUsername, $colAge, $colPassword);
    
    $response = array();
    $response["success"] = false;
    
    while(mysqli_stmt_fetch($statement)){
        if (password_verify($password, $colPassword)) {
            $response["success"] = true;
            $response["user_id"] = $colUserID;
            $response["name"] = $colName;
            $response["age"] = $colAge;
        }
    }
    echo json_encode($response);    
    mysqli_close($connect);
?>
