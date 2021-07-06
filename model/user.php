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
    public function insertIntoUser($tentk,$matkhau,$magv){
        $sql = "INSERT INTO taikhoan(tentk,matkhau,magv) VALUES ('$tentk','$matkhau','$magv')";
        $result = $this->db->insert($sql);
        return $result;
    }
    public function updateUser($tentk,$matkhau,$magv){
        $sql = "UPDATE taikhoan SET tentk = '$tentk', matkhau='$matkhau' WHERE magv = '$magv'";
        $result = $this->db->update($sql);
        return $result;
    }
    public function deleteUser($magv){
        $sql = "DELETE FROM taikhoan WHERE magv = '$magv'";
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
            $sql = "SELECT * FROM taikhoan AS ur, giaovien AS gv WHERE ur.tentk = '$tentk' AND ur.matkhau = '$matkhau' AND gv.magv = ur.magv";
            $result = $this->db->selectOne($sql);
            if($result != 0){
                $this->ss->set('login',True);
                $this->ss->set('username',$result['tentk']);
                $this->ss->set('userID',$result['magv']);
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
}
?>