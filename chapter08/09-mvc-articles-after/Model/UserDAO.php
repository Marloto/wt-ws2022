<?php
namespace Model;
class UserDAO {
    private $users = array();
    
    public function insertUser($username, $password) {
        $user = new User($username, $password);
        $this->users[$username] = $user;
        return $user;
    }

    public function findByUsername($username) {
        if(!isset($this->users[$username])) {
            return null;
        }
        return $this->users[$username];
    }
}
?>