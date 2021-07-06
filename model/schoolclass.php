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
        $sql = "SELECT gv.magv,gv.tengv,gv.hotendemgv,l.malop,gv.mamh,mh.tenmh FROM giaovien AS gv,monhoc AS mh, bangdiem AS bd, lop AS l,hocsinh AS hs WHERE mh.mamh = gv.mamh AND hs.malop = '$malop' AND gv.magv = bd.magv AND hs.malop = l.malop AND bd.mahs = hs.mahs GROUP BY gv.magv";
        $result = $this->db->selectALot($sql);
        return $result;
    }
}
?>