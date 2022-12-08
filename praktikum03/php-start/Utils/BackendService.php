<?php
// Utils/BackendService.php
namespace Utils;

use Model\User;
// https://online-lectures-cs.thi.de/chat/full/db15d4b1-8053-4838-b1b9-26db50341c9e

class BackendService {
    private $baseUrl;
    private $collectionId;
    public function __construct($baseUrl, $collectionId) {
        $this->baseUrl = $baseUrl;
        $this->collectionId = $collectionId;
    }
    public function test() {
        try {
            $result = HttpClient::get($this->baseUrl . "/test.json");
            return $result;
        } catch(\Exception $e) {
            error_log($e);
            return false;
        }
    }
    public function isAuthentificated() {
        return isset($_SESSION["chat_token"]) && !empty($_SESSION["chat_token"]);
    }
    // https://online-lectures-cs.thi.de/chat/full
    public function login($username, $password) {
        try {
            $data = array("username" => $username, "password" => $password);
            $result = HttpClient::post($this->baseUrl . "/" . $this->collectionId . "/login", 
                $data);
            $_SESSION["chat_token"] = $result->token;
            // echo "Token: " . $result->token;
            // -> input-hidden, uri-rewrite, cookies
            // -> "session" in PHP
            return true;
        } catch(\Exception $e) {
            // echo "Authentification failed";
            return false;
        }
    }
    public function register($username, $password) {
        try {
            $data = array("username" => $username, "password" => $password);
            $result = HttpClient::post($this->baseUrl . "/" . $this->collectionId . "/register", 
                $data);
            $_SESSION["chat_token"] = $result->token;
            return true;
        } catch(\Exception $e) {
            // echo "Authentification failed";
            return false;
        }
    }

    public function loadUser($username) {
        try {
            $data = HttpClient::get($this->baseUrl . "/" . $this->collectionId . "/user/" . $username,
            $_SESSION["chat_token"]);
            $user = User::fromJson($data);
            return $user;
        } catch(\Exception $e) {
            return false;
        }
    }
}
?>