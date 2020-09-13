<?php
require('top.inc.php');
$categories_id = '';
$name = '';
$mrp = '';
$price = '';
$qty = '';
$image = '';
$short_desc	= '';
$description	= '';
$meta_title	= '';
$meta_description	= '';
$meta_keyword = '';

$msg = '';
$image_required = 'required';
if (isset($_GET['id']) && $_GET['id'] != '') {
	$image_required = '';
	$id = get_safe_value($con, $_GET['id']);
	$res = mysqli_query($con, "select * from product where id='$id'");
	$check = mysqli_num_rows($res);
	if ($check > 0) {
		$row = mysqli_fetch_assoc($res);
		$categories_id = $row['categories_id'];
		$name = $row['name'];
		$mrp = $row['mrp'];
		$price = $row['price'];
		$qty = $row['qty'];
		$short_desc = $row['short_desc'];
		$description = $row['description'];
		$meta_title = $row['meta_title'];
		$meta_desc = $row['meta_desc'];
		$meta_keyword = $row['meta_keyword'];
	} else {
		header('location:product.php');
		die();
	}
}

if (isset($_POST['submit'])) {
	$categories_id = get_safe_value($con, $_POST['categories_id']);
	$name = get_safe_value($con, $_POST['name']);
	$mrp = get_safe_value($con, $_POST['mrp']);
	$price = get_safe_value($con, $_POST['price']);
	$qty = get_safe_value($con, $_POST['qty']);
	$short_desc = get_safe_value($con, $_POST['short_desc']);
	$description = get_safe_value($con, $_POST['description']);
	$meta_title = get_safe_value($con, $_POST['meta_title']);
	$meta_desc = get_safe_value($con, $_POST['meta_desc']);
	$meta_keyword = get_safe_value($con, $_POST['meta_keyword']);

	$res = mysqli_query($con, "select * from product where name='$name'");
	$check = mysqli_num_rows($res);
	if ($check > 0) {
		if (isset($_GET['id']) && $_GET['id'] != '') {
			$getData = mysqli_fetch_assoc($res);
			if ($id == $getData['id']) {
			} else {
				$msg = "Product already exist";
			}
		} else {
			$msg = "Product already exist";
		}
	}


	if ($_GET['id'] == 0) {
		if ($_FILES['image']['type'] != 'image/png' && $_FILES['image']['type'] != 'image/jpg' && $_FILES['image']['type'] != 'image/jpeg') {
			$msg = "Please select only png,jpg and jpeg image formate";
		}
	} else {
		if ($_FILES['image']['type'] != '') {
			if ($_FILES['image']['type'] != 'image/png' && $_FILES['image']['type'] != 'image/jpg' && $_FILES['image']['type'] != 'image/jpeg') {
				$msg = "Please select only png,jpg and jpeg image formate";
			}
		}
	}

	if ($msg == '') {
		if (isset($_GET['id']) && $_GET['id'] != '') {
			if ($_FILES['image']['name'] != '') {
				$image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'], PRODUCT_IMAGE_SERVER_PATH . $image);
				$update_sql = "update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',image='$image' where id='$id'";
			} else {
				$update_sql = "update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword' where id='$id'";
			}
			mysqli_query($con, $update_sql);
		} else {
			$image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'], PRODUCT_IMAGE_SERVER_PATH . $image);
			mysqli_query($con, "insert into product(categories_id,name,mrp,price,qty,short_desc,description,meta_title,meta_desc,meta_keyword,status,image) values('$categories_id','$name','$mrp','$price','$qty','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword',1,'$image')");
		}
		header('location:product.php');
		die();
	}
}
?>
<section id="new" class="main-display new-product">
	<div class="heading">
		<h2>Add new Product</h2>
		<a href="product.php">Cancel</a>
	</div>
	<div class="main-display-content">
		<form class="form" method="post" enctype="multipart/form-data">
			<h4>New Product Form</h4>
			<label type="Categories">
				<select class="form-control" name="categories_id">
					<option>Select Category</option>
					<?php
					$res = mysqli_query($con, "select id,categories from categories order by categories asc");
					while ($row = mysqli_fetch_assoc($res)) {
						if ($row['id'] == $categories_id) {
							echo "<option selected value=" . $row['id'] . ">" . $row['categories'] . "</option>";
						} else {
							echo "<option value=" . $row['id'] . ">" . $row['categories'] . "</option>";
						}
					}
					?>
				</select>
			</label>

			<label type="Product Name"><input type="text" name="name" placeholder="Enter product name" required value="<?php echo $name ?>"></label>

			<label type="MRP"> <input type="text" name="mrp" placeholder="Enter product mrp" required value="<?php echo $mrp ?>"></label>

			<label type="Price"> <input type="text" name="price" placeholder="Enter product price" required value="<?php echo $price ?>"></label>

			<label type="Qty"> <input type="text" name="qty" placeholder="Enter qty" required value="<?php echo $qty ?>"></label>

			<label type="Image"> <input type="file" name="image" <?php echo  $image_required ?>></label>

			<label type="Short Description"> <input name="short_desc" placeholder="Enter product short description" required><?php echo $short_desc ?></input></label>

			<label type="Description"> <input name="description" placeholder="Enter product description" required><?php echo $description ?></input></label>

			<label type="Meta Title"> <input name="meta_title" placeholder="Enter product meta title"><?php echo $meta_title ?></input></label>

			<label type="Meta Description"> <input name="meta_desc" placeholder="Enter product meta description"><?php echo $meta_description ?></input></label>

			<label type="Meta Keyword"> <input name="meta_keyword" placeholder="Enter product meta keyword"><?php echo $meta_keyword ?></input></label>


			<button name="submit" type="submit">Submit</button>
			<div class="error"><span><?php echo $msg ?></span></div>
		</form>
	</div>

	<?php
	require('footer.inc.php');
	?>