<?php

include "../master/header.php";
include "../../config/database.php";

$select_testimonial = "SELECT * FROM testimonials";
$testimonials = mysqli_query($db,$select_testimonial);


?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Testimonials Page</h1>
        </div>
    </div>
</div>

<!-- create alert  -->
<div class="row">
    <div class="col-12">
    <?php if(isset($_SESSION['test_error'])) :  ?>
    <div class="alert alert-custom" role="alert">
        <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
        <div class="alert-content">
            <span class="alert-message"><?= $_SESSION['test_error'] ?></span>
        </div>
    </div>
    <?php endif; unset($_SESSION['test_error']); ?>
    </div>
</div> 





<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Testimonials</h4>
            <a href="./create.php" name="image_ubtn" class="btn btn-primary my-2"><i class="material-icons">add</i>Create</a> 
            </div>
            <div class="card-body">
                
            <div class="example-content">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Serial</th>
                                <th scope="col">Image</th>
                                <th scope="col">message</th>
                                <th scope="col">Name</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                             $num = 1;
                           foreach($testimonials as $testimonial):
                        ?>
                            <tr>
                                <th scope="row">
                                    <?= $num++ ?>
                                </th>
                                <td>
                                    <img src="../../public/testimonials/<?= $testimonial['image'] ?>" style="width:80px; height:80px;" alt="">
                                </td>
                                <td>
                                <?= $testimonial['message'] ?>
                                </td>
                                <td>
                                <?=$testimonial['name'] ?>
                                </td>
                                <td>
                                <?=$testimonial['designation'] ?>
                                </td>
                                <td class="">
                                    <div class="d-flex justify-content-around">
                                        <a href="store.php?id=<?=$testimonial['id']?>">
                                            <i class="fa fa-trash-o text-danger fa-2x"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>


            </div>
        </div>
    </div>
</div>


<?php

include "../master/footer.php";

?>