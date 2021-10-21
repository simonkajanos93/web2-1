<?php

class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            'title' => 'Bemutatkozás',
            'description' => ''
        ];

        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Us',
            'description' => 'App to share posts with other users'
        ];

        $this->view('pages/about', $data);
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