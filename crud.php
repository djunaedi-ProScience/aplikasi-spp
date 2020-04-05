<?php
class Crud{
    public $con;
    public function __construct($koneksi)
    {
        $this->con = $koneksi;
    }

    public function tampilAll($sql)
    {
        $a = $sql;
        $rows = $this->con->query($a);
        $row = array();
        while($data = $rows->fetch_assoc())
        {
            $row[] = $data;
        }
        return $row;
    }

    public function insert($table,$array)
    {
        $rows = null;
        $sql = "INSERT INTO $table";
        $a = null;
        $b = null;
        foreach ($array as $key => $value) {
            $a .= ",$key";
            $b .= ",'$value'";
        }
         $sql .= "( ". substr($a,1) . ")";
         $sql.= " VALUES (" . substr($b,1) . ")";
         return  $this->con->query($sql);
        
    }

    public static function set_flashdata($a,$b){
        $_SESSION['validasi'] = array($a,$b);
    }

    public  static function flashdata()
    {
        if (isset($_SESSION['validasi'])) {
            echo "<button class='btn mb-3  btn-block btn-" . $_SESSION["validasi"]['0'] . "'> " . $_SESSION['validasi'][1] ."  </button>";
            unset($_SESSION['validasi']);
            
        }
    }


    public function hapus($table,$id_table,$id_value)
    {
        $sql = "DELETE FROM $table WHERE $id_table=$id_value";
        return $this->con->query($sql);
        
    }

    public function update($table, $data,$id)
    {
        $sql = "UPDATE $table SET";
        $key = null;
        foreach ($data as $a => $b) {
            $key .= ", $a='$b'";
           
        }
          $sql .= substr($key,1) . " " . $value;
          $sql .= "WHERE $id";
          return $this->con->query($sql);
    }

}

?>