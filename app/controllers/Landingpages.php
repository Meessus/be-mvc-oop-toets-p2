<?php

class Landingpages extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            'title' => 'Homepage MVC',
            'sayHello' => 'Hallo Allemaal'
        ];
        $this->view('landingpages/index', $data);
    }
}
