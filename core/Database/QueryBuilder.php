<?php

namespace Core\Database;

class QueryBuilder
{

    private $fields = [];
    private $conditions = [];
    private $from = [];
    private $join = [];

    public function select()
    {
        $this->fields = func_get_args();
        return $this;
    }

    public function where()
    {
        foreach (func_get_args() as $arg) {
            $this->conditions[] = $arg;
        }

        return $this;
    }

    public function from($table, $alias = null)
    {
        if (is_null($alias)) {
            $this->from[] = $table;
        } else {
            $this->from[] = "$table AS $alias";
        }

        return $this;
    }

    public function join($currentTable, $currentField, $targetTable, $targetField)
    {
        $this->join[] = "INNER JOIN $targetTable ON $currentTable.$currentField = $targetTable.$targetField ";

        return $this;
    }
    public function __toString()
    {

        if (empty($this->conditions) && empty($this->join)) {
            return 'SELECT ' . implode(', ', $this->fields) . ' FROM ' . implode(', ', $this->from);
        }
        if (empty($this->conditions)) {
            return 'SELECT ' . implode(', ', $this->fields) . ' FROM ' . implode(', ', $this->from) . " " . implode(' ', $this->join);
        }
        return 'SELECT ' . implode(', ', $this->fields) . ' FROM ' . implode(', ', $this->from) . " " . implode(' ', $this->join) . ' WHERE ' . implode(' AND ', $this->conditions);
    }
}
