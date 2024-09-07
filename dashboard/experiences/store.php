<?php
include '../../config/database.php';

session_start();

if(isset($_POST['experience_button'])){

    $title = $_POST['title'];
    $experience = $_POST['exp_no'];
    $icon = $_POST['icon'];

    if($title && $experience && $icon){
        $query = "INSERT INTO experiences (title,exp_no,icon) VALUES ('$title','$experience','$icon')";
        mysqli_query($db,$query);
        $_SESSION['exp_error'] = "new experience added successfully complete";
        header("location: experience.php");
    }
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM experiences WHERE id='$id'";

    mysqli_query($db,$query);
    $_SESSION['exp_error'] = "experience delete successfully complete";
    header("location: experience.php");
}


if(isset($_POST['update'])){
    if(isset($_GET['edit_id'])){
        $id = $_GET['edit_id'];
        $title = $_POST['title'];
        $exp_no = $_POST['exp_no'];
        $icon = $_POST['icon'];

        $update_query = "UPDATE experiences SET title='$title',exp_no='$exp_no',icon='$icon' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['exp_error'] = "experience update successfully complete";
        header("location: experience.php");
    }
}


?>