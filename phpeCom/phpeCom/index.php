<?php require('top.php');?>


<div class="pimg1">
    <div class="ptext">
      <span class="border">
        
        KCROASTERS
      </span>
    </div>
  </div>

  <section class="section section-light" ">
    <h2 style="padding-bottom: 20px;">Our Heritage</h2>
    <p>Every day, we go to work hoping to do two things: share great coffee with our friends and help make the world a little better. It was true when the first Starbucks opened in 1971, and it’s just as true today.</p>
    <p>Back then, the company was a single store in Seattle’s historic Pike Place Market.</p>
    <p>In 1981, Howard Schultz (Starbucks chairman and chief executive officer) had first walked into a Starbucks store. From his first cup of Sumatra, Howard was drawn into Starbucks and joined a year later.</p>
    <p>In 1983, Howard traveled to Italy and became captivated with Italian coffee bars and the romance of the coffee experience. He had a vision to bring the Italian coffeehouse tradition back to the United States.</p>
    <p>From the beginning, Starbucks set out to be a different kind of company. One that not only celebrated coffee and the rich tradition, but that also brought a feeling of connection.</p>
    <p>From the beginning, Starbucks set out to be a different kind of company. One that not only celebrated coffee and the rich tradition, but that also brought a feeling of connection.</p>
  </section>

  <div class="pimg2">
    <div class="ptext">
        <div style="align-self: center; position: relative; bottom: 150px;"><img src="https://cbtl-images.s3.us-west-1.amazonaws.com/Production/Drupal/s3fs-public/cta-block/icon/shop_coffee_icon_0.png"/></div>
        <span class="border trans" style="align-self: center; position: relative; bottom: 150px;">
        <a href="#" style="color: white; text-decoration:none">shop coffee</a>
        
      </span>
    </div>
  </div>

  <section class="section section-dark">
  <span style="position:relative; color:white; font-size:30px">NEW ARRIVALS</span>

<main>
  <ul style="list-style-type:none; display:grid; grid-template-columns:1fr 1fr 1fr 1fr; grid-gap:10px; margin:20px; position:relative;">

  <?php
      $get_product=get_product($con,4);
      foreach($get_product as $list){
  ?>

      <li>
          <a href="#">
              <figure>
              <a href="product.php?id=<?php echo $list['id']?>">
                  <img style="height:200px; width:200px;" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images">
              </a>
                  <figcaption >
                      <h3 style="color:white; font-size:30px"><?php echo $list['name']?></h3>
                      <p style="color:white; font-size:20px; ">MRP: <?php echo $list['mrp']?></p>
                      <p style="color:white; font-size:20px; ">Price: <?php echo $list['price']?></p>
                  </figcaption>
              </figure>
          </a>
      </li>
      <?php } ?>
      </ul>
      
</main>
  </section>

  <div class="pimg3">
    <div class="ptext" style="font-size:20px; color:white; position:relative; top:80px;">
    <h2>Employment</h2>
    <p>Farmers are encouraged to join us and we'll provide all necessary tools and monetary funding to end poverty. Giving jobs to the needful and filling happiness with each sip of our customers is the main priority of our company.
     </p><br/>
     <p>Our branches in India</p>
     <ul style="display: inline-flex; list-style-type: none;">
         <li style="padding: 10px;">Maharashtra</li>
         <li style="padding: 10px;">Gujarat</li>
         <li style="padding: 10px;">Delhi</li>
         <li style="padding: 10px;">Bangalore</li>
         <li style="padding: 10px;">West Bengal</li>
         <li style="padding: 10px;">Karnataka</li>
     </ul>
    </div>
  </div>

  <?php require('footer.php');?>