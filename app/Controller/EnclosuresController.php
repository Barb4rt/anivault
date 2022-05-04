<?php

namespace App\Controller;

class EnclosuresController extends AppController
{
    protected $_idKey = 's_id';

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Shelters');
    }

    public function index()
    {
        $enclosures = $this->Shelters->getEnclosures();
        $this->_render('shelters.index', compact('shelters'));
    }
}
