<?php

// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {



// LOGIN USER
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "posinventory";

  $connection = new mysqli($servername, $username, $password, $database);

  // grap form values
  $user_name = $_POST['user_name'];
  $user_password = $_POST['user_password'];

  // make sure form is filled properly
  if (empty($user_name)) {
    array_push($errors, "Username is required");
  }
  if (empty($user_password)) {
    array_push($errors, "Password is required");
  }

  $sql = "SELECT * FROM tbl_supplier WHERE user_name='$user_name' AND user_password='$user_password' LIMIT 1";
  $result = $connection->query($sql);

    if ($user_name == 'admin' && $user_password == 'admin') {

      header('location: admin_screen.php');
    }else if ($user_name == 'suppliertest' && $user_password == 'suppliertest') { 

      header('location: supplier_screen.php');
    }else {
      $error = "Incorrect username or password. Please try again.";
    }
  }
?>

<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <style>
    body {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    form {
      display: flex;
      flex-direction: column;
      align-items: center;
      background-color: #f2f2f2;
      padding: 40px;
      border-radius: 10px;
      border: 2px solid blue;
      box-shadow: 2px 2px 5px #c9c9c9;
    }

    label {
      margin-top: 20px;
    }

    input[type="text"],
    input[type="password"] {
      width: 200px;
      height: 25px;
      margin-top: 10px;
      padding-left: 10px;
      border-radius: 5px;
      border: 1px solid #c9c9c9;
      border: 2px solid blue;
    }

    input[type="submit"] {
      width: 80px;
      height: 30px;
      margin-top: 20px;
      border-radius: 5px;
      border: 2px solid blue;
      background-color: #4CAF50;
      color: white;
      cursor: pointer;
    }

    .error {
      margin-top: 20px;
      color: red;
      font-size: 12px;
    }

    img {
      margin-bottom: 30px;
      width: 300px;
      height: 200px;
    }
  </style>
</head>

<body>
<div class="logo">
    <img src="ATU1.png" alt="Logo">
  </div>
  <?php if (isset($error)) : ?>
    <p><?php echo $error; ?></p>
  <?php endif; ?>
  <form method="post">
    <div>
      <label for="user_name">Username:</label>
      <input type="text" name="user_name" id="user_name">
    </div>
    <div>
      <label for="user_password">Password:</label>
      <input type="password" name="user_password" id="user_password">
    </div>
    <input type="submit" name="login_btn" value="Login">
  </form>
</body>

</html>