<?php
require_once '../vendor/autoload.php';

use App\Facades\Log;
use App\Http\Controllers\WorkController;
use App\Http\Requests\BaseRequest;
use App\Http\Sessions\BaseSession;



$request = new BaseRequest();
$controller = new WorkController();
$html = $controller->view();

//$log = new \App\Services\LogService();
//$log->info('Hello World!');

Log::info('Hello World! From Facades');

echo $html;



//$session = BaseSession::getInstance();
//$userName = $session->get('userName', 'Guest');
//echo $userName;

