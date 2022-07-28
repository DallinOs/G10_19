<?php

    class Libros extends conectar{

        public function get_libros(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM libro;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
       
      

        public function get_libro ($CodigoDeLibro){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM Libro WHERE CodigoDeLibro = ?";
            $sql = $conectar->prepare($sql);
            $sql -> bindValue(1,$CodigoDeLibro);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_libro ($CodigoDeLibro, $NombreLirbro, $NombreEscritor, $FechaPublicacion, $ISBN, $Precio, $Editorial){
            $conectar= parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO Libro(CodigoDeLibro,NombreLibro,NombreEscritor,FechaPublicacion,ISBN,Precio,Editorial) Values (?,?,?,?,?,?,?)";
            $sql = $conectar->prepare($sql);
            $sql -> bindValue(1,$CodigoDeLibro);
            $sql -> bindValue(2,$NombreLirbro);
            $sql -> bindValue(3,$NombreEscritor);
            $sql -> bindValue(4,$FechaPublicacion);
            $sql -> bindValue(5,$ISBN);
            $sql -> bindValue(6,$Precio);
            $sql -> bindValue(7,$Editorial);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_libro ($CodigoDeLibro,$NombreLibro,$NombreEscritor,$FechaPublicacion,$ISBN,$Precio,$Editorial){
            $conectar = parent::conexion();
            parent:: set_names();
            $sql = "UPDATE Libro SET NombreLibro=?,NombreEscritor=?,FechaPublicacion=?,ISBN=?,Precio=?,Editorial=? WHERE CodigoDeLibro=?";
            $sql = $conectar->prepare($sql);
            $sql -> bindValue(1,$NombreLibro);
            $sql -> bindValue(2,$NombreEscritor);
            $sql -> bindValue(3,$FechaPublicacion);
            $sql -> bindValue(4,$ISBN);
            $sql -> bindValue(5,$Precio);
            $sql -> bindValue(6,$Editorial);
            $sql -> bindValue(7,$CodigoDeLibro);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_libro ($CodigoDeLibro){
            $conectar = parent::conexion();
            parent:: set_names();
            $sql = "DELETE FROM Libro WHERE CodigoDeLibro =?";
            $sql = $conectar->prepare($sql);
            $sql -> bindValue(1,$CodigoDeLibro);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>