<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Title -->
    <title>Neptune - Responsive Admin Dashboard Template</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="../../assets/plugins/pace/pace.css" rel="stylesheet">

    
    <!-- Theme Styles -->
    <link href="../../assets/css/main.min.css" rel="stylesheet">
    <link href="../../assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/neptune.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="app app-auth-sign-up align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="index.html">Neptune</a>
            </div>

            <?php
                if(isset($_SESSION["regester_success"])){
                ?>
                 <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION["regester_success"] ?>
                </div>
                <?php
                }?>
                <?php unset($_SESSION["regester_success"])?>
            <p class="auth-description">Please enter your credentials to create an account.<br>Already have an account? <a href="login.php">Sign In</a></p>

            <form action="regester_post.php" method = "post">
           
            <div class="auth-credentials m-b-xxl">
                <?php
                if(isset($_SESSION["name_error"])){
                ?>
                <div class="text-danger"><?php echo $_SESSION["name_error"];?></div>
                <?php
                }?>
                <?php unset($_SESSION["name_error"])?>
                <label for="signUpUsername" class="form-label">Name</label>
                <input type="text" class="form-control m-b-md" name="name" id="signUpUsername"  value="<?php
                    if(isset($_SESSION["old_name"])){
                        echo $_SESSION["old_name"];
                        unset($_SESSION["old_name"]);
                    }
                    ?>" aria-describedby="signUpUsername" placeholder="Enter Name">

                <?php
                if(isset($_SESSION["email_error"])){
                ?>
                <div class="text-danger"><?php echo $_SESSION["email_error"];?></div>
                <?php
                }?>
                <?php unset($_SESSION["email_error"])?>
                <label for="signUpEmail" class="form-label">Email address</label>
                <input type="email" class="form-control m-b-md" name = "email" id="signUpEmail" value="<?php
                    if(isset($_SESSION["old_email"])){
                        echo $_SESSION["old_email"];
                        unset($_SESSION["old_email"]);
                    }
                    ?>" placeholder="example@neptune.com">


                
                <?php
                if(isset($_SESSION["password_error"])){
                ?>
                <div class="text-danger"><?php echo $_SESSION["password_error"];?></div>
                <?php
                }?>
                <?php unset($_SESSION["password_error"])?>
                <label for="signUpPassword" class="form-label">Password</label>
                <input type="password" class="form-control" name ="password" id="signUpPassword" value="<?php
                    if(isset($_SESSION["old_password"])){
                        echo $_SESSION["old_password"];
                        unset($_SESSION["old_password"]);
                    }
                    ?>" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                <div id="emailHelp" class="form-text m-b-md">Password must be minimum 8 characters length*</div>


                <?php
                if(isset($_SESSION["c_password_error"])){
                ?>
                <div class="text-danger"><?php echo $_SESSION["c_password_error"];?></div>
                <?php
                }?>
                <?php unset($_SESSION["c_password_error"])?>
                <label for="signUpPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="c_password" id="signUpPassword" aria-describedby="signUpPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
            </div>

            <div class="auth-submit">
                <button type="submit" class="btn btn-primary p-2">SignUP</button>
            </div>
            </form>
            <div class="divider"></div>            
        </div>
    </div>
    
    <!-- Javascripts -->
    <script src="../../assets/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="../../assets/plugins/pace/pace.min.js"></script>
    <script src="../../assets/js/main.min.js"></script>
    <script src="../../assets/js/custom.js"></script>
</body>
</html>