<?php
include "../master/header.php";
$user_query = "select * from users";
$users = mysqli_query($db,$user_query);
?>

<!-- content -->
<div class="row">
    <div class="col-12" >
            <?php
                $serial = 1;
                if(isset($_SESSION["temp_name"])){
                ?>
                <div class="alert alert-success" role="alert">
                "Welcome Chief, Mr". <?php echo $_SESSION['temp_name'];?>
                </div>
                <?php
                }?>
                <?php unset($_SESSION["temp_name"])?>

                <div class="card col-12">
                    <div class="card-header">
                        Users List
                    </div>
                    <div class="card-body" style="overflow-y:scroll; height:200px">
                    <table class="table" >
                        <thead>
                            <tr>
                            <th scope="col">Serial</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $user):?>
                            <tr>
                            <th scope="row"><?php echo $serial?></th>
                            <td><?php echo $user['name'];?></td>
                            <td><?php echo $user['email'];$serial++;?></td>
                            <td></td>                           
                            </tr>
                            <?php endforeach;?>
                    
                        </tbody>
                    </table>
                    </div>
                </div>
    </div>
</div>

<?php 
"../master/footer.php";
?>