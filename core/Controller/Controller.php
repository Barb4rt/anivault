<?php

namespace Core\Controller;

class Controller
{

    protected $_viewPath;
    protected $_template;

    protected function _render($view, $variables = [])
    {
        ob_start();
        extract($variables);
        require $this->_viewPath . str_replace('.', '/', $view) . '.php';
        $content = ob_get_clean();
        require $this->_viewPath . 'templates/' . $this->_template . '.php';
    }

    protected function _forbidden()
    {
        header('HTTP/1.0 403 Forbidden');
        die('Acces interdit');
    }

    protected function _notFound()
    {
        header('HTTP/1.0 404 Not Found');
        die('Page introuvable');
    }

}
