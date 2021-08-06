<?php
class teacher{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }
    public function getListTeacher(){
        $sql = "SELECT * FROM giaovien AS gv, monhoc AS mh WHERE mh.mamh = gv.mamh ORDER BY gv.tengv ASC";
        $result = $this->db->selectALot($sql);
        return $result;
    }
    public function getListSubject(){
        $sql = "SELECT * FROM monhoc";
        $result = $this->db->selectALot($sql);
        return $result;
    }
    public function getInfoTeacher($magv){
        $sql = "SELECT * FROM taikhoan AS us, giaovien AS gv, monhoc AS mh WHERE us.magv = gv.magv AND mh.mamh = gv.mamh AND gv.magv = '$magv'";
        $result = $this->db->selectOne($sql);
        return $result;
    }
    public function insertIntoTeacher($magv,$hotendemgv,$tengv,$mamh,$namgv,$gioitinh,$ngaysinh,$diachi){
        $sql = "INSERT INTO giaovien(magv,hotendemgv,tengv,mamh,namgv,gioitinh,ngaysinh,diachi) VALUES ('$magv','$hotendemgv','$tengv','$mamh','$namgv','$gioitinh','$ngaysinh','$diachi')";
        $result = $this->db->insert($sql);
        return $result;
    }
    public function updateInfo($magv,$hotendemgv,$tengv,$mamh,$namgv,$gioitinh,$ngaysinh,$diachi){
        $sql = "UPDATE giaovien SET hotendemgv = '$hotendemgv', tengv = '$tengv', mamh = '$mamh', namgv = '$namgv', gioitinh = '$gioitinh', ngaysinh = '$ngaysinh', diachi = '$diachi' WHERE magv = '$magv'";
        $result = $this->db->update($sql);
        return $result;
    }
    public function deleteInfo($magv){
        $sql = "DELETE FROM giaovien WHERE magv = '$magv'";
        $result = $this->db->delete($sql);
        return $result;
    }
    public function filterInfo($namgv,$manm){
        $sql = "SELECT * FROM taikhoan AS us, giaovien AS gv, monhoc AS mh WHERE us.magv = gv.magv AND mh.mamh = gv.mamh AND mh.manm REGEXP '$manm' AND gv.namgv REGEXP '$namgv' ORDER BY gv.tengv ASC";
        $result = $this->db->selectALot($sql);
        return $result;
    }
    public function searchInfo($search){
        $sql = "SELECT * FROM taikhoan AS us, giaovien AS gv, monhoc AS mh WHERE us.magv = gv.magv AND mh.mamh = gv.mamh AND (gv.tengv REGEXP '$search' OR gv.hotendemgv REGEXP '$search') ORDER BY gv.tengv ASC";
        $result = $this->db->selectALot($sql);
        return $result;
    }
    public function getSubjectGroup($mamh){
        $sql = "SELECT manm FROM monhoc WHERE mamh = '$mamh'";
        $result = $this->db->selectOne($sql);
        return $result;
    }
    public function getMaxID($mamh,$namgv){
        $manm = $this->getSubjectGroup($mamh)[0];
        $sql = "SELECT gv.namgv,MAX(gv.magv) FROM giaovien AS gv, monhoc AS mh WHERE gv.mamh = mh.mamh AND mh.manm = '$manm' AND gv.namgv = '$namgv'";
        $result = $this->db->selectOne($sql);
        return $result;
    }
    public function setID($mamh,$namgv){
        if(($this->getMaxID($mamh,$namgv)[0] == 0)) {
            if($this->getSubjectGroup($mamh)[0] =='A')
                return (41*10000000)+((int)$namgv*1000)+1;
            else if($this->getSubjectGroup($mamh)[0] =='D')
                return (44*10000000)+((int)$namgv*1000)+1;
            else 
                return (54*10000000)+((int)$namgv*1000)+1;
        }
        if(($this->getMaxID($mamh,$namgv)['MAX(gv.magv)']!=NULL) AND ((int)$this->getMaxID($mamh,$namgv)['namgv']==(int)$namgv)){
            return (int)$this->getMaxID($mamh,$namgv)['MAX(gv.magv)'] + 1;
        }
        
    }
    public function getSubject($magv){
        $sql = "SELECT * FROM monphutrach WHERE magv = '$magv'";
        $result = $this->db->selectALot($sql);
        return $result;
    }
}
?>