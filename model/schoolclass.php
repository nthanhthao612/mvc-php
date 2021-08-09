<?php
class schoolclass{
    private $db;
    public function __construct(){
        $this->db = new database();
    }
    public function getListSubject(){
        $sql = "SELECT * FROM monhoc";
        $result = $this->db->selectALot($sql);
        return $result;
    }
    public function initialize($malop){
        $temp = $this->getListSubject();
        foreach($temp AS $value){
            $mamh = $value['mamh'];
            $this->db->insert("INSERT INTO monphutrach(magv, malop, mamh) VALUES (NULL,'$malop','$mamh')");
        }
    }
    public function getListClass(){
        $sql = "SELECT * FROM nhommon AS nm, lop AS l,giaovien AS gv WHERE nm.manm = l.manm AND l.magv = gv.magv ORDER BY l.malop ASC";
        $result = $this->db->selectALot($sql);
        return $result;
    }
    public function getInfoClass($malop){
        $sql = "SELECT * FROM lop AS l,giaovien AS gv WHERE gv.magv = l.magv AND l.malop = '$malop'";
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
        $sql = "SELECT * FROM monphutrach AS mpt, monhoc AS mh WHERE mpt.mamh = mh.mamh AND mpt.malop = '$malop'";
        $result = $this->db->selectALot($sql);
        $sql1 = "SELECT * FROM giaovien AS gv, monphutrach AS mpt, monhoc AS mh WHERE gv.mamh = mh.mamh AND mpt.magv = gv.magv AND mpt.malop = '$malop'";
        $result1 = $this->db->selectALot($sql1);
        if($result1[0] == 0){
            return $result;
        }
        $result = array_merge($result,$result1);
        for($i = 0 ;$i<count($result)-1;$i++){
            for($j = $i+1 ;$j<count($result);$j++){
                if($result[$i]['mamh'] == $result[$j]['mamh']){
                    if(isset($result[$j]['magv'])){
                        $result[$i] = $result[$j];
                    }
                }
            }
        }
        array_splice($result,10);
        return $result;
    }
    public function updateSubTeacher($malop,$magv,$mamh){
        $sql1 = "SELECT * FROM giaovien WHERE magv = '$magv'";
        $temp = $this->db->selectOne($sql1);
        if($temp['mamh'] == $mamh){
            $sql = "UPDATE monphutrach SET magv = '$magv' WHERE malop = '$malop' AND mamh = '$mamh'";
            $result = $this->db->update($sql);
            return $result;
        }

    }
    public function searchSubTeacher($magv,$mamh,$malop){
        $sql = "SELECT * FROM giaovien AS gv,monphutrach AS mpt, monhoc AS mh WHERE mpt.magv = gv.magv AND gv.mamh = mh.mamh AND mpt.malop = '$malop' AND mpt.magv = '$magv' AND mpt.mamh = '$mamh'";
        if($magv == ''){
            $sql = "SELECT * FROM monphutrach AS mpt, monhoc AS mh WHERE mpt.mamh = mh.mamh AND mpt.malop = '$malop' AND mpt.mamh = '$mamh'";
        }
        $result = $this->db->selectOne($sql);
        return $result;
    }
}
?>