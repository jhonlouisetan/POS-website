<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "posinventory";

$connection = new mysqli($servername, $username, $password, $database);

$supplier_id = "";
$company_name = "";
$user_name = "";
$user_password = "";
$user_address = "";
$contact_info = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET' ) {

    if (!isset($_GET["supplier_id"])) {
        header("location: /POSWEBPROG/admin_screen.php");
        exit;
    }
    $supplier_id = $_GET["supplier_id"];

    $sql = "SELECT * FROM tbl_supplier WHERE supplier_id = $supplier_id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if(!$row) {
        header("location: /POSWEBPROG/admin_screen.php");
        exit;
    }

    $company_name = $row["company_name"];
    $user_name = $row["user_name"];
    $user_password = $row["user_password"];
    $user_address = $row["user_address"];
    $contact_info = $row["contact_info"];

}
else {
    $supplier_id = $_POST["supplier_id"];
    $company_name = $_POST["company_name"];
    $user_name = $_POST["user_name"];
    $user_password = $_POST["user_password"];
    $user_address = $_POST["user_address"];
    $contact_info = $_POST["contact_info"];

    do {
        if (empty($supplier_id) || empty($company_name) || empty($user_name) || empty($user_password) || empty($user_address) || empty($contact_info)) {
            $errorMessage = "Must fill all fields";
            break;
        }

        $sql = "UPDATE tbl_supplier " . 
                "SET company_name='$company_name', user_name='$user_name' , user_password='$user_password', user_address='$user_address', contact_info='$contact_info' " . 
                "WHERE supplier_id='$supplier_id' ";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $successMessage = "Supplier Updated";

        header("location: /POSWEBPROG/admin_screen.php");
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
    <title>posinventory</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div class="container my-5">
        <h2>Edit Supplier</h2>

        <?php
        if(!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissable fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
            </div>
            ";
        }
        ?>

        <form method="post">
            <input type="hidden" name="supplier_id" value="<?php echo $supplier_id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Company Name:</label>
                <div class="col-sm--6">
                    <input type="text" class="form-control" name="company_name" value="<?php echo $company_name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Username:</label>
                <div class="col-sm--6">
                    <input type="text" class="form-control" name="user_name" value="<?php echo $user_name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Password:</label>
                <div class="col-sm--6">
                    <input type="text" class="form-control" name="user_password" value="<?php echo $user_password; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Supplier Address:</label>
                <div class="col-sm--6">
                    <input type="text" class="form-control" name="user_address" value="<?php echo $user_address; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contact Information:</label>
                <div class="col-sm--6">
                    <input type="text" class="form-control" name="contact_info" value="<?php echo $contact_info; ?>">
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
                    <a type="cancel" class="btn btn-outline-primary" href="/POSWEBPROG/admin_screen.php" role="button">Cancel</a>
                </div>
            </div>
        </form>

    </div>
</body>
</html>