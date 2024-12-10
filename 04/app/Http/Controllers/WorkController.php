<?php

namespace App\Http\Controllers;

use App\Factories\CarFactory;

class WorkController extends BaseWebController
{
    private $data;
    public function __construct() {
        $carFactory = new CarFactory();
        $this->data = $carFactory->create();
        $this->templateName = 'car';
    }

    public function view(array $data = null): ?string
    {
        return parent::view($this->data);
    }

}