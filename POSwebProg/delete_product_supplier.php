<?php
if (isset($_GET["prod_id"])) {
    $prod_id = $_GET["prod_id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "posinventory";

    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM tbl_product WHERE prod_id = $prod_id";
    $connection->query($sql);
}

    header("location: /POSWEBPROG/supplier_screen.php");
    exit;
?>