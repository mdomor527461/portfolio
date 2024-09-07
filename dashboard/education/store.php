<?php
session_start();
include '../../config/database.php';

if(isset($_POST['create'])){

    $title = $_POST['title'];
    $year = $_POST['year'];
    $ratio = $_POST['ratio'];


    if($title && $year && $ratio){
        if($ratio != "0"){
            $insert = "INSERT INTO educations (title,year,ratio) VALUES ('$title','$year','$ratio')";
            mysqli_query($db,$insert);
            header('location: education.php');
        }else{
            $_SESSION['service_created'] = "0% is not allowed";
            header('location: education.php');
        }
    }else{
        $_SESSION['service_created'] = "all fields are required";
        header('location: education.php');
    }

}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $delete_query = "DELETE FROM educations WHERE id='$id'";
    mysqli_query($db,$delete_query);
    $_SESSION['service_created'] = "Education delete successully";
    header("location: education.php");
}

if(isset($_POST['edit'])){
    $id = $_GET['edit'];
    $title = $_POST['title'];
    $year = $_POST['year'];
    $ratio = $_POST['ratio'];
    echo $id;
    $update_query = "UPDATE educations SET title='$title', year='$year', ratio='$ratio' WHERE id='$id'";
    mysqli_query($db,$update_query);
    $_SESSION['service_created'] = "Education section update successully";
    header("location: education.php");
}


?>