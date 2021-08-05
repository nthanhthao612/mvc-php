<?php
class mark{
    private $db;
    public $temp;
    public function __construct(){
        $this->db = new database();
        $this->temp = array();
    }
    public function calculateAVE($diemmieng,$diem15p,$diem1tiet,$diemhk){
        return ($diemmieng+$diem15p+$diem1tiet*2+$diemhk*3)/7;
    }
    public function classify($diemtk){
        if($diemtk>=8)
            return "Giỏi";
        else if($diemtk>=6.5 AND $diemtk<8)
            return "Khá";
        else if($diemtk ==0)
            return "Chưa xếp loại";
        else
            return "Trung Bình";
    }
    public function countbd($mahs,$mahk,$namhoc){
        $sql = "SELECT COUNT(*) AS count FROM bangdiem WHERE mahs = '$mahs' AND mahk = '$mahk' AND namhoc = '$namhoc'";
        $result = $this->db->selectOne($sql);
        return $result;
    }
    public function preprocessorAVE(){
        $listbd = $this->db->selectALot("SELECT * FROM bangdiem");
        foreach($listbd as $value){
            $diemtb = $this->calculateAVE($value['diemmieng'],$value['diem15p'],$value['diem1tiet'],$value['diemhk']);
            $mahs = $value['mahs'];
            $mamh = $value['mamh'];
            $this->db->update("UPDATE bangdiem SET diemtb = '$diemtb' WHERE mahs = '$mahs' AND mamh = '$mamh'");
        }
    }
    public function preprocessorGPA(){
        $listbd = $this->db->selectALot("SELECT mahs,mahk,namhoc FROM bangdiem GROUP BY mahs");
        foreach($listbd as $value){
            $mahs = $value['mahs'];
            $mahk = $value['mahk'];
            $namhoc = $value['namhoc'];
            if($this->countbd($mahs,$mahk,$namhoc)[0] == 10){
                $sql1 = "SELECT AVG(bd.diemtb) FROM hocsinh AS hs, bangdiem AS bd WHERE hs.mahs = bd.mahs AND hs.mahs = '$mahs' AND bd.mahk = '$mahk' AND bd.namhoc = '$namhoc'";
                $diemtk = $this->db->selectOne($sql1)[0];
            }
            else
                $diemtk = 0;
            $xeploai = $this->classify($diemtk);
            if($this->db->selectOne("SELECT COUNT(*) FROM tongket WHERE mahs = '$mahs' AND mahk = '$mahk' AND namhoc = '$namhoc'")[0]==0){
                $sql = "INSERT INTO tongket(mahs,namhoc,mahk,diemtk,xeploai) VALUES('$mahs','$namhoc','$mahk','$diemtk','$xeploai')";
                $this->db->insert($sql);
            }
            else{
                $sql = "UPDATE tongket SET diemtk = '$diemtk',xeploai = '$xeploai' WHERE mahk = '$mahk' AND mahs = '$mahs' AND namhoc = '$namhoc'";
                $this->db->update($sql);
            }
        }
    }
    public function getClassMark(){
        $sql = "SELECT * FROM hocsinh AS hs,lop AS l,tongket AS tk, bangdiem AS bd WHERE hs.mahs = tk.mahs AND l.malop = hs.malop AND hs.mahs = bd.mahs GROUP BY l.malop ORDER BY l.malop ASC";
        $result = $this->db->selectALot($sql);
        return $result;
    }
    public function countClassify($malop,$mahk,$xeploai){
        $sql = "SELECT COUNT(*) AS count FROM hocsinh AS hs,lop AS l,tongket AS tk WHERE l.malop='$malop' AND l.malop = hs.malop AND tk.mahk = '$mahk' AND tk.xeploai = '$xeploai' AND hs.mahs = tk.mahs";
        $result = $this->db->selectOne($sql);
        return $result;
    }
    public function searchClassMark($search){
        $sql = "SELECT * FROM hocsinh AS hs,lop AS l,tongket AS tk, bangdiem AS bd WHERE hs.mahs = tk.mahs AND l.malop = hs.malop AND hs.mahs = bd.mahs AND (l.malop REGEXP '$search') GROUP BY l.malop ORDER BY l.malop ASC";
        $result = $this->db->selectALot($sql);
        return $result;
    }
    public function filterClassMark($makhoi,$mahk,$namhoc){
        $sql = "SELECT * FROM hocsinh AS hs,lop AS l,tongket AS tk, bangdiem AS bd WHERE hs.mahs = tk.mahs AND l.malop = hs.malop AND hs.mahs = bd.mahs AND l.makhoi = '$makhoi' AND bd.namhoc = '$namhoc' AND bd.mahk = '$mahk' GROUP BY l.malop ORDER BY l.malop ASC";
        $result = $this->db->selectALot($sql);
        return $result;
    }
    public function getDetailClassMark($malop,$mahk,$namhoc){
        $sql = "SELECT * FROM hocsinh AS hs,lop AS l,tongket AS tk, bangdiem AS bd WHERE hs.mahs = tk.mahs AND l.malop = hs.malop AND hs.malop = '$malop' AND bd.mahk = '$mahk' AND hs.mahs = bd.mahs AND bd.namhoc = '$namhoc' GROUP BY hs.mahs ORDER BY hs.ten ASC";
        $result = $this->db->selectALot($sql);
        return $result;
    }
    public function filterDetailClassMark($malop,$mahk,$xeploai,$namhoc){
        $sql = "SELECT * FROM hocsinh AS hs,lop AS l,tongket AS tk, bangdiem AS bd WHERE tk.xeploai = '$xeploai' AND (bd.mahs = hs.mahs AND hs.malop = l.malop AND hs.mahs = tk.mahs AND l.malop = '$malop' AND tk.mahk = '$mahk' AND bd.namhoc = '$namhoc') ORDER BY hs.ten ASC";
        $result = $this->db->selectALot($sql);
        return $result;
    }
    public function searchDetailClassMark($malop,$mahk,$namhoc,$search){
        $sql = "SELECT * FROM hocsinh AS hs,lop AS l,tongket AS tk, bangdiem AS bd WHERE (hs.hotendem REGEXP '$search' OR hs.ten REGEXP '$search') AND (bd.mahs = hs.mahs AND bd.namhoc = '$namhoc' AND hs.malop = l.malop AND hs.mahs = tk.mahs AND l.malop = '$malop' AND tk.mahk = '$mahk') ORDER BY hs.ten ASC";
        $result = $this->db->selectALot($sql);
        return $result;
    }
    public function getInfoMark($mahs,$mahk){
        $sql = "SELECT * FROM hocsinh AS hs,bangdiem AS bd,monhoc AS mh WHERE mh.mamh = bd.mamh AND hs.mahs = bd.mahs AND hs.mahs = '$mahs' AND bd.mahk = '$mahk'";
        $result = $this->db->selectALot($sql);
        return $result;
    }
    public function getSummary($mahs,$mahk){
        $sql = "SELECT * FROM hocsinh AS hs,tongket AS tk WHERE hs.mahs = tk.mahs AND tk.mahk = '$mahk' AND hs.mahs = '$mahs'";
        $result = $this->db->selectOne($sql);
        return $result;
    }
    public function getSingleMark($mamh,$mahs,$mahk,$namhoc){
        $sql = "SELECT * FROM hocsinh AS hs, bangdiem AS bd, monhoc AS mh WHERE mh.mamh = bd.mamh AND hs.mahs = bd.mahs AND bd.mahs = '$mahs' AND bd.mahk = '$mahk' AND bd.mamh = '$mamh' AND bd.namhoc";
        $result = $this->db->selectOne($sql);
        return $result;
    }
    public function insertMark($mamh,$mahs,$namhoc,$mahk,$magv,$diemmieng,$diem15p,$diem1tiet,$diemhk){
        $sql = "INSERT INTO bangdiem(mamh,mahs,namhoc,mahk,magv,diemmieng,diem15p,diem1tiet,diemhk) VALUES('$mamh','$mahs','$namhoc','$mahk','$magv','$diemmieng','$diem15p','$diem1tiet','$diemhk')";
        $result = $this->db->insert($sql);
        return $result;
    }
    public function updateMark($mamh,$mahs,$namhoc,$mahk,$magv,$diemmieng,$diem15p,$diem1tiet,$diemhk){
        $sql = "UPDATE bangdiem SET magv = $magv, diemmieng = $diemmieng,diem15p = $diem15p,diem1tiet=$diem1tiet,diemhk=$diemhk WHERE mahs ='$mahs' AND mamh='$mamh' AND mahk = '$mahk' AND namhoc = '$namhoc'";
        $result = $this->db->update($sql);
        return $result;
    }
    public function deleteMark($mamh,$mahs,$mahk,$namhoc){
        $sql = "DELETE FROM bangdiem WHERE mahs = '$mahs' AND mamh='$mamh' AND mahk = '$mahk' AND namhoc = '$namhoc'";
        $result = $this->db->delete($sql);
        return $result;
    }
    public function checkExist($mahs,$namhoc,$mahk,$mamh){
        $sql = "SELECT * FROM bangdiem WHERE mahs = '$mahs' AND mahk = '$mahk' AND mamh = '$mamh' AND namhoc = '$namhoc'";
        $result = $this->db->selectALot($sql);
        return $result;
    }
    public function authentication($magv,$malop,$mamh){
        $sql1 = "SELECT * FROM monphutrach AS mpt, giaovien AS gv WHERE mpt.magv ='$magv' AND mpt.malop = '$malop' AND gv.magv = mpt.magv";
        $list = $this->db->selectOne($sql1);
        if($list['magv']== $magv AND $list['malop']== $malop AND $list['mamh'] == $mamh)
            return TRUE;
        return FALSE;
    }
    public function viewStatistic($makhoi,$namhoc,$mahk){
        $sql = "SELECT tk.xeploai,COUNT(*) FROM tongket AS tk, hocsinh AS hs, lop AS l WHERE l.makhoi = '$makhoi' AND tk.namhoc = '$namhoc' AND tk.mahk = '$mahk' AND tk.mahs = hs.mahs AND hs.malop = l.malop GROUP BY tk.xeploai";
        $result = $this->db->selectAlot($sql);
        return $result;
    }
}   
?>