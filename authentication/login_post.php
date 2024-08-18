<?php
require "../config/database.php";

session_start();
$email = $_POST["email"];
$password = $_POST["password"];

$email_regex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
$password_regex = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

$flag = true;


if(!$email){
    $_SESSION['email_error'] = 'email field is required!!!';
    $flag = false;
    header("location: login.php");
}
else if(!preg_match($email_regex, $email)){
    $_SESSION['email_error'] = 'invalid email';
    $flag = false;
    header("location: login.php");
}

if(!$password){
    $_SESSION['password_error'] = 'password field is required!!!';
    $flag = false;
    header("location: login.php");
}
else if(strlen($password) < 8){
    $_SESSION['password_error'] = 'password field need at least 8 charecters';
    $flag = false;
    header("location: login.php");
}
else if(!preg_match($password_regex, $password)){
    $_SESSION['email_error'] = '';
    $flag = false;
    header("location: login.php");
}


if($flag){
    $encrypted = sha1($password);
    $count_query = "SELECT COUNT(*) AS 'result' FROM users WHERE email='$email' AND password='$encrypted'"; 
    $connect = mysqli_query($db,$count_query);
    if(mysqli_fetch_assoc($connect)["result"] == 1){
        $get_data_query = "SELECT * FROM users WHERE  email='$email'";
        $connect = mysqli_query($db,$get_data_query);
        $user = mysqli_fetch_assoc($connect);
        $_SESSION['auth_id'] = $user['id'];
        $_SESSION['auth_name'] = $user['name'];
        $_SESSION['temp_name'] = $user['name'];
        $_SESSION['auth_email'] = $user['email'];
        header("location: ../dashboard/home/home.php");
    }
    else{
        $_SESSION['login_failed'] = "credintial doesn't match";
        header("location: login.php");
    }
}


?>