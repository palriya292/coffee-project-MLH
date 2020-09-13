<?php
require('connection.inc.php');
require('functions.inc.php');
$msg = '';
if (isset($_POST['submit'])) {
   $username = get_safe_value($con, $_POST['username']);
   $password = get_safe_value($con, $_POST['password']);
   $sql = "select * from admin_users where username='$username' and password='$password'";
   $res = mysqli_query($con, $sql);
   $count = mysqli_num_rows($res);
   if ($count > 0) {
      $_SESSION['ADMIN_LOGIN'] = 'yes';
      $_SESSION['ADMIN_USERNAME'] = $username;
      header('location:categories.php');
      die();
   } else {
      $msg = "Please enter correct login details";
   }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://fonts.googleapis.com/css2?family=Courier+Prime&family=Noto+Sans&family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet">
   <title>Admin - Login</title>
   <style>
      * {
         margin: 0;
         padding: 0;
         box-sizing: border-boxs;
      }

      body {
         background-image: linear-gradient(19deg, #21D4FD 0%, #B721FF 100%);
         font-family: 'Noto Sans', sans-serif;
      }

      .login-wrapper {
         height: 100vh;
         display: flex;
         justify-content: center;
         align-items: center;
      }

      .login-wrapper>form {
         opacity: 95%;
         display: flex;
         flex-direction: column;
         justify-content: center;
         align-items: center;
         background-color: white;
         padding: 50px;
         border-radius: 15px;
         box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      }

      h2 {
         font-size: 35px;
         padding: 25px;
         font-family: 'Noto Sans JP', sans-serif;
      }

      input {
         margin: 10px;
         padding: 10px;
         border-radius: 10px;
         outline: none;
         border: none;
         font-size: larger;
         background-color: #dcdcdc;
      }

      button {
         cursor: pointer;
         margin: 5px;
         padding: 10px 15px;
         font-size: larger;
         color: #FFFFFF;
         background: #161616;
         border-radius: 50px;
         outline: none;
      }

      img {
         width: 250px;
      }

      .error {
         color: red;
      }
   </style>
</head>

<body>
   <div class="login-wrapper">

      <form method="post">
         <img src="images/logo2.jpg" alt="Logo">
         <h2>Admin Login</h2>
         <input type="text" name="username" placeholder="Username" required>
         <input type="password" name="password" placeholder="Password" required>

         <button type="submit" name="submit">Log in</button>
         <div class="error"><?php echo $msg ?></div>
      </form>
   </div>
</body>

</html>