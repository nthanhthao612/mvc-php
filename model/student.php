<?php
class student{
    private $db;
    public function __construct(){
        $this->db = new database();
    }
    public function getListStudent(){
        $sql = "SELECT * FROM hocsinh AS hs,lop AS l WHERE hs.malop = l.malop";
        $result = $this->db->selectALot($sql);
        return $result;
    }
    public function getListStudentByClassID($malop){
        $sql = "SELECT * FROM hocsinh AS hs,lop AS l WHERE hs.malop = l.malop AND l.malop = '$malop'";
        $result = $this->db->selectALot($sql);
        return $result;
    }
    public function getInfoStudent($mahs){
        $sql = "SELECT * FROM hocsinh AS hs,lop AS l WHERE hs.malop = l.malop AND mahs = '$mahs'";
        $result = $this->db->selectOne($sql);
        return $result;
    }
    public function insertInfo($mahs,$hotendem,$ten,$malop,$gioitinh,$nam,$ngaysinh,$diachi){
        $sql = $sql = "INSERT INTO hocsinh(malop,mahs,hotendem,ten,gioitinh,nam,ngaysinh,diachi) VALUES('$malop','$mahs','$hotendem','$ten','$gioitinh','$nam','$ngaysinh','$diachi')";
        $result = $this->db->insert($sql);  
        return $result;
    }
    public function updateInfo($mahs,$hotendem,$ten,$malop,$gioitinh,$ngaysinh,$diachi){
        $sql = "UPDATE hocsinh SET hotendem = '$hotendem',ten = '$ten',malop = '$malop',gioitinh='$gioitinh',ngaysinh='$ngaysinh',diachi='$diachi' WHERE mahs ='$mahs'";
        $result = $this->db->update($sql);
        return $result;
    }
    public function deleteInfo($mahs){
        $sql = "DELETE FROM hocsinh WHERE mahs = '$mahs'";
        $result = $this->db->delete($sql);
        return $result;
    }
    public function searchList($search){
        $sql = "SELECT * FROM hocsinh WHERE ten REGEXP '$search' OR hotendem REGEXP '$search' OR mahs REGEXP '$search'" ;
        $result = $this->db->selectALot($sql);
        return $result;
    }
    public function filterList($makhoi,$manm){
        $sql = "SELECT * FROM hocsinh AS hs, lop AS l WHERE l.makhoi = '$makhoi' AND l.manm = '$manm' AND l.malop = hs.malop" ;
        $result = $this->db->selectALot($sql);
        return $result;
    }
    public function getSubjectGroup($malop){
        $sql = "SELECT manm FROM lop WHERE malop = '$malop'";
        $result = $this->db->selectOne($sql);
        return $result;
    }
    public function getMaxID($malop,$nam){
        $manm = $this->getSubjectGroup($malop)[0];
        $sql = "SELECT hs.nam,MAX(hs.mahs) FROM hocsinh AS hs, lop AS l WHERE hs.malop = l.malop AND l.manm = '$manm' AND hs.nam = '$nam'";
        $result = $this->db->selectOne($sql);
        return $result;
    }
    public function setID($malop,$nam){
        if(($this->getMaxID($malop,$nam)['MAX(hs.mahs)']!=NULL) AND ($this->getMaxID($malop,$nam)['nam']==$nam)){
            return (int)$this->getMaxID($malop,$nam)['MAX(hs.mahs)'] + 1;
        }
        else{
            if($this->getSubjectGroup($malop)[0] =='A')
                return ((int)$nam * 1000000) + (41 * 10000) + 1;
            else 
                return ((int)$nam * 1000000) + (44 * 10000) + 1;
        }
    }
    
}
?>