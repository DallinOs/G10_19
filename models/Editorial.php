<?php
    public function get_Editorial(){     
        $conectar= parent::conexion();            
        parent::set_names();         
        $sql="SELECT * FROM Editorial";           
        $sql=$conectar->prepare($sql);          
        $sql->execute();           
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);      
    }

    public function get_Editorial($NumeroEditorial){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM Editorial WHERE 
        NumeroEditorial=?";
        $sql=$conectar->prepare($sql);
        $sql->binValue(1,$NumeroEditorial);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_Editorial($NumeroEditorial,$NombreEditorial,$Direccion,$Pais,$FechaDeFundacion,$CantidadDeLibrosImpresos,$NumeroDeTelefono){
        $conectar= parent:: conexion();
        parent::set_names();
        $sql="INSERT INTO Editorial (NumeroEditorial,NombreEditorial,Direccion,Pais,FechaDeFundacion,CantidadDeLibrosImpresos,NumeroDeTelefono)
        VALUES (?,?,?,?,?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$NumeroEditorial);
        $sql->bindValue(2,$NombreEditorial);
        $sql->bindValue(3,$Direccion);
        $sql->bindValue(4,$Pais);
        $sql->bindValue(5,$FechaDeFundacion);
        $sql->bindValue(6,$CantidadDeLibrosImpresos);
        $sql->bindValue(7,$NumeroDeTelefono);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function update_Editorial($NumeroEditorial,$NombreEditorial,$Direccion,$Pais,$FechaDeFundacion,$CantidadDeLibrosImpresos,$NumeroDeTelefono){   
        $conectar= parent:: conexion();        
        parent::set_names();         
        $sql="UPDATE Editorial set NumeroEditorial=$NumeroEditorial, NombreEditorial=$NombreEditorial, Direccion=$Direccion, Pais=$Pais, FechaDeFundacion=$FechaDeFundacion, CantidadDeLibrosImpresos=$CantidadDeLibrosImpresos, NumeroDeTelefono=$NumeroDeTelefono WHERE NumeroEditorial=$NumeroEditorial ;";         
        $sql=$conectar->prepare($sql);         
        $sql->bindValue(1,$NumeroEditorial);        
        $sql->bindValue(2,$NombreEditorial);        
        $sql->bindValue(3,$Direccion);           
        $sql->bindValue(4,$Pais);           
        $sql->bindValue(5,$FechaDeFundacion);         
        $sql->bindValue(6,$CantidadDeLibrosImpresos);           
        $sql->bindValue(7,$NumeroDeTelefono);   
        $sql->execute();       
       return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);      
    }

    public function delete_Editorial($NumeroEditorial){
          
        $conectar= parent:: conexion();      
        parent::set_names();      
        $sql="DELETE FROM Editorial  WHERE 
        NumeroEditorial= $NumeroEditorial ;";       
        $sql=$conectar->prepare($sql);       
        $sql->bindValue(1,$NumeroEditorial);   
        $sql->execute();   
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


?>