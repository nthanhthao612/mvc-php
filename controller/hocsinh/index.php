<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = '';
}

switch ($action) {
    case 'add-list':
        {
            if($ss->checkLogin() == True AND $ss->get('privilege')== 'gv'){
                if($hocsinh->authenticateTeacherPermit($ss->get('username'),$_GET['malop'])){
                    if(isset($_POST['add-list-student'])){
                        $data = array();
                        if(isset($_FILES['excel']['name'])){
                                $excel = SimpleXLSX::parse($_FILES['excel']['tmp_name']);
                                $data = $excel->rows();
                        }
                        for($i = 1;$i<count($data);$i++){
                            $temp = $data[$i];
                                $malop = $temp[0];
                                $hotendem = $temp[1];
                                $ten = $temp[2];
                                $temp[3] == "Nam"? $gioitinh = "Nam" : $gioitinh = "Nữ";
                                $nam = $temp[4];
                                $ngaysinh = $temp[5];
                                $diachi = $temp[6];
                                $mahs = $hocsinh->setID($malop,$nam);
                                if($hocsinh->getInfoStudent($mahs)[0]==0){
                                    $hocsinh->insertInfo($mahs,$hotendem,$ten,$malop,$gioitinh,$nam,$ngaysinh,$diachi);
                                    $taikhoan->insertIntoUser($mahs,md5('1'),$mahs,'hs');
                                }
                        }
                        header('location:index.php?controller=hoc-sinh&action=');
                    }
                    require_once 'view/hocsinh/addlist_hocsinh.php';
                }
                else
                    printAlertHaveNoPermit(); 
            }
            else
                printAlertLogin();
            break;
        }
    case 'add':
        {
            if($ss->checkLogin() == True AND $ss->get('privilege')== 'gv'){
                if(isset($_POST['add_hocsinh'])){
                    $hotendem = $_POST['hotendem'];
                    $ten = $_POST['ten'];
                    $malop = $_POST['malop'];
                    $_POST['gioitinh'] == 1? $gioitinh = "Nam" : $gioitinh = "Nữ";
                    $ngaysinh = $_POST['ngaysinh'];
                    $diachi = $_POST['diachi'];
                    $nam = $_POST['nam'];
                    $mahs = $hocsinh->setID($malop,$nam);
                    if($hocsinh->authenticateTeacherPermit($ss->get('username'),$malop)){
                        if($hocsinh->insertInfo($mahs,$hotendem,$ten,$malop,$gioitinh,$nam,$ngaysinh,$diachi) AND $taikhoan->insertIntoUser($mahs,md5('1'),$mahs,'hs')){
                            header("location: index.php?controller=hoc-sinh&action=list&malop=$malop");
                            echo "<script>alert('Thành Công!')</script>";
                        }
                        else{
                            echo "<script>alert('Thất Bại!')</script>";
                        }
                    }
                }
                require_once 'view/hocsinh/add_hocsinh.php';
            }
            else{
                printAlertLogin(); 
            }
            break;
        }
    case 'edit':
        {
            if($ss->checkLogin() == True AND $ss->get('username')==$_GET['mahs']){
                if(isset($_GET['mahs'])){
                $mahs = $_GET['mahs'];
                $data = $hocsinh->getInfoStudent($mahs);
                }
                if(isset($_POST['edit_hocsinh'])){
                    $mahs = $_POST['mahs'];
                    $hotendem = $_POST['hotendem'];
                    $ten = $_POST['ten'];
                    $malop = $_POST['malop'];
                    $_POST['gioitinh'] == 1 ? $gioitinh = "Nam" : $gioitinh = "Nữ";
                    $ngaysinh = $_POST['ngaysinh'];
                    $diachi = $_POST['diachi'];
                    $matkhau = md5($_POST['matkhau']);
                    if($hocsinh->authenticateStudentPermit($ss->get('username')) AND ($ss->get('username') == $_GET['mahs'])){
                        if($hocsinh->updateInfo($mahs,$hotendem,$ten,$malop,$gioitinh,$ngaysinh,$diachi) AND $taikhoan->updateUser($mahs,$matkhau)){
                            header("location: index.php?controller=hoc-sinh&action=info&mahs=$mahs");
                        }
                        else{   
                            echo "<script>alert('Sửa Thất bại')</script>";   
                        }
                    }
                    else{
                        printAlertHaveNoPermit();
                    }
                }
                require_once 'view/hocsinh/edit_hocsinh.php';
            }
            else{
                printAlertLogin(); 
            }
            break;
        }
    case 'delete':
        {
            $malop = $_GET['malop'];
            if($ss->checkLogin() == True){
                if(isset($_GET['mahs'])){
                    $mahs = $_GET['mahs'];
                    if($hocsinh->authenticateTeacherPermit($ss->get('username'),$malop)){
                        if($taikhoan->deleteUser($mahs) AND $hocsinh->deleteInfo($mahs)){
                            header("location: index.php?controller=hoc-sinh&action=list&malop=$malop");
                        }
                        else{
                            header("location: index.php?controller=hoc-sinh&action=list&malop=$malop");
                        }
                    }
                    else
                        printAlertHaveNoPermit();
                }
            }
            else{
                printAlertLogin();
            }
            break;
        }
    case 'info':
        {
            if($ss->checkLogin()){
                $mahs = $_GET['mahs'];
                $data = $hocsinh->getInfoStudent($mahs);
                require_once 'view/hocsinh/info_hocsinh.php';
            }
            else
                printAlertLogin();
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