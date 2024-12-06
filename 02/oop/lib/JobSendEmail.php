<?php
require_once "Queueable.php";

class JobSendEmail
{
    use Queueable;

    public function __construct()
    {
        echo __CLASS__ . 'Created';
    }

}