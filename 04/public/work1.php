<?php
require_once '../vendor/autoload.php';

use App\Http\Controllers\WorkController;
use App\Http\Requests\BaseRequest;
use App\Http\Sessions\BaseSession;


$request = new BaseRequest();
$controller = new WorkController();
$html = $controller->view();

echo $html;



//$session = BaseSession::getInstance();
//$userName = $session->get('userName', 'Guest');
//echo $userName;

