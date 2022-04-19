<?php

namespace App\Controller;

use Core\Controller\Controller;

class HomeController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('shelter');
    }


}
