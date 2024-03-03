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

        #wrapper {
            width: 100%;
            padding: 0px 20px 0px 20px;
        }

        #logo {
            flex-grow: 1;
            font-size: 40px;
            color: white;
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
            margin-left: 5%;
            width: 90%;
            border-color: #6849AB;
            background-color: #BAF2E5;
            color: #6849AB;
            font-family: -apple-system, BlinkMacSystemFont, 'Roboto', sans-serif;
        }

        table,
        td,th {
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
            padding: 1%;
            text-align: center;
            font-family: -apple-system, BlinkMacSystemFont, 'Roboto', sans-serif;
            border-radius: 6px;
            border: none;
            background: #6E6D70;
            color: #DFDEDF;
            margin: 5px 5px 5px 5px;
        }
        img{
            margin-bottom: 20px;
            width: 200px;
            height: 70%;
            float:left;
        }
    </style>
</head>

<body background="bgpos.png">
        <div id="upperbar">
        <div id="logo">ATU GROUP</div>
        <div style="flex-grow: 9;"> </div>
        <input type="button" class="logout" value="Supplier Screen">
        <a class="logout" href="/POSWEBPROG/login.php" role="button">log out</a>
    </div>
    
    <div id="wrapper">
        <div class="page-content">
            <ul id="navi">
            <div class="logo">
    <img src="ATU1.png" alt="Logo">
  </div>
                <li> <a class="addButton" href="/POSWEBPROG/create_product_supplier.php" role="button">Add Product</a></li>
                <li>P</li>
                <li>R</li>
                <li>O</li>
                <li>D</li>
                <li>U</li>
                <li>C</li>
                <li>T</li>
                <LI>S</LI>
            </ul>
            <ul id="screen">
            <li><br><br><br><br><br><br><br><br><br></i>
                <li>
                    <table>
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
                        <a class='btn btn-primary' href='/POSWEBPROG/edit_product_supplier.php?prod_id=$row[prod_id]'>Edit I </a>
                        <a class='btn btn-danger' href='/POSWEBPROG/delete_product_supplier.php?prod_id=$row[prod_id]'>Delete</a>
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