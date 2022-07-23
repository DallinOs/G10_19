<?php

    class Escritor extends Conectar{

        public function get_escritor(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM escritor";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_escritores(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM escritor WHERE ID=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$NumeroEscritor);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function insert_escritor($NumeroEscritor,$NombreEscritor,$ApellidosEscritor,$FechaNacimiento,$Nacionalidad,$CantidadLibrosEscritos,$Email){
            $conectar= parent:: conexion();
            parent::set_name();
            $sql="INSERT INTO Escritor (NumeroEscritor,NombreEscritor,ApellidosEscritor,FechaNacimiento,Nacionalidad,CantidadLibrosEscritos,Email)
            VALUES (?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$NumeroEscritor);
            $sql->bindValue(2,$NombreEscritor);
            $sql->bindValue(3,$ApellidosEscritor);
            $sql->bindValue(4,$FechaNacimiento);
            $sql->bindValue(5,$Nacionalidad);
            $sql->bindValue(6,$CantidadLibrosEscritos);
            $sql->bindValue(7,$Email);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_escritor($NumeroEscritor,$NombreEscritor,$ApellidosEscritor,$FechaNacimiento,$Nacionalidad,$CantidadLibrosEscritos,$Email){
            $conectar= parent:: conexion();
            parent::set_name();
            $sql="UPDATE Escritor SET NumeroEscritor=$NumeroEscritor, NombreEscritor=$NombreEscritor, ApellidosEscritor=$ApellidosEscritor, 
                    FechaNacimiento=$FechaNacimiento, Nacionalidad=$Nacionalidad, CantidadLibrosEscritos=$CantidadLibrosEscritos, 
                    Email=$Email WHERE NumeroEscritor=$NumeroEscritor ;";
            
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$NumeroEscritor);
            $sql->bindValue(2,$NombreEscritor);
            $sql->bindValue(3,$ApellidosEscritor);
            $sql->bindValue(4,$FechaNacimiento);
            $sql->bindValue(5,$Nacionalidad);
            $sql->bindValue(6,$CantidadLibrosEscritos);
            $sql->bindValue(7,$Email);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_escritor($NumeroEscritor){
            $conectar= parent:: conexion();
            parent::set_name();
            $sql="DELETE FROM Escritor WHERE NumeroEscritor=$NumeroEscritor ;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$NumeroEscritor);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }


    }

?>