<?php

namespace App\Model;

use Core\Model\Model;
use Core\Database\QueryBuilder;

class AnimalsModel extends Model
{
    protected $_table = "s_animal";

    public function getAllAnimals($associatEntity = null,  $fkField = null, $fk = null)
    {
        $query = new QueryBuilder;

        if ($associatEntity) {
            $query = $query->select(
                'a_id',
                'a_name',
                'a_picture',
                's_speciality_choice.sc_name
        AS a_speciality',
                's_shelter.s_name AS a_shelter',
            )
                ->from($associatEntity)
                ->join($this->_table, 'a_speciality_fk', 's_speciality_choice', 'sc_id')
                ->join($this->_table, 'a_fk_shelter_id', 's_shelter', 's_id')
                ->where($fkField . '= ?');
            return $this->query($query, [$fk]);
        }

        if ($fkField && $fk) {
            $query = $query->select(
                'a_id',
                'a_name',
                'a_picture',
                's_speciality_choice.sc_name
        AS a_speciality',
                's_shelter.s_name AS a_shelter',
            )
                ->from($this->_table)
                ->join($this->_table, 'a_speciality_fk', 's_speciality_choice', 'sc_id')
                ->join($this->_table, 'a_fk_shelter_id', 's_shelter', 's_id')
                ->where($fkField . '= ?');
            return $this->query($query, [$fk]);
        }
        $query = $query->select(
            'a_id',
            'a_name',
            'a_picture',
            's_speciality_choice.sc_name
        AS a_speciality',
            's_shelter.s_name AS a_shelter',
        )
            ->from($this->_table)
            ->join($this->_table, 'a_speciality_fk', 's_speciality_choice', 'sc_id')
            ->join($this->_table, 'a_fk_shelter_id', 's_shelter', 's_id');
        return $this->query($query);
    }

    public function getOneAnimal($id)
    {
        $query = new QueryBuilder;
        $query->select(
            'a_id',
            'a_name',
            'a_picture',
            'a_birthdate',
            'a_identification_number',
            'a_weight',
            'a_description',
            'a_available',
            'a_price',
            'a_favorite_groomer_fk',
            's_enclosure.e_reference
        AS a_enclosure',
            's_race_choice.rc_name
        AS a_race',
            's_specie_choice.sc_name
        AS a_specie',
            's_specie_choice.sc_gender
        AS a_gender',
            's_specie_choice.sc_scientific_name
        AS a_scientific_name',
            's_gender_choice.gc_name',

        )
            ->from($this->_table)
            ->join($this->_table, 'a_enclosure_fk', 's_enclosure', 'e_id')
            ->join($this->_table, 'a_specie_fk', 's_specie_choice', 'sc_id')
            ->join($this->_table, 'a_gender_fk ', 's_gender_choice', 'gc_id')
            ->join($this->_table, 'a_race_fk ', 's_race_choice', 'rc_id')
            ->where('a_id= ?');

        return $this->query($query, [$id]);
    }
}
