<?php
require('top.inc.php');

$sql = "select * from users order by id desc";
$res = mysqli_query($con, $sql);
?>
<section id="order" class="main-display">
	<div class="heading">
		<h2>Orders</h2>
	</div>
	<div class="main-display-content">
		<div class="stats">
			<div class="stats-card">
				<h4>2</h4>
				<p>orders overall</p>
			</div>
			<div class="stats-card">
				<h4>1</h4>
				<p>order pending</p>
			</div>
			<div class="stats-card">
				<h4>1</h4>
				<p>order completed</p>
			</div>
		</div>
		<table>
			<thead>
				<tr>
					<th>Order ID</th>
					<th>Order Date</th>
					<th>Address</th>
					<th>Payment Type</th>
					<th>Payment Status</th>
					<th>Order Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$res = mysqli_query($con, "select `order`.*,order_status.name as order_status_str from `order`,order_status where order_status.id=`order`.order_status");
				while ($row = mysqli_fetch_assoc($res)) {
				?>
					<tr>
						<td><a href="order_master_detail.php?id=<?php echo $row['id'] ?>"> <?php echo $row['id'] ?></a></td>
						<td><?php echo $row['added_on'] ?></td>
						<td>
							<?php echo $row['address'] ?><br />
							<?php echo $row['city'] ?><br />
							<?php echo $row['pincode'] ?>
						</td>
						<td><?php echo $row['payment_type'] ?></td>
						<td><?php echo $row['payment_status'] ?></td>
						<td><?php echo $row['order_status_str'] ?></td>

					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<?php
	require('footer.inc.php');
	?>