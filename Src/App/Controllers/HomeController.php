<?php

declare(strict_types=1);

namespace App\Controllers;


use Framework\TemplateEngine;
use App\config\paths;



class HomeController
{
    private TemplateEngine $view;

    public function __construct()
    {
        $this->view = new TemplateEngine(paths::VIEW);
    }

    public function index()
    {
        $this->view->render(
            '/index.php',
            [
                'title' => 'Home pages',
                'content' => 'Welcome to the home page'
            ]
        );
        //title home page

    }
}
