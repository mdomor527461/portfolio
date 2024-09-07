<?php
include "../master/header.php";
include "../../public/fonts/fonts.php";
?>


<!-- content  -->

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Create Experience Page</h1>
        </div>
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
            <label for="exampleInputEmail1" class="form-label">Number Of Experience</label>
            <input type="text" name="exp_no" class="form-control my-3" id="exampleInputEmail1" aria-describedby="emailHelp">
            <label for="exampleInputEmail1" class="form-label">Icon</label>
            <input type="text" name="icon" class="form-control my-3  hudai" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div class="card">
                <div class="card-body my-3 fa-2x" style="overflow-y:scroll; height:200px;">
                    <?php foreach($fonts as $font):?>
                        <span class="m-2"><i class="<?= $font?>" onclick="myfun(event)"></i></span>
                    <?php endforeach;?>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" name="experience_button">Create</button>
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
