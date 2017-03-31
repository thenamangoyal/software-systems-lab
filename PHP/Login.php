<?php
    require_once('connect.php');
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    
    $response = array();
    $response["success"] = false;

    $allowed = array('iitrpr.ac.in');
    // Make sure the address is valid
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        
        $explodedEmail = explode('@', $email);
        $domain = array_pop($explodedEmail);

        if (in_array($domain, $allowed)){
    
            $statement = mysqli_prepare($connect, "SELECT * FROM user WHERE email = ?");
            mysqli_stmt_bind_param($statement, "s", $email);
            mysqli_stmt_execute($statement);
            mysqli_stmt_store_result($statement);
            mysqli_stmt_bind_result($statement, $colUserID, $colEmail, $colName, $colPassword, $colUserType, $colCreated);
            
            
            
            while(mysqli_stmt_fetch($statement)){
                if (password_verify($password, $colPassword)) {
                    $response["success"] = true;
                    $response["user_id"] = $colUserID;
                    $response["email"] = $colEmail;
                    $response["usertype_id"] = $colUserType;
                    $response["created"] = $colCreated;
                    $response["name"] = $colName;

                }
            }
        }
    }
    echo json_encode($response);    
    mysqli_close($connect);
?>
