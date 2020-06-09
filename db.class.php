<?php 

    class Db{
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "mega_menu";
        private $conn;

        public function __construct(){
            try {
                $this->conn = new PDO("mysql:host=".$this->servername.";dbname=".$this->dbname, $this->username, $this->password);

                $this->conn->setAttribute(
                    PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION
                );
            } catch (PDOException $e) {
                echo "Connection Failed :" .$e->getMessage();
            }
        }


        public function query($query){
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }