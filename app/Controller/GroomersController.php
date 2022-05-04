<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Trait\AnimalsTrait;

class GroomersController extends AppController
{
    use AnimalsTrait;

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Groomers');
        $this->loadModel('Animals');
    }

    public function index()
    {
        $groomers = $this->Groomers->getAllGroomers();
        $this->_render('groomers.index', compact('groomers'));
    }

    public function show()
    {

        $groomer = $this->Groomers->getOneGroomer($_GET["g_id"]);
        $superior = is_null($groomer[0]->g_fk_superior_id) ? null : $this->Groomers->getSuperior($groomer[0]->g_fk_superior_id);
        $animals = $this->Animals->getAllAnimals('j_groomer_animal', 'j_groomer_animal', 'ga_groomer_fk');
        $animals = $this->Groomers->query($animals, [$_GET["g_id"]]);
        $this->_render('groomers.show', compact('groomer', 'superior', 'animals'));
    }
}
