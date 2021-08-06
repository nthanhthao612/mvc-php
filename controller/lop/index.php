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
                if (isset($_POST['add_lop'])) {
                    $makhoi = $_POST['makhoi'];
                    $malop = $_POST['malop'];
                    $magv = $_POST['magv'];
                    $manm = $_POST['manm'];
                    if($ss->get('username')=='admin'){
                        if($lop->insertClass($makhoi,$malop,$magv,$manm)){
                            $lop->initialize($malop);
                            header('location: index.php?controller=lop&action=list');
                        }
                        else
                           echo "<script>alert('That bai')</script>";
                    }
                }
                require_once 'view/lop/add_lop.php';
            }
            else{
                printAlertHaveNoPermit();
            }
            break;
        }
    case 'edit':
        {
            if($ss->checkLogin() == True AND $ss->get('privilege')=='admin'){
                if(isset($_GET['malop'])){
                    $malop = $_GET['malop'];
                    $data = $lop->getInfoClass($malop);
                }
                if($ss->get('username')=='admin'){
                    if(isset($_POST['edit_lop'])){
                        if($lop->updateClass($_POST['malop'],$_POST['magv'],$_POST['manm'])){
                            header('location: index.php?controller=lop&action=list');
                            echo "<script>alert('thanh cong')</script>";
                        }
                        else{
                            
                            header('location: index.php?controller=lop&action=list');
                            echo "<script>alert('That bai')</script>";
                        }
                    }
                }
                require_once 'view/lop/edit_lop.php';
            }
            else{
                printAlertHaveNoPermit();
            } 
            break;
        }
    case 'list':
        {
            $data = $lop->getListClass();
            require_once 'view/lop/list_lop.php';
            break;
        }
    case 'search':
        {
            $searchValue = $_GET['search-value'];
            $data = $lop->searchClass($searchValue);
            require_once 'view/lop/search_lop.php';
            break;
        }
    case 'filter':
        {
            $makhoi = $_GET['makhoi'];
            $manm = $_GET['manm'];
            $data = $lop->filterClass($makhoi,$manm);
            require_once 'view/lop/search_lop.php';
            break;
        }
    case 'info':
        {
            $malop = $_GET['malop'];
            $data = $lop->listTeacher($malop);
            require_once 'view/lop/info_lop.php';
            break;
        }

    case 'edit-subteacher':{
            if($ss->checkLogin()==TRUE AND $ss->get('username')=='admin'){
                if(isset($_POST['edit_subteacher'])){
                    $malop = $_POST['malop'];
                    $magv = $_POST['magv'];
                    $mamh = $_POST['mamh'];
                    if($lop->updateSubTeacher($malop,$magv,$mamh)){
                        header("location: index.php?controller=lop&action=info&malop=$malop");
                    }
                }
                require_once 'view/lop/edit_bomon.php';
            }   
            else{
                printAlertHaveNoPermit();
            }
            break;
        }
    default:
        {
            $data = $lop->getListClass();
            require_once 'view/lop/list_lop.php';
            break;
        }
}
?>