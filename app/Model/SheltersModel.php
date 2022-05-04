<?php

namespace App\Model;

use Core\Database\QueryBuilder;
use Core\Model\Model;

class SheltersModel extends Model
{
    protected $_table = 's_shelter';

    public function getAllShelters()
    {
        $query = new QueryBuilder;
        $query = $query->select('s_id', 's_name', 's_city')
            ->from($this->_table);
        return $this->query($query);
    }

    public function getOneShelter($id)
    {
        $query = new QueryBuilder;
        $query->select(
            's_name',
            's_adresse',
            's_city',
            's_phone'
        )
            ->from($this->_table)
            ->where('s_id=' . $id);
        return $this->query($query);
    }

    public function getRelatedEnclosures($id)
    {
        $query = new QueryBuilder;
        $query->select(
            'e_reference',
            'e_area',
            's_type_choice.tc_name AS e_type'
        )->from('s_enclosure')
            ->join('s_enclosure', 'e_fk_type', 's_type_choice', 'tc_id')
            ->where('e_fk_shelter_id=?');

        return $this->query($query, [$id]);
    }
}
