<?php

namespace App\Entity;

use Core\Entity\Entity;

class EnclosuresEntity extends Entity
{
    protected $_idKey = 'e_id';

    public function getUrl()
    {
        return 'index.php?page=enclosures.show&' . $this->_idKey .'='. $this->s_id;
    }
}
