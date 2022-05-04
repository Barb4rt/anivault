<?php

namespace App\Trait;

use Core\Database\QueryBuilder;


/**
 * 
 */
trait AnimalsTrait
{
    public function getRelatedAnimal($targetTable, $fk)
    {
        $query = new QueryBuilder;
        $query->select(
            'a_id',
            'a_name',
            'a_description',
            'a_picture'
        )
            ->from($targetTable)
            ->join(
                $targetTable,
                $fk,
                's_animal',
                'a_id'
            )->where($targetTable . '.' . $fk . '=?');
        return $query;
    }
}
