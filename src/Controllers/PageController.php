<?php

namespace App\Controllers;

use App\Models\MovieModel;

class PageController extends GeneralController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $movieModel = new MovieModel();
        $movies = $movieModel->getAllMovies();

        $template = $this->twig->load('Page/index.html.twig');
        echo $template->render(["movies" => $movies]);
    }

    public function hello($name)
    {
        $template = $this->twig->load('Page/hello.html.twig');
        echo $template->render(['name' => $name]);
    }

    public function error404()
    {
        $template = $this->twig->load('Page/error404.html.twig');
        echo $template->render();
    }
}