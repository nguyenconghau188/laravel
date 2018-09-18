<?php 

class DB
{
    private $hostname = 'localhost',
            $username = 'root',
            $password = '',
            $dbname = 'inote';

    public $conn = NULL;
    public $rs = NULL;

    public function connect()
    {
        $this->conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname);
    }

    public function disconnect()
    {
        if ($this->conn) {
            mysqli_close($this->conn);
        }
    }

    public function query($sql = null)
    {
        if ($this->conn) {
            mysqli_query($this->conn, $sql);
        }
    }

    public function num_rows($sql = null)
    {
        if ($this->conn) {
            $query = mysqli_query($this->conn, $sql);
            $row = mysqli_num_rows($query);
            return $row;
        }
    }

    //hàm lấy dữ liệu
    public function fetch_assoc($sql = null, $type)
    {
        if ($this->conn) {
            $query = mysqli_query($this->conn, $sql);
            if ($type == 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $data[] = $row;
                }
                return $data;
            }
            elseif ($type == 1) {
                $data = mysqli_fetch_assoc($query);
                return $data;
            }
        }     
    }

    //hàm xử lý chuỗi dữ liệu truy vấn
    public function real_escap_string($string)
    {
        if ($conn) {
            $string = mysqli_real_escape_string($this->conn, $string);
        }
        else {
            $string = $string;
        }
        return $string;
    }

    //hàm lấy id vừa insert
    public function insert_id()
    {
        if ($this->conn) {
            return mysqli_insert_id($this->conn);
        }
    }
}

 ?>