<?php
session_start();
include "../master/header.php";
include "../../public/fonts/fonts.php";
if(isset($_GET['edit_id'])){
    $id = $_GET['edit_id'];
    

    $select_query = "SELECT * FROM experiences WHERE id='$id'";
    $select_connect = mysqli_query($db,$select_query);
    $experience = mysqli_fetch_assoc($select_connect);
}
?>
<!-- page title  -->
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Experience Edit Page</h1>
        </div>
    </div>
</div>

<div class="col-6">
<div class="card">
    <div class="card-header">
        Experience Edit
    </div>
    <div class="card-body">
    <form action="store.php?edit_id=<?=$experience['id']?>" method="POST">
                <div class="example-content">
                    <label for="exampleInputEmail1" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $experience['title'] ?>">
                    <label for="exampleInputEmail1" class="form-label">Description</label>
                    <input type="text" name="exp_no" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $experience['exp_no'] ?>">
                    <label for="exampleInputEmail1" class="form-label">Icons</label>
                    <input readonly type="text" name="icon" class="form-control hudai" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $experience['icon'] ?>">
                    <div class="card my-3">
                        <div class="card-body" style="overflow-y: scroll; height:300px;">
                            <div class="fa-2x">
                            <?php foreach($fonts as $font) : ?>
                            <span class="m-2">
                            <i class="<?= $font ?>" onclick="myFun(event)" ></i>
                            </span>
                            <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary my-2"><i class="material-icons">update</i>update</button> 
                </div>
                </form>
            </div>
    </div>
</div>
</div>
</div>



<script>

let hudai = document.querySelector('.hudai');

function myFun(e){
    hudai.value = e.target.classList.value
}

</script>


<?php

include "../master/footer.php";

?>