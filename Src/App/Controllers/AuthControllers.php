<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\ValidatorService;




class AuthControllers

{
    public function __construct(
        private TemplateEngine $view,
        private ValidatorService $validator

    ) {
    }


    public function registerView()
    {
        echo $this->view->render('regiter.php');
    }

    public function register()
    {
        dd($_POST);
    }
}
