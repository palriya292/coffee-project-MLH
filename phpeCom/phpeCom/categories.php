<?php 
require('categories-Top.php');
if(isset($_GET['id']) && $_GET['id']!=''){
	$cat_id=mysqli_real_escape_string($con,$_GET['id']);
	if($cat_id>0){
		$get_product=get_product($con,'',$cat_id);
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
@font-face {
  font-family: VistaSansLight;
  src: url('../css/VistaSansLight.ttf');
}

*{
    font-family: VistaSansLight;
}
</style>

<main id="content" class="main-area">
<?php if(count($get_product)>0){?>
  <ul class="cards" >

  <?php
      $get_product=get_product($con,'',$cat_id);
      foreach($get_product as $list){
  ?>

      <li class="card-item card" ">
              <figure class="card" >
              <a href="product.php?id=<?php echo $list['id']?>">
                  <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images">
              </a>
              
                  <figcaption class="caption">
                      <h3 class="caption-title" style=" font-size:25px"><?php echo $list['name']?></h3>
                      <p class="para" style=" font-size:17px; "><strong>MRP: </strong><?php echo $list['mrp']?></p>
                      <p class="para" style=" font-size:17px; "><strong>Price: </strong><?php echo $list['price']?></p>
                  </figcaption>
              </figure>
          </a>
      </li>
      <?php } ?>
      </ul>
      <?php } else { 
						echo "Data not found";
					} ?>
</main>


<?php require('footer-products.php');?>