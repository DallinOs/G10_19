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
require_once("../models/Editorial.php");
$editorial = new Editorial();

$body=json_decode(file_get_contents("php://input"),true);

switch($_GET["op"]){
    case "GetEditorial":
        $datos=$editorial->get_Editorial();
        echo json_encode($datos);
    break;

    case "Get_Editorial":
        $datos=$editorial->get_Editoriales($body["NumeroEditorial"]);
        echo json_encode($datos);
    break;

    case "InsertEditorial":
        $datos=$editorial->insert_Editorial($body["NumeroEditorial"],$body["NombreEditorial"],$body["Direccion"],$body["Pais"],$body["FechaDeFundacion"],$body["CantidadDeLibrosImpresos"],$body["NumeroDeTelefono"]);
        echo json_encode("Registro de Editorial Agregado");
    break;

    case "UpdateEditorial":
        $datos=$editorial->update_Editorial($body["NumeroEditorial"],$body["NombreEditorial"],$body["Direccion"],$body["Pais"],$body["FechaDeFundacion"],$body["CantidadDeLibrosImpresos"],$body["NumeroDeTelefono"]);
        echo json_encode("Registro de Editorial Actualizado");
    break;

    case "DeleteEditorial":
        $datos=$editorial->delete_Editorial($body["NumeroEditorial"]);
        echo json_encode("Registro de Editorial Eliminado");
    break;
}  


?>