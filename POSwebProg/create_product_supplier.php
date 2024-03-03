<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "posinventory";

$connection = new mysqli($servername, $username, $password, $database);

$prod_id = "";
$prod_name = "";
$prod_category = "";
$supplier_id = "";
$prod_price = "";
$prod_quantity = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prod_id = $_POST["prod_id"];
    $prod_name = $_POST["prod_name"];
    $prod_category = $_POST["prod_category"];
    $supplier_id = $_POST["supplier_id"];
    $prod_price = $_POST["prod_price"];
    $prod_quantity = $_POST["prod_quantity"];

    do {
        if (empty($prod_id) || empty($prod_name) || empty($prod_category) ||
        empty($supplier_id) || empty($prod_price) || empty($prod_quantity)) {
            $errorMessage = "Must fill all fields";
            break;
        }


        //add new product in database
        $sql = "INSERT INTO tbl_product (prod_id, prod_name, prod_category, supplier_id, prod_price, prod_quantity) " .
                " VALUES ('$prod_id', '$prod_name', '$prod_category', '$supplier_id', '$prod_price', '$prod_quantity')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }


        $prod_id = "";
        $prod_name = "";
        $prod_category = "";
        $supplier_id = "";
        $prod_price = "";
        $prod_quantity = "";

        $successMessage = "Product added Successfully";

        header("location: /POSWEBPROG/supplier_screen.php");
        exit;

    } while (false);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POSinventory</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div class="container my-5">
        <h2>New Product</h2>

        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissable fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
            </div>
            ";
        }
        ?>

        <form method="post">
        <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Product Identification:</label>
                <div class="col-sm--6">
                    <input type="text" class="form-control" name="prod_id" value="<?php echo $prod_id; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Product Name:</label>
                <div class="col-sm--6">
                    <input type="text" class="form-control" name="prod_name" value="<?php echo $prod_name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Category:</label>
                <div class="col-sm--6">
                    <input type="text" class="form-control" name="prod_category" value="<?php echo $prod_category; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Supplier Identifacation:</label>
                <div class="col-sm--6">
                    <input type="text" class="form-control" name="supplier_id" value="<?php echo $supplier_id; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Product Price:</label>
                <div class="col-sm--6">
                    <input type="text" class="form-control" name="prod_price" value="<?php echo $prod_price; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Product Quantity:</label>
                <div class="col-sm--6">
                    <input type="text" class="form-control" name="prod_quantity" value="<?php echo $prod_quantity; ?>">
                </div>
            </div>

            <?php
            if (!empty($successMessage)) {
                echo"
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissable fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <a type="cancel" class="btn btn-outline-primary" href="/POSWEBPROG/supplier_screen.php"
                    role="button">Cancel</a>
                </div>
            </div>
        </form>

    </div>
</body>
</html>
