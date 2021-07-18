<?php
    if(isset($_POST['login'])){
        $tentk = $_POST['tentk'];
        $matkhau = $_POST['matkhau'];
        $loginCheck = $taikhoan->loginCheck($tentk,$matkhau);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Đăng nhập vào website</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/css/login.css" rel="stylesheet">
    </head>
    <body>
        <header>
        </header>
        <main>
            <div class="container">
            <div class="login-form">
                <form action="" method="POST">
                    <h1>Đăng nhập</h1>
                    <span>
                    <?php
                        if(isset($loginCheck))
                            echo $loginCheck;
                    ?>
                    </span>
                    <div class="input-box">
                        <i ></i>    
                        <input type="text" placeholder="Nhập tài khoản" name="tentk">
                    </div>
                    <div class="input-box">
                        <i ></i>
                        <input type="password" placeholder="Nhập mật khẩu" name="matkhau">
                    </div>
                    <div class="btn-box">
                        <button type="submit" class="btn btn-primary" name="login">
                            Đăng nhập
                        </button>
                    </div>
                </form>
            </div>
            </div>
        </main>
    </body>
</html> 