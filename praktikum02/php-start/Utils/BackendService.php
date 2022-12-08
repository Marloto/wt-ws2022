<?php
namespace Utils;

use Model\User;

class BackendService {
    private $baseUrl;
    private $collectionId;
    public function __construct($baseUrl, $collectionId) {
        $this->baseUrl = $baseUrl;
        $this->collectionId = $collectionId;
    }

    public function test() {
        try {
            $response = HttpClient::get($this->baseUrl . "/test.json");
            return $response;
        } catch(\Exception $e) {
            error_log($e); // optional
            return false;
        }
    }
    
    public function login($username, $password) {
        try {
            $data = array("username" => $username, "password" => $password);
            var_dump($data);
            $result = HttpClient::post($this->baseUrl . "/" . $this->collectionId . "/login", $data);
            $_SESSION["chat_token"] = $result->token;
            return true;
        } catch(\Exception $e) {
            var_dump($e);
            return false;
        }
    }
    
    public function register($username, $password) {
        try {
            $data = array("username" => $username, "password" => $password);
            $result = HttpClient::post($this->baseUrl . "/" . $this->collectionId . "/register", $data);
            $_SESSION["chat_token"] = $result->token;
            return true;
        } catch(\Exception $e) {
            var_dump($e);
            return false;
        }
    }

    public function loadUser($username) {
        try {
            $data = HttpClient::get($this->baseUrl . "/" . $this->collectionId . "/user/" . $username,
            $_SESSION["chat_token"]);
            return User::fromJson($data);
        } catch(\Exception $e) {
            return false;
        }
    }
    public function listUser() {
        try {
            $list = HttpClient::get($this->baseUrl . "/" . $this->collectionId . "/user",
                $_SESSION["chat_token"]);
            var_dump($list);
        } catch(\Exception $e) {
            echo "Error while loading list";
        }
    }

}
?>