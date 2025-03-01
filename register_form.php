<?php
    ob_start();
    session_start();
    include_once("./config/connect.php");

    $err = [];
    if(isset($_POST['dangky_user'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rpassword = $_POST['rpassword'];
        $dc = $_POST['dc'];
        $sdt = $_POST['sdt'];
        if($password != $rpassword){
            $err['rpassword'] = 'Mật khẩu nhập lại không đúng!';
        }
        if(empty($err)){
            $sql="INSERT INTO user(user_name, user_email, user_password, diachi, sdt) VALUES('$name', '$email', '$password', '$dc', '$sdt') ";
            $query=mysqli_query($connect,$sql);
            if($query){
                $_SESSION["user_id"]=mysqli_insert_id($connect);
                $message = "Đăng ký thành công!";
                echo "<script type='text/javascript'>alert('$message');window.location.href = './login_form.php';</script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
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
        <form action="" method="post" >
            <div class="content-login">
                <div class="login-form">
                    <div class="login-form-title">
                        <h1>Đăng ký User</h1>
                    </div>
                    <div class="login-form-email">
                        <label for="">Họ tên</label>
                        <input type="text" class="login-email-txt" placeholder="Tên của bạn" name="name" required>
                    </div>
                    <div class="login-form-email">
                        <label for="">Email</label>
                        <input type="email" class="login-email-txt" placeholder="Địa chỉ Email" name="email" required>
                    </div>
                    <div class="login-form-password">
                        <label for="">Mật khẩu</label>
                        <input type="password" class="login-pass-txt" placeholder="Mật khẩu" name="password" required>
                    </div>
                    <div class="login-form-password">
                        <label for="">Xác nhận mật khẩu</label>
                        <input type="password" class="login-pass-txt" placeholder="Xác nhận mật khẩu" name="rpassword" required>
                    </div>
                    <div class="login-form-password">
                        <label for="">Địa chỉ</label>
                        <input type="text" class="login-email-txt" placeholder="Nhập địa chỉ" name="dc" required>
                    </div>
                    <div class="login-form-password">
                        <label for="">Số điện thoại</label>
                        <input type="number" class="login-email-txt" placeholder="Nhập số điện thoại" name="sdt" required>
                    </div>
                    <div class="login-form-remember">
                        <input type="checkbox" id="login-check">
                        <label for="login-check">Tôi đồng ý với điều khoản</label>
                    </div>
                    <div class="login-button">
                        <button type="submit" name="dangky_user" >Đăng ký</button>
                    </div>
                    <div class="login-register">
                        <p>Bạn đã có tài khoản?</p>
                        <a href="login_form.php" class="login-link-register">Đăng nhập</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>