<?php
require_once '../vendor/autoload.php';

use App\Http\Controllers\AvatarController;
use App\Http\Requests\UploadAvatarRequest;



$request = new UploadAvatarRequest();
$controller = new AvatarController();

if ($request->getRequestMethod() == 'POST') {
    // $request->validate();
    $controller->post($request);
} else {
    $controller->get();
}



$html = $controller->view();

echo $html;



