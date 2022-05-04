<?php

namespace App\Controller;

use App\Controller\AppController;

class SheltersController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Shelters');
        $this->loadModel('Groomers');
        $this->loadModel('Enclosures');
    }

    public function index()
    {
        $shelters = $this->Shelters->getAllShelters();
        $this->_render('shelters.index', compact('shelters'));
    }

    public function show()
    {
        $shelter = $this->Shelters->getOneShelter($_GET["s_id"]);
        $enclosures = $this->Enclosures->getRelatedEnclosures($_GET["s_id"]);
        $groomers = $this->Groomers->getAllGroomers('g_shelter_fk', $_GET["s_id"]);
        $this->_render('shelters.show', compact('shelter', 'enclosures', 'groomers'));
    }
}
