<?php

namespace App\Trait;

use Core\Database\QueryBuilder;


/**
 * 
 */
trait GroomersTrait
{
    public function getRelatedGroomer($targetTable, $fk)
    {
        $query = new QueryBuilder;
        $query->select(
            'g_firstname',
            'g_lastname'
        )
            ->from($targetTable)
            ->where($targetTable . '.' . $fk . '=?');
        return $query;
    }
}
