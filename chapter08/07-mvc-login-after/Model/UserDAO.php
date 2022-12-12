<?php
namespace Model;
class UserDAO {
    private $users;
    public function __construct() {
        $this->users = array();
    }
    public function findByUsername($username) {
        if(isset($this->users[$username]))
            return $this->users[$username];
        return null;
    }

    public function insertUser($username, $password) {
        $user = new User($username, $password);
        $this->users[$username] = $user;
        return $user;
    }
}
?>