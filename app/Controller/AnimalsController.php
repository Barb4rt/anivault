<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Trait\GroomersTrait;

class AnimalsController extends AppController
{
    use GroomersTrait;
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Animals');
    }

    public function index()
    {
        $animals = $this->Animals->getAllAnimals();
        $this->_render('animals.index', compact('Animals'));
    }

    public function show()
    {
        $animal = $this->Animals->getOneAnimal($_GET["a_id"]);
        $favoriteGroomer = $this->getRelatedGroomer('s_groomer', 'g_id');
        $favoriteGroomer = $this->Animals->query($favoriteGroomer, [$animal[0]->a_favorite_groomer_fk]);
        $this->_render('animals.show', compact('animal', 'favoriteGroomer'));
    }
}
