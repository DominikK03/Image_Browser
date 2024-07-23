<?php

namespace app\controllers;


use app\Attributes\Request;
use app\Response;

class HomeController
{
    #[Request('/','GET')]
    public function index(): Response
    {
        return Response::make('home-view');
    }

    #[Request('/upload','POST')]
    public function upload(): void
    {

        echo '<pre>';
        var_dump($_FILES);

        var_dump(pathinfo($_FILES['image']['tmp_name']));
        echo '</pre>';

        $filePath = STORAGE_PATH . '/' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $filePath);

        echo '<pre>';
        var_dump(pathinfo($filePath));
        echo '</pre>';

    }
}
