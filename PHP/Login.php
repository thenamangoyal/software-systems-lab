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
                    $usertype_sql = "SELECT * FROM usertype WHERE usertype_id = '$colUserType'";
                    $usertype_res = mysqli_query($connect, $usertype_sql);
                    
                    if (mysqli_num_rows($usertype_res) == 1) {
                        if($row = mysqli_fetch_array($usertype_res, MYSQLI_ASSOC)) {
                            $usertype_sql = "SELECT * FROM usertype WHERE usertype_id = '$colUserType'";
                            $usertype_res = mysqli_query($connect, $usertype_sql);
                            
                            if (mysqli_num_rows($usertype_res) == 1) {
                                if($usertype_row = mysqli_fetch_array($usertype_res, MYSQLI_ASSOC)) {
                                    $response["usertype"] = $usertype_row["name"];
                                }
                            }
                        }
                    }
                    $response["created"] = $colCreated;
                    $response["name"] = $colName;

                    $cat_stat = "SELECT * FROM usertype";
                    $cat_res = mysqli_query($connect, $cat_stat);
                    $response["usertypes"] = mysqli_num_rows($cat_res);



                }
            }
        }
    }
    echo json_encode($response);    
    mysqli_close($connect);
?>
