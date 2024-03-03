<?php
if (isset($_GET["supplier_id"])) {
    $supplier_id = $_GET["supplier_id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "posinventory";

    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM tbl_supplier WHERE supplier_id = $supplier_id";
    $connection->query($sql);
}

    header("location: /POSWEBPROG/admin_screen.php");
    exit;
?>