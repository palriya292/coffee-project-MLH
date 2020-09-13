<?php 
require('categories-top.php');
?>

<style>
table{
    border-collapse: collapse;
}

table, th, td {
  border: 1px solid black;
}

.table-content{
    margin:20px;
}

table{
    width:100%;
    text-align:center;
    
}

ul{
    list-style-type:none;
}

img{
    padding:10px;
}

.bradcaump-inner{
    background:#ececec;
    height:50px;
    line-height:50px;
    font-size:20px;
    padding-left:20px;
}

.buttons-cart--inner{
    padding:20px;
    background:#ececec;
    font-size:20px;
}

a{
    text-decoration:none;
}

.box-qty{
    width:50px;
    height:30px;
    text-align:center;
    background:#ececec;
    border:none;
}
.img-size{
    width: 200px;
    height: 356px;
}

</style>

 <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor">></span>
                                  <span class="breadcrumb-item active">shopping cart</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">products</th>
                                            <th class="product-name">name of products</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										if(isset($_SESSION['cart'])){
											foreach($_SESSION['cart'] as $key=>$val){
											$productArr=get_product($con,'','',$key);
											$pname=$productArr[0]['name'];
											$mrp=$productArr[0]['mrp'];
											$price=$productArr[0]['price'];
											$image=$productArr[0]['image'];
											$qty=$val['qty'];
											?>
											<tr>
												<td ><a href="#"><img class="img-size" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>"  /></a></td>
												<td class="product-name"><a href="#"><?php echo $pname?></a>
													<ul  class="pro__prize">
														<li class="old__prize"><strong>MRP: </strong>₹<?php echo $mrp?></li>
														<li><strong>PRICE: </strong>₹<?php echo $price?></li>
													</ul>
												</td>
												<td class="product-price"><span class="amount">₹<?php echo $price?></span></td>
												<td class="product-quantity"><input class="box-qty" type="number" id="<?php echo $key?>qty" value="<?php echo $qty?>" />
												<br/><br/>
                                                <button style="height:30px; width:70px;"><a style="color:black; background:#ececec;" href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','update')">update</a></button>
												</td>
												<td class="product-subtotal">₹<?php echo  $qty*$price?></td>
												<td class="product-remove"><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i style="color:black" class="fa fa-trash fa-2x"></i></a></td>
											</tr>
											<?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="buttons-cart--inner">
                                        <div class="buttons-cart">
                                            <a class="continue_shopping" href="<?php echo SITE_PATH?>">Continue Shopping</a>
                                        </div>
                                        <div class="buttons-cart checkout--btn">
                                            <a class="checkout" href="<?php echo SITE_PATH?>checkout.php">checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        
										
<?php require('footer-products.php')?>        