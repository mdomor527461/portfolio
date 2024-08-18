<?php
session_start();
require "../config/database.php";

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$c_password = $_POST["c_password"];

$_SESSION['old_name'] = $name;
$_SESSION['old_email'] = $email;
$_SESSION['old_password'] = $password;
 
$email_regex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
$password_regex = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

echo "<h1>congratulations form validation done</h1>";
$flag = true;
if(!$name){
    $_SESSION['name_error'] = 'name field is required!!!';
    $flag = false;
    header("location: regester.php");
}
else if(!preg_match("/^[a-zA-Z ]*$/", $name)){
    $_SESSION['name_error'] = 'name field support alpha and white space';
    $flag = false;
    header("location: regester.php");
}
else if(strlen($name) > 55){
    $_SESSION['name_error'] = 'name field can contain only 55 letters';
    $flag = false;
    header("location: regester.php");
}

if(!$email){
    $_SESSION['email_error'] = 'email field is required!!!';
    $flag = false;
    header("location: regester.php");
}
else if(!preg_match($email_regex, $email)){
    $_SESSION['email_error'] = 'invalid email';
    $flag = false;
    header("location: regester.php");
}
//password validation start
if(!$password){
    $_SESSION['password_error'] = 'password field is required!!!';
    $flag = false;
    header("location: regester.php");
}
else if(strlen($password) < 8){
    $_SESSION['password_error'] = 'password field need at least 8 charecters';
    $flag = false;
    header("location: regester.php");
}
else if(!preg_match($password_regex, $password)){
    $_SESSION['email_error'] = 'password must contain an uppercase a lowercase and number and a charecter';
    $flag = false;
    header("location: regester.php");
}

if(!$c_password){
    $_SESSION['c_password_error'] = 'confirm password  field is required!!!';
    $flag = false;
    header("location: regester.php");
}
else if($password != $c_password){
    $_SESSION['c_password_error'] = 'password and confirm password does not match';
    $flag = false;
    header("location: regester.php");
}

if($flag){
    echo "hoise";
    $_SESSION['regester_success'] = "regester successfully";
    $_SESSION["login_email"] = $email;
    $_SESSION["login_password"] = $password;
    $encrypted_password = sha1($password);
    
    $createQuery = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$encrypted_password')";
    mysqli_query($db,$createQuery);
    

    header("location: login.php");
}


?>