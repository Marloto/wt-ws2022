<?php
namespace Model; // Vollqualifizierter Name: Model\User
use JsonSerializable; // vgl. import
class User implements JsonSerializable {
    private $username;
    private $description;
    // ...
    public function __construct($username = null) {
        $this->username = $username;
        $this->description = "Blupp";
    }

    public function getUsername() {
        return $this->username;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

    public static function fromJson($data) {
        $user = new User();
        //$user->username = $data->username;
        foreach($data as $key => $value) {
            // vgl. $user->username = $value;
            $user->{$key} = $value;
        }
        return $user;
    }
}
?>