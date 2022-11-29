<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form method="get" action="einmaleins2.php">
        <!-- wie könnte die eingabe wieder angezeigt werden? -->
        <input name="maxRows" value="<?= $_GET['maxRows'] ?>"> x
        <input name="maxCols" value="<?= $_GET['maxCols'] ?>">
        <button>Anzeigen</button>
    </form>
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

        generateTable($_GET['maxRows'], $_GET['maxCols']);
        // Wie den Ansatz modifizieren damit die Anzahl der
        // Zeilen / Spalten mit der Anfrage
        // gesteuert / verändert werden
        ?>
        </tbody>
    </table>
</body>
</html>
