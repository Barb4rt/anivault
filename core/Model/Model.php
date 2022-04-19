<?php
namespace Core\Model;

use Core\Database\Database;

class Model
{

    protected $_table;
    protected $_db;

    public function __construct(Database $db)
    {
        $this->_db = $db;
        if (is_null($this->_table)) {
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->_table = 's_' . strtolower(str_replace('Model', '', $class_name));
        }
    }

    public function all()
    {
        return $this->query('SELECT * FROM ' . $this->_table);
    }

    public function find($id)
    {
        return $this->query("SELECT * FROM {$this->_table} WHERE id = ?", [$id], true);
    }

    public function update($id, $fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $key => $value){
            $sql_parts[] = "$key = ?";
            $attributes[] = $value;
        }
        $attributes[] = $id;
        $sql_parts = implode(', ', $sql_parts);
        return $this->query("UPDATE {$this->_table} SET $sql_parts WHERE id = ?", $attributes, true);
    }

    public function delete($id)
    {
        return $this->query("DELETE FROM {$this->_table} WHERE id = ?", [$id], true);
        
    }

    public function create($fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $key => $value) {
            $sql_parts[] = "$key = ?";
            $attributes[] = $value;
        }

        $sql_parts = implode(', ', $sql_parts);
        return $this->query("INSERT INTO {$this->_table} SET $sql_parts", $attributes, true);
    }

    public function extract($key, $value)
    {
        $records = $this->all();
        $return = [];
        foreach ($records as $record) {
            $return[$record->$key] = $record->$value;
        }
        return $return;
    }

    public function query($statement, $attributes = null, $one = false)
    {
        if ($attributes) {
            return $this->_db->prepare(
                $statement,
                $attributes,
                str_replace('Model', 'Entity', get_class($this)),
                $one
                );
        } else {
            return $this->_db->query(
                $statement,
                str_replace('Model', 'Entity', get_class($this)),
                $one
            );
        }
    }
}
