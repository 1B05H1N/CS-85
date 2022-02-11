<?php

session_start();

if(isset($_POST['submit'])) {
    $_SESSION["product-1"] = $_POST["product-1"];
    $_SESSION["product-2"] = $_POST["product-2"];
    $_SESSION["product-3"] = $_POST["product-3"];
    $_SESSION["product-4"] = $_POST["product-4"];
    $_SESSION["product-5"] = $_POST["product-5"];
    $_SESSION["product-6"] = $_POST["product-6"];

    header('Location: check-out.php');
}
?>
