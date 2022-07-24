<?php
   if($_SERVER['REQUEST_METHOD']==='OPTIONS'){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPCIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Allow-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
    }

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Alquiler.php");
    $alquiler = new Alquiler();

    $body=json_decode(file_get_contents("php://input"),true);

    switch($_GET["op"]){
        case "GetAlquiler":
            $datos=$alquiler->get_Alquiler();
            echo json_encode($datos);
        break;

        case "Get_Alquiler":
            $datos=$alquiler->get_Alquilers($body["CodigoDeLibro"]);
            echo json_encode($datos);
        break;

        case "InsertAlquiler":
            $datos=$alquiler->insert_alquiler($body["CodigoDeLibro"],$body["NombreLibro"],$body["FechaAlqui"],$body["NombreCliente"],$body["Direccion"],$body["DiasAlqui"],$body["PrecioAlqui"]);
            echo json_encode("Registro de Alquiler Agregado");
        break;

        case "UpdateAlquiler":
            $datos=$alquiler->update_Alquiler($body["CodigoDeLibro"],$body["NombreLibro"],$body["FechaAlqui"],$body["NombreCliente"],$body["Direccion"],$body["DiasAlqui"],$body["PrecioAlqui"]);
            echo json_encode("Registro de Alquiler Actualizado");
        break;

        case "DeleteAlquiler":
            $datos=$alquiler->delete_alquiler($body["CodigoDeLibro"]);
            echo json_encode("Registro de Alquiler Eliminado");
        break;
    }?>
    