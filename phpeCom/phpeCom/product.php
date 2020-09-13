<?php 
require('categories-Top.php');
if(isset($_GET['id'])){
	$product_id=mysqli_real_escape_string($con,$_GET['id']);
	if($product_id>0){
		$get_product=get_product($con,'','',$product_id);
	}else{
		?>
		<script>
		window.location.href='index.php';
		</script>
		<?php
	}
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
?>

<style>
    /* Style the list */
ul.breadcrumb {
  padding: 10px 16px;
  list-style: none;
  background-color: #eeeeee;
}

/* Display list items side by side */
ul.breadcrumb li {
  display: inline;
  font-size: 18px;
}

/* Add a slash symbol (/) before/behind each list item */
ul.breadcrumb li+li:before {
  padding: 8px;
  color: black;
  content: "/\00a0";
}

/* Add a color to all links inside the list */
ul.breadcrumb li a {
  color: #0275d8;
  text-decoration: none;
}

/* Add a color on mouse-over */
ul.breadcrumb li a:hover {
  color: #01447e;
  text-decoration: underline;
}

.img-product{
  height:500px;
  width:500px;
}

.img-border{
  border: 1px solid #ececec;
  border-width: 20px
}

p{
  padding-top:10px;
}

.name-down{
  border:1px solid grey;
  padding:10px;
  text-transform:uppercase;
}

.myButton {
	background:linear-gradient(to bottom, #fe1a00 5%, #ce0100 100%);
	background-color:#fe1a00;
	border-radius:9px;
	border:5px solid #d83526;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:17px;
	padding:5px 17px;
	text-decoration:none;
	text-shadow:-2px 3px 3px #b23e35;
}
.myButton:hover {
	background:linear-gradient(to bottom, #ce0100 5%, #fe1a00 100%);
	background-color:#ce0100;
}
.myButton:active {
	position:relative;
	top:1px;
}

</style>
<link href="../javascript/add-to-cart.js"/>
<main id="content" class="main-area">
<ul class="breadcrumb">
  <li><a href="index.php">Home</a></li>
  <li><a href="categories.php?id=<?php echo $get_product['0']['categories_id']?>"><?php echo $get_product['0']['categories']?></a></li>
  <li><a href="<?php echo $get_product['0']['name']?>"><?php echo $get_product['0']['name']?></a></li>
</ul>
    <div class="container" style="display:grid; display:flex; grid-template-columns:1fr auto; grid-gap:50px; margin:20px">
        <div class="img-border">
            <img class="img-product" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image']?>" alt="full-image"/>
        </div>
        <div style="padding-top:50px">
            <h1 style="padding-bottom:20px; text-transform:uppercase;"><?php echo $get_product['0']['name']?></h1>
            <p><strong>MRP: </strong><?php echo $get_product['0']['mrp']?></p>
            <p><strong>Price: </strong><?php echo $get_product['0']['price']?></p>
            <p><strong>Short Description: </strong><?php echo $get_product['0']['short_desc']?></p>
            <p><strong>Availabilty: </strong>In Stock</p>
            <p><strong>Category: </strong><a href="#"><?php echo $get_product['0']['categories']?></a></p>
            <p><strong>Qty: </strong>
              <select id="qty">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
              </select>
            </p>
            <a href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['id']?>','add')" class="myButton">Add to Cart</a>
            
        </div>
    </div>
    
    <div style="padding:20px;">
        <h2 class="name-down">Product Name: <?php echo $get_product['0']['name']?></h2>
        <h3 style="padding-left:10px; padding-top:20px;">Description:</br><?php echo $get_product['0']['description']?></h3>
    </div>
</main>


<?php require('footer-products.php');?>