<?php
session_start();
include "../../config/database.php";

if(isset($_POST['linku_btn'])){
    $id = $_SESSION['auth_id'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $twitter = $_POST['twitter'];
    $pinterest = $_POST['pinterest'];
    $query = "INSERT INTO links (user_id,facebook,instagram,twitter,pinterest) VALUES ('$id','$facebook','$instagram','$twitter','$pinterest')";
    $db_connect = mysqli_query($db,$query);
    header("location: links.php");
 }

?>