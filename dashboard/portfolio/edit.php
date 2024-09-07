<?php

include "../master/header.php";

include "../../public/fonts/fonts.php";

if(isset($_GET['editid'])){
    $id = $_GET['editid'];

    $port_query = "SELECT * FROM portfolios WHERE id='$id'";
    $connect = mysqli_query($db,$port_query);
    $port = mysqli_fetch_assoc($connect);
}

?>

<div class="row">
<div class="col-8">
        <div class="card">
            <div class="card-header">
                Portfolio Create
            </div>
            <div class="card-body">
                <form action="store.php?updateid=<?= $port['id'] ?>" method="POST" enctype="multipart/form-data">
                <div class="example-content">
                    <label for="exampleInputEmail1" class="form-label">Project Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $port['title'] ?>">
                    <label for="exampleInputEmail1" class="form-label">Project Sub-Title</label>
                    <input type="text" name="subtitle" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $port['subtitle'] ?>">
                    <label for="exampleInputEmail1" class="form-label">Project Description</label>
                    <textarea type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"><?= $port['description'] ?></textarea>
                    
                    <picture class="d-block my-4">
                        <img id="port_img" src="../../public/portfolio/<?= $port['image'] ?>" style="width: 100%; height:300px; object-fit:contain;" alt="">
                    </picture>
                    
                    <label for="exampleInputEmail1" class="form-label">Project Image</label>
                    <input onchange="document.getElementById('port_img').src = window.URL.createObjectURL(this.files[0])" type="file" name="image" class="form-control hudai" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <button type="submit" name="update_port" class="btn btn-primary my-2">Update</button> 
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

include "../master/footer.php";

?>