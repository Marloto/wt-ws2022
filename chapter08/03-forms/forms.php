<?php


$textEingabe = $_GET['sometext']; // value vom input-tag
$checkBox = $_GET['somecheck']; // value vom input-tag
$radioBox = $_GET['someradio']; // value vom input-tag
$textAreaBox = $_GET['somearea']; // child-content vom textarea-tag
$selectBox = $_GET['someselect']; // value-attr. im ausgewählten option-tag


$textEingabeFalsch = false;
$checkBoxFalsch = false;
$checkBoxAusgewaehlt = false;
$radioBoxFalsch = false;
$textAreaFalsch = false;
$selectBoxFalsch = false;

if($_GET["action" == "saved"]) {
    if(strlen($textEingabe) < 3) {
        $textEingabeFalsch = true;
    }

    if($checkBox == "ok") { // check übergebener Wert == Input-Value
        $checkBoxAusgewaehlt = true;
    } else {
        $checkBoxFalsch = true;
    }

    if(empty($radioBox)) { // check übergebener Wert == Input-Value
        $radioBoxFalsch = true;
    }

    if(strlen($textAreaBox) < 3) {
        $textAreaFalsch = true;
    }

    if(empty($selectBox)) { // check übergebener Wert == Input-Value
        $selectBoxFalsch = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input.error, textarea.error, select.error {
            border: 1px solid red;
            color: red;
        }
        label.error {
            color: red;
        }
    </style>
</head>
<body>
    <form method="get">
        <p><label<?php if($textEingabeFalsch) echo " class=\"error\""; ?>>Text: </label><input name="sometext" type="text" value="<?php echo $textEingabe; ?>"<?php if($textEingabeFalsch) echo " class=\"error\""; ?>></p>


        <p><input <?php if($checkBoxAusgewaehlt) echo "checked" ?> name="somecheck" type="checkbox" value="ok"> <label<?php if($checkBoxFalsch) echo " class=\"error\""; ?>>Some Check</label></p>



        <p><input <?php if($radioBox == 'a') echo "checked"; ?> name="someradio" type="radio" value="a"> <label <?php if($radioBoxFalsch) echo "class=\"error\""; ?>>Value A</label></p>
        <p><input <?php if($radioBox == 'b') echo "checked"; ?> name="someradio" type="radio" value="b"> <label<?php if($radioBoxFalsch) echo " class=\"error\""; ?>>Value B</label></p>


        <p><label<?php if($textAreaFalsch) echo " class=\"error\""; ?>>Message</label><br/><textarea name="somearea"<?php if($textAreaFalsch) echo " class=\"error\""; ?>><?php echo $textAreaBox; ?></textarea></p>


        <p><label<?php if($selectBoxFalsch) echo " class=\"error\""; ?>>Auswahl: </label><select name="someselect"<?php if($selectBoxFalsch) echo " class=\"error\""; ?>>
            <option <?php if($selectBox == '1') echo "selected"; ?> value="1">Option A</option>
            <option <?php if($selectBox == '2') echo "selected"; ?> value="2">Option B</option>
            <option <?php if($selectBox == '3') echo "selected"; ?> value="3">Option C</option>
            <option <?php if($selectBox == '4') echo "selected"; ?> value="4">Option D</option>
        </select></p>
        

        <input type="hidden" value="...." name="somehidden">
        <button name="action" value="saved">Absenden</button>
        <button name="action" value="saved2">Absenden2</button>
    </form>
</body>
</html>