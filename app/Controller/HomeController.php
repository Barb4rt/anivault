<?php

namespace App\Controller;

class HomeController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Shelter');
    }

    public function index()
    {
        $shelters = $this->Shelter->all();
        $this->_render('shelters.index', compact('shelters'));
    }
}
