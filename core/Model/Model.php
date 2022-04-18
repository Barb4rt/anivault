<?php
namespace Core\Model;

use Core\Database\Database;

class Model
{

    protected $_table;
    protected $_db;

    public function __construct(Database $db)
    {
        $this->_db = $db;
        if (is_null($this->_table)) {
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->_table = 's_' . strtolower(str_replace('Model', '', $class_name));
        }
    }
}
