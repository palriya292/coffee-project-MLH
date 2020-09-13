<?php
require('top.inc.php');

if (isset($_GET['type']) && $_GET['type'] != '') {
	$type = get_safe_value($con, $_GET['type']);
	if ($type == 'status') {
		$operation = get_safe_value($con, $_GET['operation']);
		$id = get_safe_value($con, $_GET['id']);
		if ($operation == 'active') {
			$status = '1';
		} else {
			$status = '0';
		}
		$update_status_sql = "update product set status='$status' where id='$id'";
		mysqli_query($con, $update_status_sql);
	}

	if ($type == 'delete') {
		$id = get_safe_value($con, $_GET['id']);
		$delete_sql = "delete from product where id='$id'";
		mysqli_query($con, $delete_sql);
	}
}

$sql = "select product.*,categories.categories from product,categories where product.categories_id=categories.id order by product.id desc";
$res = mysqli_query($con, $sql);
?>
<section id="product" class="main-display">
	<div id="fullscreen-image"></div>
	<div class="heading">
		<h2>Products</h2>
		<a href="manage_product.php">Add Product</a>
	</div>
	<div class="main-display-content">
		<div class="stats">
			<div class="stats-card">
				<h4>20</h4>
				<p>products overall</p>
			</div>
			<div class="stats-card">
				<h4>2</h4>
				<p>something products</p>
			</div>
			<div class="stats-card">
				<h4>0</h4>
				<p>something products</p>
			</div>
		</div>
		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>ID</th>
					<th>Category</th>
					<th>Name</th>
					<th>Picture</th>
					<th>MRP</th>
					<th>Price</th>
					<th>Qty</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 1;
				while ($row = mysqli_fetch_assoc($res)) { ?>
					<tr>
						<td class="serial"><?php echo $i ?></td>
						<td><?php echo $row['id'] ?></td>
						<td><?php echo $row['categories'] ?></td>
						<td><?php echo $row['name'] ?></td>
						<td class="product-image-wrap"><img class="product-image" src="<?php echo PRODUCT_IMAGE_SITE_PATH . $row['image'] ?>" /></td>
						<td><?php echo $row['mrp'] ?></td>
						<td><?php echo $row['price'] ?></td>
						<td><?php echo $row['qty'] ?></td>
						<td>
							<?php
							if ($row['status'] == 1) {
								echo "<a class='button btn-ok' href='?type=status&operation=deactive&id=" . $row['id'] . "'>Active</a>";
							} else {
								echo "<a class='button btn-danger' href='?type=status&operation=active&id=" . $row['id'] . "'>Deactive</a>";
							}
							echo "<a class='button btn-cool' href='manage_product.php?id=" . $row['id'] . "'>Edit</a>";

							echo "<a class='button btn-danger' href='?type=delete&id=" . $row['id'] . "'>Delete</a>";

							?>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<?php
	require('footer.inc.php');
	?>