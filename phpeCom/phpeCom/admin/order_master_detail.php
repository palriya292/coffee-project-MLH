<?php
require('top.inc.php');
$order_id = get_safe_value($con, $_GET['id']);
if (isset($_POST['update_order_status'])) {
	$update_order_status = $_POST['update_order_status'];
	if ($update_order_status == '5') {
		mysqli_query($con, "update `order` set order_status='$update_order_status',payment_status='Success' where id='$order_id'");
	} else {
		mysqli_query($con, "update `order` set order_status='$update_order_status' where id='$order_id'");
	}
}
?>
<section id="order-detail" class="main-display">

	<div class="heading">
		<h2>Order Detail</h2>
		<a href="order-master.php">Go back</a>
	</div>
	<div class="main-display-content">
		<table>
			<thead>
				<tr>
					<th>Product Name</th>
					<th>Product Image</th>
					<th>Qty</th>
					<th>Price</th>
					<th>Total Price</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$res = mysqli_query($con, "select distinct(order_detail.id) ,order_detail.*,product.name,product.image,`order`.address,`order`.city,`order`.pincode from order_detail,product ,`order` where order_detail.order_id='$order_id' and  order_detail.product_id=product.id GROUP by order_detail.id");
				$total_price = 0;

				$userInfo = mysqli_fetch_assoc(mysqli_query($con, "select * from `order` where id='$order_id'"));

				$address = $userInfo['address'];
				$city = $userInfo['city'];
				$pincode = $userInfo['pincode'];

				while ($row = mysqli_fetch_assoc($res)) {

					$total_price = $total_price + ($row['qty'] * $row['price']);
				?>
					<tr>
						<td><?php echo $row['name'] ?></td>
						<td> <img class="product-image" src="<?php echo PRODUCT_IMAGE_SITE_PATH . $row['image'] ?>"></td>
						<td><?php echo $row['qty'] ?></td>
						<td><?php echo $row['price'] ?></td>
						<td><?php echo $row['qty'] * $row['price'] ?></td>

					</tr>
				<?php } ?>
			</tbody>
		</table>
		<div class="total">
			<p>Total Price: <span><?php echo $total_price ?></span></p>
		</div>
		<div id="address_details">
			<strong>Address</strong>
			<?php echo $address ?>, <?php echo $city ?>, <?php echo $pincode ?><br /><br />
			<strong>Order Status</strong>
			<?php
			$order_status_arr = mysqli_fetch_assoc(mysqli_query($con, "select order_status.name from order_status,`order` where `order`.id='$order_id' and `order`.order_status=order_status.id"));
			echo $order_status_arr['name'];
			?>

			<div>
				<form method="post">
					<select name="update_order_status" required>
						<option value="">Select Status</option>
						<?php
						$res = mysqli_query($con, "select * from order_status");
						while ($row = mysqli_fetch_assoc($res)) {
							if ($row['id'] == $categories_id) {
								echo "<option selected value=" . $row['id'] . ">" . $row['name'] . "</option>";
							} else {
								echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
							}
						}
						?>
					</select>
					<input type="submit" />
				</form>
			</div>
		</div>
	</div>
	<?php
	require('footer.inc.php');
	?>