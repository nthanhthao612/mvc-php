<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = '';
}

switch ($action) {
    case 'add':
        {
            if($ss->checkLogin() == True AND $ss->get('privilege')=='admin'){
                if(isset($_POST['add_teacher'])){
                    $hotendemgv = $_POST['hotendemgv'];
                    $tengv = $_POST['tengv'];
                    $mamh = $_POST['mamh'];
                    $namgv = (int)$_POST['namgv'];
                    $_POST['gioitinh'] == 1? $gioitinh = "Nam" : $gioitinh = "Nữ";
                    $ngaysinh = $_POST['ngaysinh'];
                    $diachi = $_POST['diachi'];
                    $magv = $giaovien->setID($mamh,$namgv);
                    $tentk = $magv;
                    if($ss->get('username')=='admin' AND $ss->get('privilege')=='admin'){
                        if($giaovien->insertIntoTeacher($magv,$hotendemgv,$tengv,$mamh,$namgv,$gioitinh,$ngaysinh,$diachi) AND $taikhoan->insertIntoUser($tentk,md5('2'),$magv,'gv')){
                            header('location: index.php?controller=giao-vien&action=list');
                            echo "<script>alert('Thành Công!')</script>";
                        }
                        else{
                            echo "<script>alert('Thất Bại!')</script>";
                        }
                    }  
                }
                require_once 'view/giaovien/add_teacher.php';
            }
            else{
                printAlertHaveNoPermit();
            }
            break;
        }
    case 'edit':
        {
            if($ss->checkLogin() == True AND $ss->get('username')== $_GET['magv']){
                if(isset($_GET['magv'])){
                    $magv = $_GET['magv'];
                    $data = $giaovien->getInfoteacher($magv);
                }
                if(isset($_POST['edit_teacher'])){
                    $hotendemgv = $_POST['hotendemgv'];
                    $tengv = $_POST['tengv'];
                    $mamh = $_POST['mamh'];
                    $namgv = $_POST['namgv'];
                    $matkhau = md5($_POST['matkhau']);
                    $_POST['gioitinh'] == 1? $gioitinh = "Nam" : $gioitinh = "Nữ";
                    $ngaysinh = $_POST['ngaysinh'];
                    $diachi = $_POST['diachi'];
                    $magv = $_POST['magv'];
                    $tentk = $magv;
                    if($ss->get('username')== $_GET['magv']){
                        if($giaovien->updateInfo($magv,$hotendemgv,$tengv,$mamh,$namgv,$gioitinh,$ngaysinh,$diachi) AND $taikhoan->updateUser($tentk,$matkhau)){
                            header("location: index.php?controller=giao-vien&action=info&magv=$magv");
                            echo "<script>alert('thanh cong')</script>";
                        }
                        else{
                            header("location: index.php?controller=giao-vien&action=info&magv=$magv");
                            echo "<script>alert('That bai')</script>";   
                        }   
                    }   
                }
                require_once 'view/giaovien/edit_teacher.php';
            }
            else{
               printAlertHaveNoPermit(); 
            }  
            break;
        }
    case 'delete':
        {
            if($ss->checkLogin() == True AND $ss->get('privilege')=='admin'){
                if(isset($_GET['magv'])){
                    $magv = $_GET['magv'];
                    if($ss->get('username')=='admin' AND $ss->get('privilege')=='admin'){
                        if($taikhoan->deleteUser($magv) AND $giaovien->deleteInfo($magv)){
                            header("location: index.php?controller=giao-vien&action=list");
                            echo "<script>alert('thanh cong')</script>";
                        }
                        else{
                            header("location: index.php?controller=giao-vien&action=list");
                            echo "<script>alert('That bai')</script>";   
                        }
                    } 
                }
            }
            else{
                printAlertHaveNoPermit();
            }
            break;
        }
    case 'info':
        {
            if($ss->checkLogin()){
                if(isset($_GET['magv'])){
                    $magv = $_GET['magv'];
                    $data = $giaovien->getInfoteacher($magv);
                }
                require_once 'view/giaovien/info_teacher.php';
            }
            else{
                printAlertLogin();
            }
            break;
        }
    case 'list':
        {
            $data = $giaovien->getListTeacher();
            require_once 'view/giaovien/list_teacher.php';
            break;
        }
    case 'search':
        {
            if(isset($_GET['search-value'])){
                $searchValue = $_GET['search-value'];
                $data = $giaovien->searchInfo($searchValue);
            }
            require_once 'view/giaovien/search_teacher.php';
            break;
        }
    case 'filter':
        {
            if(isset($_GET['namgv']) AND isset($_GET['manm'])){
                $namgv = $_GET['namgv'];
                $manm = $_GET['manm'];
                $data = $giaovien->filterInfo($namgv,$manm);
            }
            require_once 'view/giaovien/search_teacher.php';
            break;
        }
    default:
        {
            $data = $giaovien->getListteacher();
            require_once 'view/giaovien/list_teacher.php';
            break;
        }
}
?>