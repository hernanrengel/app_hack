<?php
/*
 * TODO: Actualizar la version de php del servidor a 5.4
 * */

header('Content-Type: application/json');

// For 4.3.0 <= PHP <= 5.4.0
if (!function_exists('http_response_code'))
{
    function http_response_code($newcode = NULL)
    {
        static $code = 200;
        if($newcode !== NULL)
        {
            header('X-PHP-Response-Code: '.$newcode, true, $newcode);
            if(!headers_sent())
                $code = $newcode;
        }
        return $code;
    }
}

require_once 'controller.php';

$controller = new Controller();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if($_GET['slug']){
            $controller->get($_GET['slug']);
        } else {
            $controller->get("");
        }
        break;

    case 'POST':
        $controller->post();
        break;

    default:
        http_response_code(404);
    break;
}

