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
    $Libro = new libro();

    $body=json_decode(file_get_contents("php://input"),true);

    switch ($GET["op"]) {
        case 'Get_libros':
            $datos = $Libro-> Get_libros();
            echo json_encode($datos);
            break;

        case 'Get_libro':
            $datos = $Libro-> Get_libro($body["CodigoDeLibro"]);
            echo json_encode($datos);
            break;
        
        case 'Insert_libro':
            $datos = $Libro-> Insert_libro($body["CodigoDeLibro"],$body["NombreLibro"],$body["NombreEscritor"],$body["FechaPublicacion"],$body["ISBN"],$body["Precio"],$body["Editorial"]);
            echo json_encode($datos);
            break;
    
        case 'Update_libro':
            $datos = $Libro-> Update_libro($body["CodigoDeLibro"],$body["NombreLibro"],$body["NombreEscritor"],$body["FechaPublicacion"],$body["ISBN"],$body["Precio"],$body["Editorial"]);
            echo json_encode($datos);
            break;

        case 'Delete_libro':
            $datos = $Libro-> Delete_libro($body["CodigoDeLibro"]);
            echo json_encode($datos);
            break;
    }