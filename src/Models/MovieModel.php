<?php

namespace App\Models;

class MovieModel extends GeneralModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllMovies()
    {
        $sql = "SELECT * FROM movies";
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function getOneMovie($id)
    {
        $sql = "SELECT * FROM movies WHERE id = :id";
        $req = $this->pdo->prepare($sql);
        $req->execute([":id" => $id]);
        return $req->fetch();
    }

    public function update($id, $title, $synopsis)
    {
        $sql = "UPDATE movies SET title = :title, synopsis = :synopsis WHERE id = :id";
        $req = $this->pdo->prepare($sql);
        $req->execute([":title" => $title, ":synopsis" => $synopsis, ":id" => $id]);
    }
}