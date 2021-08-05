<?php
    include 'lib/format.php';
    include 'lib/session.php';
    include 'lib/database.php';
    include 'lib/SimpleXLSX.php';
    include 'model/student.php';
    include 'model/schoolclass.php';
    include 'model/mark.php';
    include 'model/teacher.php'; 
    include 'model/user.php';
    
    // error_reporting(0);  
?>
<?php
$diem = new mark();
$diem->initialize();
function printAlertLogin(){
    echo '<script type="text/javascript">
 
            function testConfirmDialog()  {

                var result = confirm("Cần đăng nhập để thực hiện thao tác? Bạn có Đồng ý không? ");

                if(result)  {
                    window.location.replace("http://localhost:8080/mvc-php/index.php?controller=login");
                } else {
                    window.history.back();
                }
            }

           </script>';
    echo '<script type="text/javascript">testConfirmDialog()</script>';
}
function printAlertHaveNoPermit(){
    echo '<script type="text/javascript">
 
            function testConfirmDialog()  {

                var result = confirm("Bạn không có quyền thực hiện thao tác? Đăng nhập với tài khoản khác? ");

                if(result)  {
                    window.location.replace("http://localhost:8080/mvc-php/index.php?controller=login");
                } else {
                    window.history.back();
                }
            }

           </script>';
    echo '<script type="text/javascript">testConfirmDialog()</script>';
}
?>
<?php
    $ss = new Session();
    $ss->init();
    $taikhoan = new user();
    if(isset($_GET['controller'])){
        $controller = $_GET['controller'];
    }
    else{
        $controller = '';
    }
    switch($controller){
        case 'hoc-sinh':{
            $hocsinh = new student();
            require_once('public/layout/layout.php');
            require_once('controller/hocsinh/index.php');
            break;
        }
        case 'diem':{
            $hocsinh = new student();
            $lop = new schoolclass();
            
            $diem->preprocessorAVE();
            $diem->preprocessorGPA();
            require_once('public/layout/layout.php');
            require_once('controller/diem/index.php');
            break;
        }
        case 'lop':{
            $lop = new schoolclass();
            require_once('public/layout//layout.php');
            require_once('controller/lop/index.php');
            break;
        }
        case 'giao-vien':{
            $giaovien = new teacher();
            require_once('public/layout/layout.php');
            require_once('controller/giaovien/index.php');
            break;
        }   
        case 'login':{
            include_once('view/login/login.php');
            require_once('public/layout/layout.php');
            break;
        }
        case 'logout':{
            $taikhoan->logoutUser();
            header('location:index.php?');
            break;
        }
        default:{
            if($ss->checkLogin()==FALSE){
                include_once('view/login/login.php');
            }   
            require_once('public/layout/layout.php');
            break;
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/button.css">
    <!-- <link href="public/css/login.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="public/js/jquery-3.6.0.min.js"></script>
    <script src="public/js/xuly.js"></script>
</head>
</html>



