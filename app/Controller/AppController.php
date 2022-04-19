<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;

class AppController extends Controller
{
    protected $_template = 'default';

    public function __construct()
    {
        $this->_viewPath = ROOT . '/app/Views/';
    }

    protected function loadModel($model_name)
    {
        $this->$model_name = App::getInstance()->getModel($model_name);
    }
}