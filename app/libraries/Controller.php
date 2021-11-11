<?php

class Controller
{
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = [])
    {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die('View does not exist');
        }
    }

    public function error()
    {
        $data = [
            'title' => 'Hiba',
            'description' => 'Ilyen oldal nem található'
        ];

        $this->view('pages/404', $data);
    }
}