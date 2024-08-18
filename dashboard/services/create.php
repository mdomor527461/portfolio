<?php
include "../master/header.php";
include "../../public/fonts/fonts.php";
?>


<!-- content  -->

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Create Service Page</h1>
        </div>
    </div>
</div>

<!-- create alert  -->
 
<div class="row">
    <div class="col-12">
    <?php if(isset($_SESSION['service_created'])) :  ?>
    <div class="alert alert-custom" role="alert">
        <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
        <div class="alert-content">
            <span class="alert-title"><?= $_SESSION['service_created'] ?></span>
            <!-- <span class="alert-text">Email is <?= $_SESSION['auth_email'] ?></span> -->
        </div>
    </div>
    <?php endif; unset($_SESSION['service_created']); ?>
    </div>
</div>

<div class="col-12">
        <div class="card">
            <div class="card-header">
                Create Service
            </div>
            <div class="card-body">
            <form action="store.php" method="POST">

              <!-- login failed error -->
              

            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input type="text" name="title" class="form-control my-3" id="exampleInputEmail1" aria-describedby="emailHelp">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <input type="text" name="description" class="form-control my-3" id="exampleInputEmail1" aria-describedby="emailHelp">
            <label for="exampleInputEmail1" class="form-label">Icon</label>
            <input type="text" name="icon" class="form-control my-3  hudai" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div class="card">
                <div class="card-body my-3 fa-2x" style="overflow-y:scroll; height:200px;">
                    <?php foreach($fonts as $font):?>
                        <span class="m-2"><i class="<?= $font?>" onclick="myfun(event)"></i></span>
                    <?php endforeach;?>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" name="service_button">Update</button>
            </form>
            </div>
        </div>
    </div>
</div>


<script>
  let hudai = document.querySelector('.hudai');
  function myfun(e){
     hudai.value = e.target.classList.value;
  }
</script>

<?php
include "../master/footer.php";
?>
