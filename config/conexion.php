<?php 
    class Conectar{

        protected $dbh;
        protected funtion Conexion(){
        try {
            $conenctar = $this->dbh = new PDO("mysql: host=20.216.41.245; dbname=g10_19", "G10_19"," r6rQPhUq");
            return $conectar;
        } catch (Exception $e) {
            print "¡Error BD!: " . $e->getMessage() . "<br/>";
            die();
        }
        }

        public function set_names(){
            return $this->dbh->query("SET NAME 'UTF8'");
        }
    }
?>