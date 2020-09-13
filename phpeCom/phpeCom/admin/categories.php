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
		$update_status_sql = "update categories set status='$status' where id='$id'";
		mysqli_query($con, $update_status_sql);
	}

	if ($type == 'delete') {
		$id = get_safe_value($con, $_GET['id']);
		$delete_sql = "delete from categories where id='$id'";
		mysqli_query($con, $delete_sql);
	}
}

$sql = "select * from categories order by categories asc";
$res = mysqli_query($con, $sql);
?>
<section id="category" class="main-display">
	<div class="heading">
		<h2>Categories</h2>
		<a href="manage_categories.php">Add Categories</a>
	</div>
	<div class="main-display-content">
		<div class="stats">
			<div class="stats-card">
				<h4><?php echo mysqli_num_rows($res) ?></h4>
				<p>categories overall</p>
			</div>
			<div class="stats-card">
				<h4>2</h4>
				<p>active categories</p>
			</div>
			<div class="stats-card">
				<h4>0</h4>
				<p>disabled categories</p>
			</div>
		</div>
		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>ID</th>
					<th>Categories</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 1;
				while ($row = mysqli_fetch_assoc($res)) {
				?>
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $row['id'] ?></td>
						<td><?php echo $row['categories'] ?></td>
						<td>
							<?php
							if ($row['status'] == 1) {
								echo "<a class='button btn-ok' href='?type=status&operation=deactive&id=" . $row['id'] . "'>Active</a>";
							} else {
								echo "<a class='button btn-danger' href='?type=status&operation=active&id=" . $row['id'] . "'>Deactive</a>";
							}
							echo "<a class='button btn-cool' href='manage_categories.php?id=" . $row['id'] . "'>Edit</a>";
							echo "<a class='button btn-danger' href='?type=delete&id=" . $row['id'] . "'>Delete</a>";
							?>
						</td>
					</tr>
				<?php
				} ?>
			</tbody>
		</table>
	</div>
	<?php
	require('footer.inc.php');
	?>