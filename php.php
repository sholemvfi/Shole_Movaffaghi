<?php
if (isset($_REQUEST['input'])) {
    $input = $_REQUEST['input'];
    try {
        echo calculator($input);
    }
    catch (ParseError $er) {
        echo "wrong input. try again";
    }
    catch (Error $er) {
        echo $er->getMessage();
    }
}

function calculator($input){
    $input = preg_replace("/[^a-z0-9+\-*\/]/", "", $input);
    $input02 = "NULL";
    if ($input != "")
        $input02 = @eval("return " . $input . ";");
    if ($input02 == null)
        throw new Error("error something is wrong!");
    return $input02;
}

echo "<br><br><br><a  href='calculator.html'>click to return to calculator</a>";