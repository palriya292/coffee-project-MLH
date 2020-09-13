<?php
require('connection.inc.php');
require('functions.inc.php');
require('add_to_cart.inc.php');
$cat_res=mysqli_query($con,"select * from categories where status=1 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;	
}

$obj=new add_to_cart();
$totalProduct=$obj->totalProduct();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>KCROASTERS</title>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="../css/home.css">
  <link rel="stylesheet" href="../css/style_Navbar_Home.css">
  <script src="../javascript/add-to-cart.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./index.html">


</head>
<style>
@font-face {
  font-family: VistaSansLight;
  src: url('../css/VistaSansLight.ttf');
}

body{
    font-family: VistaSansLight;
}

li{
    list-style-type: none;
}
</style>

<body>

    <header>
        <a class="logo" href="index.php"><img src="../img-parallax_logo/logo.jpg" alt="logo"></a>
        <nav>
            <ul class="nav__links">
            <li class="drop"><a href="index.php">Home</a></li>
            <li><a href="learn.html">Learn</a></li>
                <?php
				foreach($cat_arr as $list){
				?>
				<li><a href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a></li>
				<?php
				}
                ?>
                <li><a href="aboutUs.php">About Us</a></li>
                <li><?php if(isset($_SESSION['USER_LOGIN'])){
											echo '<a href="logout.php">Logout</a> | <a href="my_order.php">My Order</a>';
										}else{
											echo '<a href="login.php">Login/Register</a>';
										}
										?></li>
                <li><a href="cart.php">Cart-<span class="badge htc__qua"><?php echo $totalProduct?></span></a></li>
            </ul>
        </nav>
        <a class="cta" href="contact.php">Contact</a>
        <p class="menu cta">Menu</p>
    </header>
    <div class="overlay">
        <a class="close">&times;</a>
        <div class="overlay__content">
        <li class="drop"><a href="index.php">Home</a></li>
                <?php
				foreach($cat_arr as $list){
				?>
				<li><a href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a></li>
				<?php
				}
                ?>
                <li><a href="learn.html">Learn</a></li>
                <li><a href="aboutUs.php">About Us</a></li>
                <li><a href="contact.php">contact</a></li>
                <li><a href="login.php">Login/Register</a></li>
                <li><a href="cart.php">Cart-<span class="badge htc__qua"><?php echo $totalProduct?></span></a></li>
        </div>
    </div>
