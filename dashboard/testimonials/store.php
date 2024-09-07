<?php

include '../../config/database.php';

session_start();

if(isset($_POST['create'])){
    $name = $_POST['name'];
    $message = $_POST['message'];
    $designation= $_POST['designation'];

    $image = $_FILES['image']['name'];
    $tmp_img = $_FILES['image']['tmp_name'];

    if($image){
        $explode = explode('.',$image);
        $extension = end($explode);
        $custom_name_img = $_SESSION['auth_id'].'-'.$name.'-'.date("d-m-Y")."." .$extension;
        $local_path = "../../public/testimonials/".$custom_name_img;

        if(move_uploaded_file($tmp_img,$local_path)){
            $query = "INSERT INTO testimonials (image,message,name,designation) VALUES ('$custom_name_img','$message','$name','$designation')";
            mysqli_query($db,$query);
            $_SESSION['test_error'] = "new testimonial added successfully complete";
            header('location: testimonial.php');
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
    $select_query = "SELECT * FROM testimonials WHERE id='$id'";
    $db_connect = mysqli_query($db,$select_query);
    $port=mysqli_fetch_assoc($db_connect);

    if($port['image']){
        $old_img = $port['image'];
        $old_path = "../../public/portfolio/".$old_img;

        if(file_exists($old_path)){
            unlink($old_path);
        }
        $del_query = "DELETE FROM testimonials WHERE id='$id'";
        $del_connect = mysqli_query($db,$del_query);
        $_SESSION['test_error'] = "testimonial deleted Successfully";
       header("location: testimonial.php");

    }
}