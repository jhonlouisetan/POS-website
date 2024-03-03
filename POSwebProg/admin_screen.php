<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product Screen</title>
    <style>
        #upperbar {
            display: flex;
            flex-direction: row;

        }
        #logo {
            flex-grow: 1;
            font-size: 40px;
            color: white;
        }

        #wrapper {
            width: 100%;
            padding: 0px 5px 0px 5px;
        }

        .page-content {
            margin: 50px 20px 0px 20px;
        }

        #navi {
            float: left;
            text-align: center;
            font-size: xx-large;
            color: white;
        }

        #screen {
            margin-left: 10%;
            position: relative;
        }

        ul,
        li {
            padding-bottom: 10px;
            list-style: none;
            list-style-type: none;
        }

        table {
            width: 90%;
            margin-left: 5%;
            background-color: #BAF2E5;
            color: #6849AB;
            font-family: -apple-system, BlinkMacSystemFont, 'Roboto', sans-serif;
        }

        table,
        td, th {
            border: 2px solid black;
        }

        body {
            background-color: #188BCB;
        }

        div {
            display: block;
        }

        .addButton {
            display: flex;
            font-size: medium;
            flex-direction: column;
            align-items: center;
            padding: 6px 14px;
            font-family: -apple-system, BlinkMacSystemFont, 'Roboto', sans-serif;
            border-radius: 6px;
            border: none;
            background: #6E6D70;
            color: #DFDEDF;
        }

        .logout {
            flex-grow: 1;
            padding: 10px;
            text-align: center;
            font-size: 20px;
            font-family: -apple-system, BlinkMacSystemFont, 'Roboto', sans-serif;
            border-radius: 6px;
            border: none;
            background: #6E6D70;
            color: #DFDEDF;
            margin: 5px 5px 5px 5px;
        }
        .admindisplay {
            flex-grow: 1;
            padding: 00px 0px 0px 0px ;
            text-align: center;
            font-size: 20px;
            font-family: -apple-system, BlinkMacSystemFont, 'Roboto', sans-serif;
            border-radius: 6px;
            border: none;
            background: #6E6D70;
            color: #DFDEDF;
            margin: 5px 5px 5px 5px;
        }
        img {
            flex-grow: 2;
            margin-bottom: 20px;
            width: 200px;
            height: 70%;
            float:left;
    }
    .secondTable {
            margin-top: 400px;
        } 
    </style>
</head>

<body background="bgpos.png">
    <div id="upperbar">
    <div id="logo">ATU GROUP</div>
        <div style="flex-grow: 9;"> </div>
        <input type="button" class="admindisplay" value="Administrator Screen">
        <a class="logout" href="/POSWEBPROG/login.php" role="button">log out</a>
    </div>
    <div id="wrapper">
        <div class="page-content">
            <ul id="navi">
            <div class="logo">
    <img src="ATU1.png" alt="Logo">
  </div>
                <li><a class="addButton" href="/POSWEBPROG/create_supplier.php" role="button">Add Supplier</a></li>
                <li>S</li>
                <li>U</li>
                <li>P</li>
                <li>P</li>
                <li>L</li>
                <li>I</li>
                <li>E</li>
                <li>R</li>
                <li>S</li>
                <li><br></li>
                <li> <a class="addButton" href="/POSWEBPROG/create_product.php" role="button">Add Product</a></li>
                <li>P</li>
                <li>R</li>
                <li>O</li>
                <li>D</li>
                <li>U</li>
                <li>C</li>
                <li>T</li>
                <li>S</li>
            </ul>
            <ul id="screen">
                <li><br><br><br><br><br><br><br><br><br></li>
                <li>
                    <table>
                        <thead>
                            <th>Supplier Identifacation</th>
                            <th>Company Name</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Supplier Address</th>
                            <th>Contact Information</th>
                            <th>Actions: </th>
                        </thead>
                        <tbody>
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $database = "posinventory";

                            $connection = new mysqli($servername, $username, $password, $database);

                            if ($connection->connect_error) {
                                die("Connection failed: " . $connection->connect_error);
                            }

                            $sql = "SELECT * FROM tbl_supplier";
                            $result = $connection->query($sql);

                            if (!$result) {
                                die("Invalid query: " . $connection->error);
                            }

                            while ($row = $result->fetch_assoc()) {
                                echo "
                    <tr>
                    <td>$row[supplier_id]</td>
                    <td>$row[company_name]</td>
                    <td>$row[user_name]</td>
                    <td>$row[user_password]</td>
                    <td>$row[user_address]</td>
                    <td>$row[contact_info]</td>
                    <td>
                        <a class='btn btn-primary' href='/POSWEBPROG/edit_supplier.php?supplier_id=$row[supplier_id]'>Edit I </a>
                        <a class='btn btn-danger' href='/POSWEBPROG/delete_supplier.php?supplier_id=$row[supplier_id]'>Delete</a>
                    </td>
                </tr>
                    ";
                            }
                            ?>

                        </tbody>
                    </table>
                </li>
                <li>
                    <table class="secondTable">
                        <thead>
                            <th>Product Identification</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Supplier Identification</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Actions: </th>
                        </thead>
                        <tbody>
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $database = "posinventory";

                            $connection = new mysqli($servername, $username, $password, $database);

                            if ($connection->connect_error) {
                                die("Connection failed: " . $connection->connect_error);
                            }

                            $sql = "SELECT * FROM tbl_product";
                            $result = $connection->query($sql);

                            if (!$result) {
                                die("Invalid query: " . $connection->error);
                            }

                            while ($row = $result->fetch_assoc()) {
                                echo "
                    <tr>
                    <td>$row[prod_id]</td>
                    <td>$row[prod_name]</td>
                    <td>$row[prod_category]</td>
                    <td>$row[supplier_id]</td>
                    <td>$row[prod_price]</td>
                    <td>$row[prod_quantity]</td>
                    <td>
                        <a class='btn btn-primary' href='/POSWEBPROG/edit_product.php?prod_id=$row[prod_id]'>Edit I </a>
                        <a class='btn btn-danger' href='/POSWEBPROG/delete_product.php?prod_id=$row[prod_id]'>Delete</a>
                    </td>
                </tr>
                    ";
                            }
                            ?>

                        </tbody>
                    </table>
                </li>
            </ul>
        </div>
    </div>
</body>

</html>