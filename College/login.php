<?php session_start(); ?>
<?php include('head.php'); ?>
<link rel="stylesheet" href="popup_style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Acme&family=Satisfy&display=swap" rel="stylesheet">

<?php
include('connect.php');
if (isset($_POST['btn_login'])) {
    $unm = $_POST['email'];

    $passw = hash('sha256', $_POST['password']);

    function createSalt()
    {
        return '2123293dsj2hu2nikhiljdsd';
    }
    $salt = createSalt();
    $pass = hash('sha256', $salt . $passw);

    $sql = "SELECT * FROM admin WHERE email='" . $unm . "' and password = '" . $pass . "'";
    $result = mysqli_query($conn, $sql);
    $row  = mysqli_fetch_array($result);

    $_SESSION["id"] = $row['id'];
    $_SESSION["username"] = $row['username'];
    $_SESSION["password"] = $row['password'];
    $_SESSION["email"] = $row['email'];
    $_SESSION["fname"] = $row['fname'];
    $_SESSION["lname"] = $row['lname'];
    $_SESSION["image"] = $row['image'];
    $count = mysqli_num_rows($result);
    if ($count == 1 && isset($_SESSION["email"]) && isset($_SESSION["password"])) { {
?>
            <div class="popup popup--icon -success js_success-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        Success
                        </h1>
                        <p>Login Successfully</p>
                        <p>

                            <?php echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>"; ?>
                        </p>
                </div>
            </div>

        <?php
        }
    } else { ?>
        <div class="popup popup--icon -error js_error-popup popup--visible">
            <div class="popup__background"></div>
            <div class="popup__content">
                <h3 class="popup__content__title">
                    Error
                    </h1>
                    <p>Invalid Email or Password</p>
                    <p>
                        <a href="login.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
                    </p>
            </div>
        </div>

<?php

    }
}
?>

<div style="display:flex; flex-direction:column; background-image: linear-gradient(to right, #A0B5EB, #C9F0E4); height:100vh">
<div style="display: flex; justify-content:center; width: 100%; padding-top:50px; color:black">
<span style="font-size: 40px; font-weight:500 ; font-family: 'Acme', sans-serif;">Welcome to College Manangement System</span>
</div>
<div style="display:flex; flex-direction:row;">
    <div id="main-wrapper">
        <div class="unix-login">
            <?php
            $sql_login = "select * from manage_website";
            $result_login = $conn->query($sql_login);
            $row_login = mysqli_fetch_array($result_login);
            ?>
            <div class="container-fluid" style="background-image: url('uploadImage/Logo/<?php echo $row_login['background_login_image']; ?>');">
                <div class="row justify-content-center">
                    <div style="width: 54%;">
                        <div class="login-content card" style="box-shadow: 26px 31px 30px rgb(0 0 0 / 35%);">
                            <div class="login-form">
                                <span style="font-weight: 900;
        font-size: 20px;
        text-align: center;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;">Admin Login</span>
                                <center><img src="uploadImage/Logo/1.png" style="width:50%;"></center><br>
                                <form method="POST">
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Remember Me
                                        </label>
                                        <label class="pull-right">
                                            <a href="forgot_password.php">Forgotten Password?</a>
                                        </label>
                                    </div>
                                    <button type="submit" name="btn_login" style="background-image: linear-gradient(to left, #7ec9f5, #3957ed); color:white ; font-weight: 900" class="btn btn-flat m-b-30 m-t-30">Sign in</button>
    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
    
    <div id="main-wrapper">
        <div class="unix-login">
            <?php
            $sql_login = "select * from manage_website";
            $result_login = $conn->query($sql_login);
            $row_login = mysqli_fetch_array($result_login);
            ?>
            <div class="container-fluid" style="background-image: url('uploadImage/Logo/<?php echo $row_login['background_login_image']; ?>'); ">
                <div class="row justify-content-center">
                    <div style="width: 54%;">
                        <div class="login-content card" style="box-shadow: 26px 31px 30px rgb(0 0 0 / 35%);">
                            <div class="login-form">
                                <span style="font-weight: 900;
        font-size: 20px;
        text-align: center;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;">Student Login</span>
                                <center><img src="uploadImage/Logo/1.png" style="width:50%;"></center><br>
                                <form method="POST">
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Remember Me
                                        </label>
                                        <label class="pull-right">
                                            <a href="forgot_password.php">Forgotten Password?</a>
                                        </label>
                                    </div>
                                    <button type="submit" name="btn_login" style="background-image: linear-gradient(to left, #7ec9f5, #3957ed); color:white ; font-weight: 900" class="btn btn-flat m-b-30 m-t-30">Sign in</button>
    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</div>

</div>


<script src="js/lib/jquery/jquery.min.js"></script>

<script src="js/lib/bootstrap/js/popper.min.js"></script>
<script src="js/lib/bootstrap/js/bootstrap.min.js"></script>

<script src="js/jquery.slimscroll.js"></script>

<script src="js/sidebarmenu.js"></script>

<script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>

<script src="js/custom.min.js"></script>

</body>

</html>