<?php
require('top.inc.php');
$categories = '';
$msg = 'All set!';
if (isset($_GET['id']) && $_GET['id'] != '') {
	$id = get_safe_value($con, $_GET['id']);
	$res = mysqli_query($con, "select * from categories where id='$id'");
	$check = mysqli_num_rows($res);
	if ($check > 0) {
		$row = mysqli_fetch_assoc($res);
		$categories = $row['categories'];
	} else {
		header('location:categories.php');
		die();
	}
}

if (isset($_POST['submit'])) {
	$categories = get_safe_value($con, $_POST['categoies']);
	$res = mysqli_query($con, "select * from categories where categories='$categories'");
	$check = mysqli_num_rows($res);
	if ($check > 0) {
		if (isset($_GET['id']) && $_GET['id'] != '') {
			$getData = mysqli_fetch_assoc($res);
			if ($id == $getData['id']) {
			} else {
				$msg = "Categories already exist";
			}
		} else {
			$msg = "Categories already exist";
		}
	}

	if ($msg == '') {
		if (isset($_GET['id']) && $_GET['id'] != '') {
			mysqli_query($con, "update categories set categories='$categories' where id='$id'");
		} else {
			mysqli_query($con, "insert into categories(categories,status) values('$categories','1')");
		}
		header('location:categories.php');
		die();
	}
}
?>
<section id="new" class="main-display new-category">
	<div class="heading">
		<h2>Add new Category</h2>
		<a href="categories.php">Cancel</a>
	</div>
	<div class="main-display-content">
		<form method="post" class="form">
			<h4>New Category Form</h4>
			<label type="Categories">
				<input id="new-category" type="text" name="categories" placeholder="Enter category name" value="<?php echo $categories ?>">
			</label>

			<button type="submit">Submit</button>
			<div class="error"><span><?php echo $msg ?></span></div>
		</form>
	</div>
	<?php
	require('footer.inc.php');
	?>