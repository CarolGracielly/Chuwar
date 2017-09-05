<?php

    class DB{

        public function getConnection(){

            $host="127.0.0.1";
            $user="root";
            $pass="";
            $dbname="mysql:host=localhost;dbname=chuwar";

            //Conexão com PDO
            $con = new PDO($dbname, $user, $pass);
            return $con;
            
        }

        public function closeConnectionLogin(&$con,&$rs){

            $con=null;
            $rs=null;
        }

        public function closeConnection(&$con,&$rs,&$stmt){

            $con=null;
            $rs=null;
            $stmt=null;
        }
    }

?>
