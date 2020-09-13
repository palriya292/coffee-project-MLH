<?php
require('top.inc.php');

if (isset($_GET['type']) && $_GET['type'] != '') {
	$type = get_safe_value($con, $_GET['type']);
	if ($type == 'delete') {
		$id = get_safe_value($con, $_GET['id']);
		$delete_sql = "delete from users where id='$id'";
		mysqli_query($con, $delete_sql);
	}
}

$sql = "select * from users order by id desc";
$res = mysqli_query($con, $sql);
?>
<section id="users" class="main-display">
	<div class="heading">
		<h2>Users</h2>
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
					<th>#</th>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Mobile</th>
					<th>Date</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 1;
				while ($row = mysqli_fetch_assoc($res)) { ?>
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $row['id'] ?></td>
						<td><?php echo $row['name'] ?></td>
						<td><?php echo $row['email'] ?></td>
						<td><?php echo $row['mobile'] ?></td>
						<td><?php echo $row['added_on'] ?></td>
						<td>
							<?php
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