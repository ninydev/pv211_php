<?php

namespace App\Http\Requests\Interfaces;

interface ValidateRequestInterface
{
    public function validate(bool $die = true) : bool;
}