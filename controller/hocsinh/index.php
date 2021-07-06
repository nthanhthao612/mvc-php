<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = '';
}

switch ($action) { 
    case 'add':
        {
            if($ss->checkLogin() == True){
                if(isset($_POST['add_hocsinh'])){
                    $hotendem = $_POST['hotendem'];
                    $ten = $_POST['ten'];
                    $malop = $_POST['malop'];
                    $gioitinh = $_POST['gioitinh'];
                    $ngaysinh = $_POST['ngaysinh'];
                    $diachi = $_POST['diachi'];
                    $nam = $_POST['nam'];
                    $mahs = $hocsinh->setID($malop,$nam);
                    if($hocsinh->insertInfo($mahs,$hotendem,$ten,$malop,$gioitinh,$nam,$ngaysinh,$diachi)){
                        header('location: index.php?controller=hoc-sinh&action=list');
                        echo "<script>alert('Thành Công!')</script>";
                    }
                    else{
                        echo "<script>alert('Thất Bại!')</script>";
                    }
                }
                require_once 'view/hocsinh/add_hocsinh.php';
            }
            else{
                header('location: index.php?controller=hoc-sinh&action=list');
                echo "<script type='text/javascript'>alert('Cần Đăng nhập để thực hiện thao tác');</script>"; 
            }
            break;
        }
    case 'edit':
        {
            if($ss->checkLogin() == True){
                if(isset($_GET['mahs'])){
                $mahs = $_GET['mahs'];
                $data = $hocsinh->getInfoStudent($mahs);
                }
                if(isset($_POST['edit_hocsinh'])){
                    $mahs = $_POST['mahs'];
                    $hotendem = $_POST['hotendem'];
                    $ten = $_POST['ten'];
                    $malop = $_POST['malop'];
                    $gioitinh = $_POST['gioitinh'];
                    $ngaysinh = $_POST['ngaysinh'];
                    $diachi = $_POST['diachi'];
                    if($hocsinh->updateInfo($mahs,$hotendem,$ten,$malop,$gioitinh,$ngaysinh,$diachi)){
                        header('location: index.php?controller=hoc-sinh&action=list');
                        echo "<script>alert('thanh cong')</script>";
                    }
                    else{
                        header('location: index.php?controller=hoc-sinh&action=list');
                        echo "<script>alert('That bai')</script>";   
                    }
                }
                require_once 'view/hocsinh/edit_hocsinh.php';
            }
            else{
                header('location: index.php?controller=hoc-sinh&action=list');
                echo "<script type='text/javascript'>alert('Cần Đăng nhập để thực hiện thao tác');</script>"; 
            }
            break;
        }
    case 'delete':
        {
            if($ss->checkLogin() == True){
                if(isset($_GET['mahs'])){
                    $mahs = $_GET['mahs'];
                    if($hocsinh->deleteInfo($mahs)){
                        header('location: index.php?controller=hoc-sinh&action=list');
                        echo "<script>alert('thanh cong')</script>";
                    }
                    else{
                        header('location: index.php?controller=hoc-sinh&action=list');
                        echo "<script>alert('That bai')</script>";
                    }
                }
            }
            else{
                header('location: index.php?controller=hoc-sinh&action=list');
                echo "<script type='text/javascript'>alert('Cần Đăng nhập để thực hiện thao tác');</script>";
            }
            break;
        }
    case 'info':
        {
            $mahs = $_GET['mahs'];
            $data = $hocsinh->getInfoStudent($mahs);
            require_once 'view/hocsinh/info_hocsinh.php';
            break;
        }
    case 'list':
        {
            $data = $hocsinh->getListStudent();
            if(isset($_GET['malop'])){
                $malop = $_GET['malop'];
                $data = $hocsinh->getListStudentByClassID($malop);
            }
            require_once 'view/hocsinh/list_hocsinh.php';
            break;
        }
    case 'search':
        {
            if(isset($_GET['search-value'])){
                $searchValue = $_GET['search-value'];
                $data = $hocsinh->searchList($searchValue);
            }
            require_once 'view/hocsinh/search_hocsinh.php';
            break;
        }
    case 'filter':
        {
            if(isset($_GET['makhoi']) AND isset($_GET['manm'])){
                $makhoi = $_GET['makhoi'];
                $manm = $_GET['manm'];
                $data = $hocsinh->filterList($makhoi,$manm);
            }
            require_once 'view/hocsinh/search_hocsinh.php';
            break;
        }
    default:
        {
            $data = $hocsinh->getListStudent();
            require_once 'view/hocsinh/list_hocsinh.php';
            break;
        }
}
?>