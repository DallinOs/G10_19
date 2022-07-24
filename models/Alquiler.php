<?php
    class Alquiler extends Conectar{
        public function get_Alquiler(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM Alquiler";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_Alquilers($CodigoDeLibro){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM Alquiler WHERE CodigoDeLibro=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$CodigoDeLibro);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_alquiler($CodigoDeLibro,$NombreLibro,$FechaAlqui,$NombreCliente,$Direccion,$DiasAlqui,$PrecioAlqui){
            $conectar= parent:: conexion();
            parent::set_names();
            $sql="INSERT INTO Alquiler (CodigoDeLibro,NombreLibro,FechaAlqui,NombreCliente,Direccion,DiasAlqui,PrecioAlqui)
            VALUES (?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$CodigoDeLibro);
            $sql->bindValue(2,$NombreLibro);
            $sql->bindValue(3,$FechaAlqui);
            $sql->bindValue(4,$NombreCliente);
            $sql->bindValue(5,$Direccion);
            $sql->bindValue(6,$DiasAlqui);
            $sql->bindValue(7,$PrecioAlqui);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_Alquiler($CodigoDeLibro,$NombreLibro,$FechaAlqui,$NombreCliente,$Direccion,$DiasAlqui,$PrecioAlqui){
            $conectar= parent:: conexion();
            parent::set_names();
            $sql="UPDATE Alquiler set CodigoDeLibro=?, NombreLibro=?, FechaAlqui=?, NombreCliente=?, Direccion=?, DiasAlqui=?, PrecioAlqui=? WHERE CodigoDeLibro=$CodigoDeLibro";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$CodigoDeLibro);
            $sql->bindValue(2,$NombreLibro);
            $sql->bindValue(3,$FechaAlqui);
            $sql->bindValue(4,$NombreCliente);
            $sql->bindValue(5,$Direccion);
            $sql->bindValue(6,$DiasAlqui);
            $sql->bindValue(7,$PrecioAlqui);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_Alquiler($CodigoDeLibro){
            $conectar= parent:: conexion();
            parent::set_names();
            $sql="DELETE FROM Alquiler  WHERE CodigoDeLibro=?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$CodigoDeLibro);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>