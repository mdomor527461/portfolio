<?php
include "../master/header.php";
include "../../public/fonts/fonts.php";
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $select_query = "SELECT * FROM educations WHERE id='$id'";
    $db_connect = mysqli_query($db,$select_query);
    $education = mysqli_fetch_assoc($db_connect);
}

?>

<div class="row">
<div class="col-12">
        <div class="card">
            <div class="card-header">
                Education Insert 
            </div>
            <div class="card-body">
                <form action="store.php?edit=<?=$education['id']?>" method="POST">
                <div class="example-content">
                    <label for="exampleInputEmail1" class="form-label">Education Title</label>
                    <input type="text" name="title" value="<?=$education['title']?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <label for="exampleInputEmail1" class="form-label">Education Year</label>
                    <input type="text" name="year" value="<?=$education['year']?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <label for="exampleInputEmail1" class="form-label">Education Ratio/Parsentage</label>
                    <!-- <input type="text" name="ratio" class="form-control hudai" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
                    <select name="ratio" class="form-select">
                        <option value="0">Select Your Ratio</option>
                        <?php for($i=1;$i<=100;$i++) : ?>
                        <option value="<?= $i ?>">
                            <?= $i ?> %
                        </option>
                        <?php endfor; ?>
                    </select>
                    
                    <button type="submit" name="edit" class="btn btn-primary my-2"><i class="material-icons">update</i>update</button> 
                </div>
                </form>
            </div>
        </div>
    </div>
</div>




<?php

include "../master/footer.php";

?>