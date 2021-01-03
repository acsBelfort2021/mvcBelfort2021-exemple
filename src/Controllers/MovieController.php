<?php

namespace App\Controllers;

use App\Models\MovieModel;

class MovieController extends GeneralController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function editMovie($id)
    {
        $movieModel = new MovieModel();
        if(empty($_POST)){
            $movie = $movieModel->getOneMovie($id);
            $template = $this->twig->load('editMovie.html.twig');
            echo $template->render(["movie" => $movie]);
        } else {
            $movieModel->update($id, $_POST['title'], $_POST['synopsis']);
            $movie = $movieModel->getOneMovie($id);
            
            header("Location: {$this->baseUrl}");
        }
    }

    public function showMovie($id)
    {
        $movieModel = new MovieModel();
        $movie = $movieModel->getOneMovie($id);

        $template = $this->twig->load('showMovie.html.twig');
        echo $template->render(["movie" => $movie]);
    }
}