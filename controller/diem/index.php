<?php

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = '';
}

switch ($action) {
    case 'add':
        {
            $malop = $_GET['malop'];
            if($ss->checkLogin() == True AND $ss->get('privilege')=='gv'){
                if (isset($_POST['add_diem'])){
                    $mahs = $_POST['mahs'];
                    $namhoc = $_POST['namhoc'];
                    $mahk = $_POST['mahk'];
                    $mamh = $_POST['mamh'];
                    $magv = $_POST['magv'];
                    $diemmieng = $_POST['diemmieng'];
                    $diem15p = $_POST['diem15p'];
                    $diem1tiet = $_POST['diem1tiet'];
                    $diemhk = $_POST['diemhk'];
                    if($diem->authentication($ss->get('username'),$malop,$mamh)){
                        if($diem->updateMark($mamh,$mahs,$namhoc,$mahk,$magv,$diemmieng,$diem15p,$diem1tiet,$diemhk)){
                            header("location: index.php?controller=diem&action=info&mahs=$mahs&mahk=$mahk&malop=$malop");
                            echo "<script>alert('Thêm Thành Công!')</script>";
                        }
                        else{
                            echo "<script>alert('Thêm Thất bại!')</script>";
                        }
                    }
                }
                require_once 'view/diem/add_diem.php';
            }
            else{
                printAlertHaveNoPermit();
            }
            break;
        }
    case 'add-list':
        {
            if($ss->checkLogin() == True AND $ss->get('privilege')=='gv'){
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
                        $malop = $temp[2];   
                        $namhoc = $temp[3];
                        $mahk = $temp[4];
                        $magv = $temp[5];
                        $diemmieng = $temp[6];
                        $diem15p = $temp[7];
                        $diem1tiet = $temp[8];
                        $diemhk = $temp[9];
                        if($diem->authentication($ss->get('username'),$malop,$mamh)){
                            if($diem->checkExist($mahs,$namhoc,$mahk,$mamh)[0] == 0)
                            $diem->insertMark($mamh,$mahs,$namhoc,$mahk,$magv,$diemmieng,$diem15p,$diem1tiet,$diemhk);
                        else
                            $diem->updateMark($mamh,$mahs,$namhoc,$mahk,$magv,$diemmieng,$diem15p,$diem1tiet,$diemhk);
                        }
                    }
                    header('location:index.php?controller=diem&action=');
                }
                require_once 'view/diem/addlist_diem.php';
            }
            else{
                printAlertHaveNoPermit();
            }
            break;
        }
    case 'edit':
        {
            $malop = $_GET['malop'];
            if($ss->checkLogin() == True AND $ss->get('privilege')=='gv'){
                if(isset($_GET['mahs']) and isset($_GET['mamh']) and isset($_GET['mahk'])){
                    $mahs = $_GET['mahs'];
                    $mamh = $_GET['mamh'];
                    $namhoc = $_GET['namhoc'];
                    $mahk = $_GET['mahk'];
                    $data = $diem->getSingleMark($mamh,$mahs,$mahk,$namhoc);
                }
                if(isset($_POST['edit_diem'])){
                    $mahs = $_POST['mahs'];
                    $mahk = $_POST['mahk'];
                    $namhoc = $_POST['namhoc'];
                    $mamh = $_POST['mamh'];
                    $magv = $_POST['magv'];
                    $diemmieng = $_POST['diemmieng'];
                    $diem15p = $_POST['diem15p'];
                    $diem1tiet = $_POST['diem1tiet'];
                    $diemhk = $_POST['diemhk'];
                    if($diem->authentication($ss->get('username'),$_GET['malop'],$mamh)){
                        if($diem->updateMark($mamh,$mahs,$namhoc,$mahk,$magv,$diemmieng,$diem15p,$diem1tiet,$diemhk)){
                            header("location: index.php?controller=diem&action=info&mahs=$mahs&mahk=$mahk&malop=$malop");
                            echo "<script>alert('Sửa Thành Công!')</script>"; 
                        }
                        else{
                            header("location: index.php?controller=diem&action=info&mahs=$mahs&mahk=$mahk&malop=$malop");
                            echo "<script>alert('Sửa Thất bại!')</script>";
                        }
                    }
                    
                }
                require_once 'view/diem/edit_diem.php';
            }
            else{
                printAlertHaveNoPermit();
            }
            break;
        }
    case 'delete':
        {
            $malop = $_GET['malop'];
            if($ss->checkLogin() == True AND $ss->get('privilege')=='gv'){
                if(isset($_GET['mahs']) AND isset($_GET['mamh']) AND isset($_GET['mahk'])){
                    $mahs = $_GET['mahs'];
                    $mamh = $_GET['mamh'];
                    $mahk = $_GET['mahk'];
                    $namhoc = $_GET['namhoc'];
                    if($diem->authentication($ss->get('username'),$_GET['malop'],$mamh)){
                        if($diem->deleteMark($mamh,$mahs,$mahk,$namhoc)){
                            header("location: index.php?controller=diem&action=info&mahs=$mahs&mahk=$mahk&malop=$malop");
                            echo "<script>alert('Xóa Thành Công!')</script>";
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
            if($ss->checkLogin() == True AND $ss->get('username')==$_GET['mahs']){
                if(isset($_GET['mahs']) AND isset($_GET['mahk'])){
                    $mahs = $_GET['mahs'];
                    $mahk = $_GET['mahk'];
                    $data = $diem->getInfoMark($mahs,$mahk);
                    $tongket = $diem->getSummary($mahs,$mahk);
                }
                require_once 'view/diem/info_diem.php';
            }
            else{
                printAlertHaveNoPermit();
            }
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
                $namhoc = $_GET['namhoc'];
                $data = $diem->getDetailClassMark($malop,$mahk,$namhoc);
                $subject = $diem->getListSubject();
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
                $namhoc = $_GET['namhoc'];
                $searchValue = $_GET['search-value'];
                $data = $diem->searchDetailClassMark($malop,$mahk,$namhoc,$searchValue);
                $subject = $diem->getListSubject();
            }
            
            require_once 'view/diem/search_diem_detail.php';
            break;
        }
    case 'filter':
        {
            if(isset($_GET['makhoi']) AND isset($_GET['mahk'])){
                $makhoi = $_GET['makhoi'];
                $mahk = $_GET['mahk'];
                $namhoc = $_GET['namhoc'];
                $data = $diem->filterClassMark($makhoi,$mahk,$namhoc);
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
                $namhoc = $_GET['namhoc'];
                $data = $diem->filterDetailClassMark($malop,$mahk,$xeploai,$namhoc);
                $subject = $diem->getListSubject();
            }
            
            require_once 'view/diem/search_diem_detail.php';
            break;
        }
    case 'subject':{
        if(isset($_GET['malop']) AND isset($_GET['mahk'])){
                $malop = $_GET['malop'];
                $mahk = $_GET['mahk'];
                $namhoc = $_GET['namhoc'];
                $mamh = $_GET['mamh'];
                $data = $diem->getDetailClassMark($malop,$mahk,$namhoc);
                $data1 = $diem->getMarkSubject($malop,$mahk,$namhoc,$mamh);
                $subject = $diem->getListSubject();
            }
        require_once 'view/diem/thongke.php';
        break;
    }
    default:
        {
            $data = $diem->getClassMark();
            require_once 'view/diem/list_diem.php';
            break;
        }
}

?>
