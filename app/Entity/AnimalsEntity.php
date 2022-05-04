<?php

namespace App\Entity;

use Core\Entity\Entity;

class AnimalsEntity extends Entity
{
    protected $_idKey = 'a_id';

    public function getUrl()
    {
        return 'index.php?page=animals.show&' . $this->_idKey . '=' . $this->s_id;
    }

    public function getFamily()
    {
        return substr($this->a_specie, 0, 7);
    }
    public function getSpecie()
    {
        return substr($this->a_specie, 8);
    }
    public function getGroomersUrl()
    {
        return 'index.php?page=groomers.show&g_id=' . $this->a_favorite_groomer_fk;
    }
}
