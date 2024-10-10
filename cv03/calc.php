<?php 

if (isset($_GET["num1"]) && isset($_GET["num2"]) && isset($_GET["operator"])) {
    $n1 = $_GET["num1"];
    $n2 = $_GET["num2"];
    $operator = $_GET["operator"];

    switch ($operator) {
        case "+":
            echo $n1 + $n2;
            break;
        case "-":
            echo $n1 - $n2;
            break;
        case "*":
            echo $n1 * $n2;
            break;
        case "/":
            if ($n2 != 0) {
                echo $n1 / $n2;
            } else {
                echo "[ERROR]: Deleni 0";
            }
            break;
    }
}