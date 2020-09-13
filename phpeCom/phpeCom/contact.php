<?php require('top.php')?>
<link rel="stylesheet" href="../css/contact.css"/>

<header class="header">
      <div class="banner">
        <h2>over hundred years of</h2>
        <h1>kc roasters <br /></h1>
        <h3>crafted coffee</h3>
      </div>
    </header>
    <div class="content-divider"></div>
    <div class="section-centre clearfix">
        
        <!-- about info -->
        <article class="about-info">
            <!-- section title -->
            <div class="section-title">
                <h3>वार्तालाप</h3>
                <h2>kc roasters</h2>
                <h3>के साथ</h3>
            </div>
            <!-- end of section title -->
            <div class="about-text section-centre clearfix">
                <p >
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur quibusdam laborum nemo ullam obcaecati laboriosam consectetur. Magnam nesciunt recusandae odit doloremque cum, expedita aliquid consectetur consequatur! Sequi, amet illo. Dolorum perspiciatis veritatis doloremque incidunt soluta deleniti sit? In incidunt commodi, distinctio quas cumque ad possimus optio maxime et, alias fugiat!
                </p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt, voluptatibus quis! Nesciunt adipisci aliquam quam consequatur tenetur, quidem dolorum asperiores aspernatur ea. Officiis enim vero obcaecati laudantium, distinctio tenetur. Velit minus dignissimos adipisci dolores error earum, ea illum deserunt a recusandae, porro praesentium id enim eaque officiis ullam incidunt maiores ab impedit molestiae quas, quis sequi voluptas facilis? Unde dicta explicabo quibusdam in laboriosam illo harum earum facere perferendis perspiciatis, quia quis magnam, eius natus dolores accusantium cupiditate? Nam, praesentium quas ullam non facere in eius ex numquam placeat, natus rerum quaerat odio cum asperiores, voluptas exercitationem excepturi suscipit quos.</p>
                
            </div>
        </article>
    </div>
    </section>
    <!-- end of about section -->
    <!-- contact form -->
    <section class="contact">
      <div class="section-centre clearfix">
        <!-- contact info start -->
        <article class="contact-info">
          <!-- contact item -->
          <div class="contact-item">
            <h4 class="contact-title">
              <span class="contact-icon">
                <i class="fas fa-location-arrow"></i>
              </span>
              address
            </h4>
            <h4 class="contact-text">
              2300 Traverwood Dr. Ann Arbor, MI 48105
            </h4>
          </div>

          <div class="contact-item">
            <h4 class="contact-title">
              <span class="contact-icon">
                <i class="fas fa-envelope"></i>
              </span>
              email
            </h4>
            <h4 class="contact-text">
              example@email.com
            </h4>
          </div>
          <div class="contact-item">
            <h4 class="contact-title">
              <span class="contact-icon">
                <i class="fas fa-phone"></i>
              </span>
              phone
            </h4>
            <h4 class="contact-text">
              +12 345 678 910
            </h4>
          </div>
        </article>
        <!-- contact form starts -->

        <article class="contact-form">
          <h3>contact us</h3>
          <form method="post" action="#"><div class="form-group">
          <input type="text" id="name" placeholder="name" class="form-control"/>
          <input type="email" id="email" placeholder="email" class="form-control"/>
          <input type="text" id="mobile" placeholder="mobile" class="form-control"/>
          <textarea type="text" id="message" placeholder="Message" class="form-control"></textarea>
          <input type="button" id="btnsubmit" onclick="send_message()" value="submit" class="submit-btn btn"/>
          </div>
          </form>
        </article>
      </div>
    </section>
    <!-- end of contact form  -->
    <!-- footer -->
    <footer class="footer">
      <div class="section-centre">
        <div class="social-icons">
          <!-- social icon starts -->
          <a href="#" class="social-icon">
            <i class="fab fa-facebook"></i>
          </a>
          <!-- end of social icon -->
          <!-- social icon starts -->
          <a href="#" class="social-icon">
            <i class="fab fa-twitter"></i>
          </a>
          <!-- end of social icon -->
          <!-- social icon starts -->
          <a href="#" class="social-icon">
            <i class="fab fa-instagram"></i>
          </a>
          <!-- end of social icon -->
        </div>
        <h4 class="footer-text">
          &copy;<span>2020</span>
          <span class="tea">kcroasters</span>
          all rights reserved
        </h4>
      </div>
      
    </footer>
    <script type="text/javascript" src="../javascript/mobile.js"></script>
    <script type="text/javascript" src="../javascript/contact.js"></script>
    
  </body>
</html>