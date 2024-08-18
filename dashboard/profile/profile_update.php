<?php
include "../../config/database.php";
session_start();

$id = $_SESSION['auth_id'];
$password_regex = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
$email_regex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
//name update start
if(isset($_POST['namu_btn'])){
    $name_flag = true;
    $name = $_POST['name'];
    if(!$name){
        $_SESSION['update_error'] = 'name field is required!!!';
        $name_flag = false;
        header("location: profile.php");
    }
    else if(!preg_match("/^[a-zA-Z ]*$/", $name)){
        $_SESSION['update_error'] = 'name field support alpha and white space';
        $name_flag = false;
        header("location: profile.php");
    }
    else if(strlen($name) > 55){
        $_SESSION['update_error'] = 'name field can contain only 55 letters';
        $name_flag = false;
        header("location: profile.php");
    }
    if($name_flag){
        $name = $_POST['name'];
        if($name){
            $update_query = "UPDATE users SET name='$name' WHERE id='$id'";
            mysqli_query($db,$update_query);
            $_SESSION['update_error'] = "name updated successfully!!"; 
            $_SESSION['auth_name'] = $name;
            header('location: profile.php');
        }
    }
}



//password update start

if(isset($_POST['passu_btn'])){
    $password_flag = true;
    $new_pass = $_POST['new_pass'];
    if(!$new_pass){
        $_SESSION['pass_error'] = 'password field is required!!!';
        $password_flag = false;
        header("location: profile.php");
    }
    else if(strlen($new_pass) < 8){
        $_SESSION['pass_error'] = 'password field need at least 8 charecters';
        $password_flag = false;
        header("location: profile.php");
    }
    else if(!preg_match($password_regex, $new_pass)){
        $_SESSION['pass_error'] = 'password must contain an uppercase a lowercase and number and a charecter';
        $password_flag = false;
        header("location: profile.php");
    }

    if($password_flag){
        $old_pass = $_POST['old_pass'];
        $new_pass = $_POST['new_pass'];
        $con_pass = $_POST['con_pass'];
     
        if($old_pass && $new_pass && $con_pass){
            $encrypt_old = sha1($old_pass);
    
            $get_pass_query = "SELECT password FROM users AS password WHERE id='$id'";
            $db_pass = mysqli_query($db,$get_pass_query);
            $db_pass = mysqli_fetch_assoc($db_pass)['password'];
            if($encrypt_old == $db_pass){
                if($new_pass == $con_pass){
                    $encrypt_new = sha1($new_pass);
                    $update_query = "UPDATE users SET password='$encrypt_new' WHERE id='$id'";
                    mysqli_query($db,$update_query);
                    $_SESSION['pass_error'] = "password updated successfully!!";
                    header('location: profile.php');
                }
                else{
                    $_SESSION['pass_error'] = "new password and confirm password doesn't match";
                header('location: profile.php');
                }
            }
            else{
                $_SESSION['pass_error'] = "old password doesn't match";
                header('location: profile.php');
            }
    
        }
        else{
            $_SESSION['pass_error'] = "pleas fill all fields";
            header('location: profile.php');
        }
    }
  
}





//email update start
if(isset($_POST['mailu_btn'])){
    $email_flag = true;
    $email = $_POST['email'];
    if(!$email){
        $_SESSION['mail_error'] = 'Email field is required!!!';
        $email_flag = false;
        header("location: profile.php");
    }
    else if(!preg_match($email_regex, $email)){
        $_SESSION['mail_error'] = 'invalid email';
        $email_flag = false;
        header("location: profile.php");
    }


    if($email_flag){
        $email = $_POST['email'];
        if($email){
            $update_query = "UPDATE users SET email='$email' WHERE id='$id'";
            mysqli_query($db,$update_query);
            $_SESSION['mail_error'] = "email updated successfully!!"; 
            $_SESSION['email_name'] = $email;
            header('location: profile.php');
        }
    }
   
}


//image part start

if(isset($_POST['profileu_btn'])){
   $image = $_FILES['image']['name'];
   $tmp_image = $_FILES['image']['tmp_name'];
   if($image){
    $explode = explode('.',$image);
    $extension = end($explode);
    $custom_image_name = $id."-".$_SESSION['auth_name']."-".date('d-m-Y').".".$extension;

    $local_path = "../../public/profile/".$custom_image_name;

    if(move_uploaded_file($tmp_image,$local_path)){
        $update_query = "UPDATE users SET image='$custom_image_name' WHERE id='$id'";
        mysqli_query($db,$update_query);
        header('location: profile.php');
    }
    else{
        echo "kharap";
    }
    
   }
 
   
}


?>