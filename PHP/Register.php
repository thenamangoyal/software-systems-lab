<?php
    require_once('connect.php');
     $response = array();
    $response["success"] = false;  

    if (isset($_POST["name"]) && trim($_POST["name"]) != "" && isset($_POST["email"]) && trim($_POST["email"]) != "" && isset($_POST["usertype_id"]) && trim($_POST["usertype_id"]) != "" && isset($_POST["password"]) && $_POST["password"] != ""){
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $usertype_id = trim($_POST["usertype_id"]);
    $password = $_POST["password"];

    function registerUser() {
        global $connect, $name, $email, $usertype_id, $password;
        $allowed = array('iitrpr.ac.in');
        // Make sure the address is valid
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($password) >= 8){
            
            $explodedEmail = explode('@', $email);
            $domain = array_pop($explodedEmail);

            if (in_array($domain, $allowed)){
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $statement = mysqli_prepare($connect, "INSERT INTO user (name, email, password, usertype_id) VALUES (?, ?, ?, ?)");
                mysqli_stmt_bind_param($statement, "sssi", $name, $email, $passwordHash, $usertype_id);
                if (mysqli_stmt_execute($statement)){
                    mysqli_stmt_close($statement);
                    return true;
                }
                mysqli_stmt_close($statement);
            }
        }
        return false;
    }
    function emailAvailable() {
        global $connect, $email;
        $statement = mysqli_prepare($connect, "SELECT * FROM user WHERE email = ?"); 
        mysqli_stmt_bind_param($statement, "s", $email);
        mysqli_stmt_execute($statement);
        mysqli_stmt_store_result($statement);
        $count = mysqli_stmt_num_rows($statement);
        mysqli_stmt_close($statement); 
        if ($count < 1){
            return true; 
        }else {
            return false; 
        }
    }
     if (emailAvailable()){
        if(registerUser()){
            $response["success"] = true;
        }
    }
}
   

   
    
    echo json_encode($response);
    mysqli_close($connect);
    $_POST = array();
?>
