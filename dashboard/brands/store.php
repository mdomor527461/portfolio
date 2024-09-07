<?php

include '../../config/database.php';
session_start();
$id = $_SESSION['auth_id'];

if(isset($_POST['create'])){
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];
    $tmp_img = $_FILES['image']['tmp_name'];
    if($image){
        $explode = explode('.',$image);
        $extension = end($explode);
        $custom_name_img = $_SESSION['auth_id'].'-'.'-'.$name.'-'.date("d-m-Y")."." .$extension;
        $local_path = "../../public/brands/".$custom_name_img;

        if(move_uploaded_file($tmp_img,$local_path)){
            $query = "INSERT INTO brands (image,name) VALUES ('$custom_name_img','$name')";
            mysqli_query($db,$query);
            $_SESSION['brand_error'] = "new brand added successfully complete";
            header('location: brand.php');
        }

    }
    // if($title && $description && $icon){
    //     $query = "INSERT INTO services (title,description,icon) VALUES ('$title','$description','$icon')";
    //     mysqli_query($db,$query);
    //     $_SESSION['service_created'] = "new service added successfully complete";
    //     header("location: index.php");
    // }

}


//delete
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $select_query = "SELECT * FROM brands WHERE id='$id'";
    $db_connect = mysqli_query($db,$select_query);
    $port=mysqli_fetch_assoc($db_connect);

    if($port['image']){
        $old_img = $port['image'];
        $old_path = "../../public/brands/".$old_img;

        if(file_exists($old_path)){
            unlink($old_path);
        }
        $del_query = "DELETE FROM brands WHERE id='$id'";
        $del_connect = mysqli_query($db,$del_query);
        $_SESSION['brand_error'] = "brand deleted Successfully";
       header("location: brand.php");

    }
}