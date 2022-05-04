<?php

namespace App\Entity;

use Core\Entity\Entity;

class SheltersEntity extends Entity
{
    private $_idKey = 's_id';

    public function getUrl()
    {
        return 'index.php?page=shelters.show&' . $this->_idKey . '=' . $this->s_id;
    }
}
