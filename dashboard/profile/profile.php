<?php
include "../master/header.php";
?>


<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Settings</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                UserName Update
            </div>
            <div class="card-body">
            <form action="profile_update.php" method="POST">

              <!-- login failed error -->
              <?php
                if(isset($_SESSION["update_error"])){
                ?>
                 <div class="text-success" role="alert">
                    <?php echo $_SESSION["update_error"] ?>
                </div>
                <?php
                }?>
                <?php unset($_SESSION["update_error"])?>

            <label for="exampleInputEmail1" class="form-label">Update</label>
            <input type="text" name="name" class="form-control my-3" id="exampleInputEmail1" aria-describedby="emailHelp">
            <button class="btn btn-primary" type="submit" name="namu_btn">Update</button>
            </form>
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Password Update
            </div>
            <div class="card-body">
            <form action="profile_update.php" method="POST">

              <!-- login failed error -->
              <?php
                if(isset($_SESSION["pass_error"])){
                ?>
                 <div class="text-success" role="alert">
                    <?php echo $_SESSION["pass_error"] ?>
                </div>
                <?php
                }?>
                <?php unset($_SESSION["pass_error"])?>

            <label for="exampleInputEmail1" class="form-label">Old Password</label>
            <input type="password" name="old_pass" class="form-control my-3" id="exampleInputEmail1" aria-describedby="emailHelp">
            <label for="exampleInputEmail1" class="form-label">New Password</label>
            <input type="password" name="new_pass" class="form-control my-3" id="exampleInputEmail1" aria-describedby="emailHelp">
            <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
            <input type="password" name="con_pass" class="form-control my-3" id="exampleInputEmail1" aria-describedby="emailHelp">
            <button class="btn btn-primary" type="submit" name="passu_btn">Update</button>
            </form>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Email Update
            </div>
            <div class="card-body">
            <form action="profile_update.php" method="POST">

              <!--email error -->
              <?php
                if(isset($_SESSION["mail_error"])){
                ?>
                 <div class="text-success" role="alert">
                    <?php echo $_SESSION["mail_error"] ?>
                </div>
                <?php
                }?>
                <?php unset($_SESSION["mail_error"])?>

            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control my-3" id="exampleInputEmail1" aria-describedby="emailHelp">
            <button class="btn btn-primary" type="submit" name="mailu_btn">Update</button>
            </form>
            </div>
        </div>
    </div>
    
    <!-- image part  -->
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Image Update
            </div>
            <div class="card-body">
            <form action="profile_update.php" method="POST" enctype ="multipart/form-data">
                <label for="exampleInputEmail1" class="form-label">Update</label>
                <input type="file" name="image" class="form-control my-3" id="exampleInputEmail1" aria-describedby="emailHelp">
                <button class="btn btn-primary" type="submit" name="profileu_btn">Update</button>
            </form>
            </div>
        </div>
    </div>
    
   

</div>
 


<?php
include "../master/footer.php";
?>