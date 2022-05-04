<?php

namespace App\Model;

use Core\Database\QueryBuilder;
use Core\Model\Model;

class GroomersModel extends Model
{
    protected $_table = 's_groomer';

    public function getAllGroomers($fkField = null, $fk = null)
    {
        $query = new QueryBuilder;

        if ($fkField && $fk) {
            $query = $query->select(
                'g_id',
                'g_firstname',
                'g_lastname',
                'g_picture',
                's_speciality_choice.sc_name
        AS g_speciality',
                's_shelter.s_name AS g_shelter',
            )
                ->from($this->_table)
                ->join($this->_table, 'g_fk_speciality_id', 's_speciality_choice', 'sc_id')
                ->join($this->_table, 'g_shelter_fk', 's_shelter', 's_id')
                ->where($fkField . '= ?');
            return $this->query($query, [$fk]);
        } else {
            $query = $query->select(
                'g_id',
                'g_firstname',
                'g_lastname',
                'g_picture',
                's_speciality_choice.sc_name
        AS g_speciality',
                's_shelter.s_name AS g_shelter',
            )
                ->from($this->_table)
                ->join($this->_table, 'g_fk_speciality_id', 's_speciality_choice', 'sc_id')
                ->join($this->_table, 'g_shelter_fk', 's_shelter', 's_id');
            return $this->query($query);
        }
    }

    public function getOneGroomer($id)
    {
        $query = new QueryBuilder;
        $query->select(
            'g_firstname',
            'g_lastname',
            'g_date_entry',
            'g_date_exit',
            'g_picture',
            'g_fk_superior_id',
            's_speciality_choice.sc_name
                                AS g_speciality',
            's_shelter.s_name AS g_shelter',
            's_gender_choice.gc_name',

        )
            ->from($this->_table)
            ->join($this->_table, 'g_fk_speciality_id', 's_speciality_choice', 'sc_id')
            ->join($this->_table, 'g_shelter_fk', 's_shelter', 's_id')
            ->join($this->_table, 'g_fk_gender_id ', 's_gender_choice', 'gc_id')
            ->where('g_id= ?');

        return $this->query($query, [$id]);
    }

    public function getSuperior($id)
    {
        $query = new QueryBuilder;
        $query->select(
            'g_id',
            'g_firstname',
            'g_lastname',
            'g_picture'
        )->from($this->_table)
            ->where('g_id=' . $id);

        return $this->query($query);
    }
}
