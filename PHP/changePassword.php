<?php
    require_once('connect.php');
     $response = array();
    $response["success"] = false;  

    if (isset($_POST["oldPassword"]) && isset($_POST["newPassword"]) && isset($_POST["email"]) && trim($_POST["email"]) != "" && strlen($_POST["newPassword"]) >= 8){
        $email = trim($_POST["email"]);
        $oldPassword = $_POST["oldPassword"];
        $newPassword = $_POST["newPassword"];

        $statement = "SELECT * FROM user WHERE email = '$email'";
        $res = mysqli_query($connect,$statement);
        if (mysqli_num_rows($res) == 1) {
            if ($row = mysqli_fetch_array($res)) {
                if (password_verify($oldPassword,$row["password"])) {
                    $newpashash = password_hash($newPassword, PASSWORD_DEFAULT);
                    $update_statement = "UPDATE user SET password = '$newpashash' WHERE email = '$email'";
                    if (mysqli_query($connect, $update_statement)){
                        $response["success"] = true;  
                    }
                    else{
                        $response["success"] = false;  
                    }
                }
            }
        }
    }

   
    
    echo json_encode($response);
    mysqli_close($connect);
    $_POST = array();
?>
