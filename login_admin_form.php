<?php
    session_start();
	include('./config/connect.php');
	if(isset($_POST['dangnhap'])){
		$email=$_POST['admin_email'];
        $pass=$_POST['admin_password'];
        if(isset($email) && isset($pass)){
            $sql="SELECT * FROM admin WHERE admin_email='$email' AND admin_password='$pass' ";
            $query=mysqli_query($connect,$sql);
            $rows=mysqli_num_rows($query);
            if($rows>0){
                $row = mysqli_fetch_array($query);
                $_SESSION["admin_name"] = $row["admin_name"];
                $_SESSION['admin_email']=$email;
                $_SESSION['admin_password']=$checkPass;
                header('location: ./admin/index.php');
            }else{
                $message = "Tài khoản mật khẩu không đúng!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }
	} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
    <link rel="icon" href="./assets/img/header/logo - Copy.png">
    <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="./assets/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./assets/icon/fontawesome-free-6.4.2-web/css/all.min.css">
</head>
<body>
    <div class="main-login">
        <?php
        include_once("header.php");
        ?>

        <!-- Main login -->
        <form action="" method="POST">
            <div class="content-login">
                <div class="login-form">
                    <div class="login-form-title">
                        <h1>Đăng nhập Admin</h1>
                    </div>
                    <div class="login-form-email">
                        <label for="">Email</label>
                        <input type="email" name="admin_email" class="login-email-txt" placeholder="Email của bạn..." required>
                    </div>
                    <div class="login-form-password">
                        <label for="">Mật khẩu</label>
                        <input type="password" name="admin_password" class="login-pass-txt" placeholder="Mật khẩu" required>
                    </div>
                    <div class="login-form-remember">
                        <input type="checkbox" id="login-check">
                        <label for="login-check">Nhớ mật khẩu?</label>
                    </div>
                    <div class="login-button">
                        <button type="submit" name="dangnhap">Đăng nhập</button>
                    </div>
                    <div class="login-register">
                        <p>Bạn không có tài khoản?</p>
                        <a href="register_admin_form.php" class="login-link-register">Đăng ký ngay</a>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
</body>
</html>