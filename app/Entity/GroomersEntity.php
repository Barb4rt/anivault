<?php

namespace App\Entity;

use App\Model\GroomersModel;
use Core\Entity\Entity;


class GroomersEntity extends Entity
{

    protected $_idKey = 'g_id';

    public function getUrl()
    {
        return 'index.php?page=groomers.show&' . $this->_idKey . '=' . $this->g_id;
    }
}
