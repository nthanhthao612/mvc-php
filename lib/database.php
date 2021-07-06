<?php
class Database
{
    public $hostname = 'localhost';
    public $username = 'root';
    public $password = '';
    public $dbname = "ql_diemhocsinh";

    public $conn = null;
    public $result = null;
    // --------------------------------------------------------------------
    // --------------------------------------------------------------------
    // --------------------------------------------------------------------
    // --------------------------------------------------------------------
    public function __construct()
    {
        $this->connect();
    }
    public function connect()
    {
        $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
        if (!$this->conn) {
            exit();
        } else {
            mysqli_set_charset($this->conn, 'utf8');
        }
        return $this->conn;
    }
    public function execute($sql)
    {
        $this->result = $this->conn->query($sql);
        return $this->result;
    }
    public function num_rows()
    {
        if($this->result)
        {
            $num = mysqli_num_rows($this->result);
        }
        else
        {
            $num = 0;
        }
        return $num;
    }
    public function getData()
    {
        if($this->result)
        {
            $data = mysqli_fetch_array($this->result);
        }
        else
        {
            $data = 0;
        }
        return $data;
    }
    public function selectALot($sql)
    {
        $this->execute($sql);
        if($this->num_rows()==0)
        {
            $data = 0;
        }
        else
        {
            while($datas = $this->getData())
            {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function selectOne($sql)
    {
        $this->execute($sql);
        if($this->num_rows()!=0)
        {
            $data = mysqli_fetch_array($this->result);
        }
        else
        {
            $data = 0;
        }
        return $data;
    }
    public function insert($sql)
    {
        return $this->execute($sql);
    }
    public function update($sql)
    {
        return $this->execute($sql);
    }
    public function delete($sql)
    {
        return $this->execute($sql);
    }
}
?>
