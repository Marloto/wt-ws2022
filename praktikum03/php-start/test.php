<?php
// Klassen in PHP
// Auslagern von Funktionalität
// HTTP-Calls in PHP erzeugen
// -> diese in einer Klasse "verstecken"
require("start.php");
?>

<?php
$user1 = new Model\User("Ich");
// $user2 = new User();
var_dump($user1);
echo "<hr>";

$user1String = json_encode($user1);
var_dump($user1String);
echo "<hr>";

$data = json_decode($user1String);
$user2 = Model\User::fromJson($data);
var_dump($user2);
var_dump($user2->getUsername());
echo "<hr>";

// Download Utils.zip
$result = $service->test();
var_dump($result);

echo "<hr>";
// if($service->login("Tom", "b30c9d9c")) {
//     echo "Klappt!";
//     // vgl. header("Location: ...");
// }
//var_dump($service->isAuthentificated());

var_dump($service->register("Ich2", "b30c9d9c"));

echo "<hr>";
$user3 = $service->loadUser("Tom");
var_dump($user3);

// Welches Format wurde für den Datenaustausch genutzt? mittels HTTP wird es versendet
// -> {"username": "Ich"}
// -> JSON
// -> json_encode / json_decode
?>