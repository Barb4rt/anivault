<?php

namespace Core\Auth;

use Core\Database\Database;

class DBAuth {
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getUserId()
    {
        if($this->logged()){
            return $_SESSION['auth'];
        }
        return false;
    }

    public function login($mail, $password)
    {
        $user = $this->db->prepare('SELECT * FROM s_groomer WHERE g_mail = ?', [$mail], null, true);
        var_dump(sha1($password));
        if ($user) {
            if ($user->password === sha1($password)) {
                $_SESSION['auth'] = $user->id;
                return true;
            }
        }
        return false;
    }

    public function logged()
    {
        return isset($_SESSION['auth']);
    }
}