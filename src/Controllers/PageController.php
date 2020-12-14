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

        $template = $this->twig->load('index.html.twig');
        echo $template->render(["movies" => $movies]);
    }

    public function showMovie($id)
    {
        $movieModel = new MovieModel();
        $movie = $movieModel->getOneMovie($id);

        $template = $this->twig->load('showMovie.html.twig');
        echo $template->render(["movie" => $movie]);
    }
}