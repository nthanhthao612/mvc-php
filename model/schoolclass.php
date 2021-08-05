<?php
class schoolclass{
    private $db;
    public function __construct(){
        $this->db = new database();
    }
    public function getListClass(){
        $sql = "SELECT * FROM nhommon AS nm, lop AS l,giaovien AS gv WHERE nm.manm = l.manm AND l.magv = gv.magv ORDER BY l.malop ASC";
        $result = $this->db->selectALot($sql);
        return $result;
    }
    public function getInfoClass($malop){
        $sql = "SELECT * FROM lop WHERE malop = '$malop'";
        $result = $this->db->selectOne($sql);
        return $result;
    }
    public function insertClass($makhoi,$malop,$magv,$manm){
        $sql = "INSERT INTO lop(magv,makhoi,malop,manm) VALUES('$magv','$makhoi','$malop','$manm')";
        $result = $this->db->insert($sql);
        return $result;
    }
    public function updateClass($malop,$magv,$manm){
        $sql = "UPDATE lop SET magv = '$magv', manm = '$manm' WHERE malop ='$malop'";
        $result = $this->db->update($sql);
        return $result;
    }
    public function countFigure($malop){
        $sql = "SELECT COUNT(*) AS count FROM hocsinh WHERE malop='$malop'";
        $result = $this->db->selectOne($sql);
        return $result;
    }
    public function searchClass($search){
        $sql = "SELECT * FROM lop AS l,giaovien AS gv,nhommon AS nm WHERE nm.manm = l.manm AND l.magv = gv.magv AND (l.malop REGEXP '$search' OR gv.tengv REGEXP '$search') ORDER BY l.malop ASC";
        $result = $this->db->selectALot($sql);
        return $result;
    }
    public function filterClass($makhoi,$manm){
        $sql = "SELECT * FROM giaovien AS gv, lop AS l,nhommon AS nm  WHERE l.makhoi = '$makhoi' AND l.manm = nm.manm AND l.manm = '$manm' AND l.magv = gv.magv ORDER BY l.malop ASC";
        $result = $this->db->selectALot($sql);
        return $result;
    }
    public function listTeacher($malop){
        $sql = "SELECT * FROM giaovien AS gv, monphutrach AS mpt, monhoc AS mh WHERE gv.mamh = mh.mamh AND mpt.magv = gv.magv AND mpt.malop = '$malop'";
        $result = $this->db->selectALot($sql);
        return $result;
    }
    public function checkTeacher($malop,$magv){
        $sql = "SELECT * FROM giaovien AS gv, monphutrach AS mpt, monhoc AS mh WHERE gv.mamh = mh.mamh AND mpt.magv = gv.magv AND mpt.malop = '$malop' AND mpt.magv = '$magv'";
        $result = $this->db->selectOne($sql);
        return $result;
    }
    public function insertSubTeacher($malop,$magv){
        $sql = "INSERT INTO monphutrach(malop,magv) VALUES('$malop','$magv')";
        $result = $this->db->insert($sql);
        return $result;
    }
    public function updateSubTeacher($malop,$magv,$mamh){
        $sql = "UPDATE monphutrach SET magv = '$magv' WHERE malop = '$malop'";
        $result = $this->db->update($sql);
        return $result;
    }
}
?>