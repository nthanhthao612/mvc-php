<?php
class user{
    private $db;
    private $fm;
    public $ss;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
        $this->ss = new Session();
    }
    public function insertIntoUser($tentk,$matkhau,$ma,$quyen){
        if($quyen == 'gv'){
            $sql = "INSERT INTO taikhoan(tentk,matkhau,magv,quyen) VALUES ('$tentk','$matkhau','$ma','$quyen')";
            $result = $this->db->insert($sql);
            return $result;
        }
        else{
            $sql = "INSERT INTO taikhoan(tentk,matkhau,mahs,quyen) VALUES ('$tentk','$matkhau','$ma','$quyen')";
            $result = $this->db->insert($sql);
            return $result;
        }
    }
    public function updateUser($tentk,$matkhau){
        $sql = "UPDATE taikhoan SET matkhau='$matkhau' WHERE tentk = '$tentk'";
        $result = $this->db->update($sql);
        return $result;
    }
    public function deleteUser($tentk){
        $sql = "DELETE FROM taikhoan WHERE tentk = '$tentk'";
        $result = $this->db->delete($sql);
        return $result;
    }
    public function loginCheck($tentk,$matkhau){
        $tentk = $this->fm->validation($tentk);
        $matkhau = $this->fm->validation($matkhau);
        $tentk = mysqli_real_escape_string($this->db->conn,$tentk);
        $matkhau = mysqli_real_escape_string($this->db->conn,$matkhau);
        if(empty($tentk) || empty($matkhau)){
            $alert = "Tên tài khoản và mật khẩu không thể để trống!";
            return $alert;
        }
        else{
            $sql = "SELECT * FROM taikhoan WHERE tentk = '$tentk' AND matkhau = '$matkhau'";
            $result = $this->db->selectOne($sql);
            if($result != 0){
                $this->ss->set('login',True);
                $this->ss->set('username',$result['tentk']);
                $this->ss->set('privilege',$result['quyen']);
                header('location:index.php');
            }
            else{
                $alert = "Tên tài khoản hoặc mật khẩu không hợp lê!";
                return $alert;
            }
        }
    }
    public function logoutUser(){
        $this->ss->destroy();
    }
    public function getInfoUser($tentk,$quyen){
        $tentk = (int)$tentk;
        if($quyen == 'gv'){
            $sql = "SELECT * FROM giaovien WHERE magv = '$tentk'";
            $result = $this->db->selectOne($sql);
            return $result;
        }
        else if($quyen == 'admin'){
            $temp = $this->ss->get('userID');
            $result = [$temp,' ','admin'];
            return $result;
        }
        else{
            $sql = "SELECT * FROM hocsinh WHERE mahs = '$tentk'";
            $result = $this->db->selectOne($sql);
            return $result;
        }
    }
}
?>