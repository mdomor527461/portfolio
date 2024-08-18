<?php
include "../master/header.php";
?>

<!-- content  -->
<div class="col">
    <div class="page-description">
        <h1>Social Media Links</h1>
    </div>
</div>


<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Links
            </div>
            <div class="card-body">
            <form action="links_manage.php" method="POST">
              <!--email error -->

            <label for="exampleInputEmail1" class="form-label">Facebook</label>
            <input type="text" name="facebook" class="form-control my-3" id="exampleInputEmail1" aria-describedby="emailHelp">
            <label for="exampleInputEmail1" class="form-label">Instagram</label>
            <input type="text" name="instagram" class="form-control my-3" id="exampleInputEmail1" aria-describedby="emailHelp">
            <label for="exampleInputEmail1" class="form-label">Twitter</label>
            <input type="text" name="twitter" class="form-control my-3" id="exampleInputEmail1" aria-describedby="emailHelp">
            <label for="exampleInputEmail1" class="form-label">Pinterest</label>
            <input type="text" name="pinterest" class="form-control my-3" id="exampleInputEmail1" aria-describedby="emailHelp">
            <button class="btn btn-primary" type="submit" name="linku_btn">Update</button>
            </form>
            </div>
        </div>
    </div>            
</div>


<?php
include "../master/footer.php";
?>
