<?php
 
 class Database
 {
     private $servername = "localhost";
     private $username = "root";
     private $password = "";
     private $dbname = "scandiweb_test";
     private $conn;


     public function __construct()
     {
         $this->conn = mysqli_connect($this->servername,$this->username,$this->password,$this->dbname);
         if(!$this->conn)
         {
             die("Erorr Connect : " . mysqli_connect_error());
         }
     }
     
     public function insert($sql)
     {
         if(mysqli_query($this->conn,$sql))
         {
             return 'saved successfully';
         } 
         else 
         {
             die("Erorr : " . mysqli_error($this->conn));
         }
     }

     public function read($table)
     {
         $sql = "SELECT * FROM $table";
         $result = mysqli_query($this->conn,$sql);
         $data = [];

         if($result)
         {
             if(mysqli_num_rows($result))
             {
                 while($row = mysqli_fetch_assoc($result))
                 {
                     $data[] = $row;
                 }
             }
             return $data;
         }
         else 
         {
             die("Erorr :" . mysqli_error($this->conn));
         }
     }

     public function massDelete($table, $wherein)
     {
        $sql = "DELETE FROM $table WHERE id IN($wherein)";
        $result = mysqli_query($this->conn,$sql);
        if($result)
        {
            
        }
        else
        {
            die("Erorr :" . mysqli_error($this->conn));
        }
     }
     
     public function findsku($table, $sku)
     {
         $sql = "SELECT * FROM $table WHERE sku='$sku' ";
         $result = mysqli_query($this->conn, $sql);

         if($result)
         {
             if(mysqli_num_rows($result))
             {
                 return mysqli_fetch_assoc($result);
             }
             return false;
         }
         else
         {
             die("Error :" . mysqli_error($this->conn));
         }
     }
}