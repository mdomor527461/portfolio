<?php
include "../master/header.php";
?>

<!-- content  -->
<?php
include "../../config/database.php";
$select_query = "SELECT * FROM experiences";
$experiences = mysqli_query($db,$select_query);
?>

<!-- content  -->

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Experience Page</h1>
        </div>
    </div>
</div>

<!-- error show  -->

<div class="row">
    <div class="col-12">
    <?php if(isset($_SESSION['exp_error'])) :  ?>
    <div class="alert alert-custom" role="alert">
        <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
        <div class="alert-content">
            <span class="alert-title"><?= $_SESSION['exp_error'] ?></span>
            <!-- <span class="alert-text">Email is <?= $_SESSION['auth_email'] ?></span> -->
        </div>
    </div>
    <?php endif; unset($_SESSION['exp_error']); ?>
    </div>
</div>


<div class="row">
    <div class="card col-12">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Add Service</h3>
            <a href="create.php"><button class="btn btn-primary p-2">Create</button></a>
        </div>
        <div class="card-body" style="overflow-y:scroll; height:200px">
        <table class="table" >
            <thead>
                <tr>
                <th scope="col">Serial</th>
                <th scope="col">Icon</th>
                <th scope="col">Title</th>
                <th scope="col">Number of experiences</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
               <?php
               $serial = 1;
               foreach($experiences as $experience):
               ?>
                <tr>
                    <th scope="row">
                       <?=$serial++?>
                    </th>
                    <td>
                       <i class="<?= $experience['icon'] ?>"></i>
                    </td>
                    <td>
                        <?=$experience['title']?>
                    </td>
                    <td>
                    <?=$experience['exp_no']?>
                    </td>
                    <td>
                        <div class="d-flex justify-content-around">
                        <a href="store.php?id=<?= $experience['id'] ?>">
                            <i class="fa fa-trash-o text-danger fa-2x"></i>
                        </a>
                        <a href="edit.php?edit_id=<?= $experience['id'] ?>">
                            <i class="fa fa-wrench text-success fa-2x"></i>
                        </a>
                        </div>
                    </td>
                </tr>    
                <?php endforeach;?>
            </tbody>
        </table>
        </div>
    </div>
</div>





<?php
include "../master/footer.php";
?>