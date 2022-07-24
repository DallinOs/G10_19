<?php

    if($_SERVER['REQUEST_METHOD']==='OPTIONS'){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Mehtods: POST,GET,DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age:1728000');
        header('Content-Length:0');
        header('Content-Type: text/plain');
        die();
    }
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Escritor.php");
    $escritor=new Escritor();

    $body=json_decode(file_get_contents("php://input"),true);

    switch($_GET["op"]){
        case"GetEscritor":
            $datos=$escritor->get_escritor();
            echo json_encode($datos);
        break;

        case"GetEscritores":
            $datos=$escritor->get_escritores($body["NumeroEscritor"]);
            echo json_encode($datos);
        break;
        
        case"InsertEscritor":
            $datos=$escritor->insert_escritor($body["NumeroEscritor"],$body["NombreEscritor"],$body["ApellidosEscritor"],$body["FechaNacimiento"],$body["Nacionalidad"],$body["CantidadLibrosEscritos"],$body["Email"]);
            echo json_encode("Escritor agregado con éxito");
        break;

        case"UpdateEscritor":
            $datos=$escritor->update_escritor($body["NumeroEscritor"],$body["NombreEscritor"],$body["ApellidosEscritor"],$body["FechaNacimiento"],$body["Nacionalidad"],$body["CantidadLibrosEscritos"],$body["Email"]);
            echo json_encode("Escritor actualizado con éxito");
           // echo json_encode($datos);

        break;

        case "DeleteEscritor":
            $datos=$escritor->delete_escritor($body["NumeroEscritor"]);
            echo json_encode("Registro de Escritor Eliminado");
        break;
        



    }


?>