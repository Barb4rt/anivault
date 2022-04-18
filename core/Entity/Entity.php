<?php

namespace Core\Entity;

class Entity
{
    public function __construct($key)
    {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

}
