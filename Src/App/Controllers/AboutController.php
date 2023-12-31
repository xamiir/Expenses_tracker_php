<?php

declare(strict_types=1);

namespace App\Controllers;



use Framework\TemplateEngine;
use App\config\paths;


class AboutController
{



    public function __construct(private TemplateEngine $view)
    {
        // $this->view = new TemplateEngine(paths::VIEW);
    }

    public function about()
    {
        echo $this->view->render('About.php', [
            'title' => 'About',
            'description' => 'About page'
        ]);
    }
}
