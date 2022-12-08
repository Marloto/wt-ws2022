<?php
require("start.php");

$user1 = new Model\User("Ich");
var_dump($user1);
echo "<hr>";
$user1String = json_encode($user1);
var_dump($user1String);
echo "<hr>";
$user2 = json_decode($user1String);
var_dump($user2);

echo "<hr>";
$user3 = Model\User::fromJson($user2);
var_dump($user3);

echo "<hr>";
try {
    $response = Utils\HttpClient::get("https://online-lectures-cs.thi.de/chat/test.json");
    var_dump($response);
} catch(\Exception $e) {
    var_dump($e);
}
echo "<hr>";
$result = $service->test();
var_dump($result);
echo "<hr>";
// $result = $service->register("Ich", "b30c9d9c");
// var_dump($result);
echo "<hr>";
$result = $service->login("Tom", "b30c9d9c");
var_dump($result);
echo "<hr>";
$result = $service->loadUser("Ich");
var_dump($result);
echo "<hr>";
$service->listUser();

// -> {"msg": "Test", "from": "Jemanden"}
// -> Kapitel 5, JSON
// -> json_encode / json_decode

?>