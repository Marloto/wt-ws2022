<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <table>
        <tbody>
    <?php
        function generateCell($value) {
            echo "<td>" . ($value) . "</td>";
        }

        function generateRow($i, $maxCols) {
            echo "<tr>";
            for($j = 0; $j < $maxCols; $j ++) {
                generateCell($i * $j);
            }
            echo "</tr>";
        }

        function generateTable($maxRows, $maxCols) {
            for($i = 0; $i < $maxRows; $i ++) {
                generateRow($i, $maxCols);
            }

        }

        generateTable(10, 10);




        
        // Welche Aktion wird vom Nutzer ausgelöst, damit das PHP-Program anfängt zu arbeiten?
        // -> wo können dann ausschließlich Daten für die Verarbeitung eingebettet werden?
        // -> in der HTTP-Anfrage!
        // -> als POST-Payload direkt mit der Anfrage
        // -> im Query-Teil der URL
        // (Magische) Variablen
        // -> $_GET
        // -> $_POST
        // -> arrays!


        // Arrays in Java und JavaScript?
        // - java mit datentyp, in javascript irgendwas in die felder
        // - java: int[] someArr = new int[4];
        // - javascript: var someArr = [];
        // - php: $someArr = array();
        ?>
        </tbody>
    </table>
    <hr>
    <?php
        $someArr = array();
        for($i = 0; $i < 10; $i ++) {
            $someArr[$i] = $i * 10;
        }
        for($i = 0; $i < sizeof($someArr); $i ++) {
            echo $someArr[$i];
        }
    ?>
    <hr>
    <?php

        $someArr2 = array();
        $someArr2["a"] = 1;
        $someArr2["b"] = 2;
        $someArr2["c"] = 3;
        var_dump($someArr2);
        echo "<br>";
        foreach($someArr2 as $key => $value) {
            echo $key . " = " . $value . "<br>";
        }

        $someArr3 = array(1, 2, 3);
        var_dump($someArr3);
        $someArr4 = array("a" => 1, "b" => 2, "c" => 3);
        var_dump($someArr4);
        ?>
        <hr>
        <?php
        var_dump($_GET);
        ?>
</body>
</html>
