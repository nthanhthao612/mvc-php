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
                if (isset($_POST['add_diem'])){
                    $mahs = $_POST['mahs'];
                    $mahk = $_POST['mahk'];
                    $mamh = $_POST['mamh'];
                    $magv = $_POST['magv'];
                    $diemmieng = $_POST['diemmieng'];
                    $diem15p = $_POST['diem15p'];
                    $diem1tiet = $_POST['diem1tiet'];
                    $diemhk = $_POST['diemhk'];
                    if($diem->insertMark($mamh,$mahs,$mahk,$magv,$diemmieng,$diem15p,$diem1tiet,$diemhk)){
                        header("location: index.php?controller=diem&action=info&mahs=$mahs&mahk=$mahk");
                        echo "<script>alert('Thêm Thành Công!')</script>";
                    }
                    else{
                        echo "<script>alert('Thêm Thất bại!')</script>";
                    }
                }
                require_once 'view/diem/add_diem.php';
            }
            else{
                header('location: index.php?controller=diem&action=list');
                echo "<script type='text/javascript'>alert('Cần Đăng nhập để thực hiện thao tác');</script>"; 
            }
            break;
        }
    case 'add-list':
        {
            if(isset($_POST['add-list-mark'])){
                $data = array();
                if(isset($_FILES['excel']['name'])){
                        $excel = SimpleXLSX::parse($_FILES['excel']['tmp_name']);
                        $data = $excel->rows();
                }
                for($i = 1;$i<count($data);$i++){
                    $temp = $data[$i];
                        $mamh = $temp[0];
                        $mahs = $temp[1];
                        $mahk = $temp[2];
                        $magv = $temp[3];
                        $diemmieng = $temp[4];
                        $diem15p = $temp[5];
                        $diem1tiet = $temp[6];
                        $diemhk = $temp[7];
                        if($diem->checkExist($mahs,$mahk,$mamh)[0] == 0)
                            $diem->insertMark($mamh,$mahs,$mahk,$magv,$diemmieng,$diem15p,$diem1tiet,$diemhk);
                        else
                            $diem->updateMark($mamh,$mahs,$mahk,$magv,$diemmieng,$diem15p,$diem1tiet,$diemhk);
                    }
                header('location:index.php?controller=diem&action=');
            }
            require_once 'view/diem/addlist_diem.php';
            break;
        }
    case 'edit':
        {
            if($ss->checkLogin() == True){
                if(isset($_GET['mahs']) and isset($_GET['mamh']) and isset($_GET['mahk'])){
                    $mahs = $_GET['mahs'];
                    $mamh = $_GET['mamh'];
                    $mahk = $_GET['mahk'];
                    $data = $diem->getSingleMark($mamh,$mahs,$mahk);
                }
                if(isset($_POST['edit_diem'])){
                    $mahs = $_POST['mahs'];
                    $mahk = $_POST['mahk'];
                    $mamh = $_POST['mamh'];
                    $magv = $_POST['magv'];
                    $diemmieng = $_POST['diemmieng'];
                    $diem15p = $_POST['diem15p'];
                    $diem1tiet = $_POST['diem1tiet'];
                    $diemhk = $_POST['diemhk'];
                    if($diem->updateMark($mamh,$mahs,$mahk,$magv,$diemmieng,$diem15p,$diem1tiet,$diemhk)){
                        header("location: index.php?controller=diem&action=info&mahs=$mahs&mahk=$mahk");
                        echo "<script>alert('Sửa Thành Công!')</script>"; 
                    }
                    else{
                        header("location: index.php?controller=diem&action=info&mahs=$mahs&mahk=$mahk");
                        echo "<script>alert('Sửa Thất bại!')</script>";
                    }
                }
                require_once 'view/diem/edit_diem.php';
            }
            else{
                header('location: index.php?controller=diem&action=list');
                echo "<script type='text/javascript'>alert('Cần Đăng nhập để thực hiện thao tác');</script>"; 
            }
            break;
        }
    case 'delete':
        {
            if($ss->checkLogin() == True){
                if(isset($_GET['mahs']) AND isset($_GET['mamh']) AND isset($_GET['mahk'])){
                    $mahs = $_GET['mahs'];
                    $mamh = $_GET['mamh'];
                    $mahk = $_GET['mahk'];
                    if($diem->deleteMark($mamh,$mahs,$mahk)){
                        header("location: index.php?controller=diem&action=info&mahs=$mahs&mahk=$mahk");
                        echo "<script>alert('Sửa Thành Công!')</script>";
                    }
                else{
                    header("location: index.php?controller=diem&action=info&mahs=$mahs&mahk=$mahk");
                    echo "<script>alert('Sửa Thành Công!')</script>";
                }
            }
            else{
                header('location: index.php?controller=diem&action=list');
                echo "<script type='text/javascript'>alert('Cần Đăng nhập để thực hiện thao tác');</script>"; 
            }
            break;
            }
        }
    case 'info':
        {
            if(isset($_GET['mahs']) AND isset($_GET['mahk']))
            {
                $mahs = $_GET['mahs'];
                $mahk = $_GET['mahk'];
                $data = $diem->getInfoMark($mahs,$mahk);
                $tongket = $diem->getSummary($mahs,$mahk);
            }
            require_once 'view/diem/info_diem.php';
            break;
        }
    case 'list':
        {
            $data = $diem->getClassMark();
            require_once 'view/diem/list_diem.php';
            break;
        }
    case 'list-detail':
        {
            if(isset($_GET['malop']) AND isset($_GET['mahk'])){
                $malop = $_GET['malop'];
                $mahk = $_GET['mahk'];
                $data = $diem->getDetailClassMark($malop,$mahk);
            }
            require_once 'view/diem/list_diem_detail.php';
            break;
        }
    case 'search':
        {
            if(isset($_GET['search-value'])){
                $searchValue = $_GET['search-value'];
                $data = $diem->searchClassMark($searchValue);
            }
            require_once 'view/diem/search_diem.php';
            break;
        }
    case 'search-detail':
        {
            if(isset($_GET['search-value']) AND isset($_GET['malop']) AND isset($_GET['mahk'])){
                $malop = $_GET['malop'];
                $mahk = $_GET['mahk'];
                $searchValue = $_GET['search-value'];
                $data = $diem->searchDetailClassMark($malop,$mahk,$searchValue);
            }
            require_once 'view/diem/search_diem_detail.php';
            break;
        }
    case 'filter':
        {
            if(isset($_GET['makhoi']) AND isset($_GET['mahk'])){
                $makhoi = $_GET['makhoi'];
                $mahk = $_GET['mahk'];
                $data = $diem->filterClassMark($makhoi,$mahk);
            }
            require_once 'view/diem/search_diem.php';
            break;
        }
    case 'filter-detail':
        {
            if(isset($_GET['malop']) AND isset($_GET['mahk']) AND isset($_GET['xeploai'])){
                $malop = $_GET['malop'];
                $mahk = $_GET['mahk'];
                $xeploai = $_GET['xeploai'];
                $data = $diem->filterDetailClassMark($malop,$mahk,$xeploai);
            }
            require_once 'view/diem/search_diem_detail.php';
            break;
        }
    default:
        {
            $data = $diem->getClassMark();
            require_once 'view/diem/list_diem.php';
            break;
        }
}
