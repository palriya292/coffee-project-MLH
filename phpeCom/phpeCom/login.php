<?php 
require('top.php');
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']=='yes'){
	?>
	<script>
	window.location.href='my_order.php';
	</script>
	<?php
}
?>
<link rel="stylesheet" href="../css/contact.css"/>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<style>
.row{
    display:grid;
    grid-template-columns:1fr 1fr;
    grid-gap:3em;
    margin:3em;
}

.field_error{
    color:red;
    position:relative;
    bottom:20px;
}
</style>
<body>
    <div class="row">
        <div class="col"><div class="form-group">
        <h3>Login</h3>
          <form method="post">
          <input type="email" name="login_email" id="login_email" placeholder="email*" class="form-control"/>
          <span class="field_error" id="login_email_error"></span>
          <input type="password" name="login_password" id="login_password" placeholder="password*" class="form-control"/>
          <span class="field_error" id="login_password_error"></span>
          <input type="button" id="btnloginsubmit" onclick="user_login()" value="login" class="submit-btn btn"/>
          </div>
          </form>
          <div class="login_msg"><p style="color:red; position:relative; left:22px;" class="field_error"></p></div>
        </div>


        <div class="col register-form"><div class="form-group">
        <h3>Register</h3>
          <form method="post">
          <input type="text" id="name" placeholder="name*" class="form-control"/>
          <span class="field_error" id="name_error"></span>

          <input type="email" id="email" placeholder="email*" class="form-control"/>
          <span class="field_error" id="email_error"></span>

          <input type="text" id="mobile" placeholder="mobile*" class="form-control"/>
          <span class="field_error" id="mobile_error"></span>

          <input type="password" id="password" placeholder="password*" class="form-control"/>
          <span class="field_error" id="password_error"></span>
          
          <input type="button" id="btnregister" onclick="user_register()" value="register" class="submit-btn btn"/>
          </div>
          
          </form>
          <div class="register_msg" style="position: relative; left: 30px; top : 20px;"><p class="field_error"></p></div>
        </div>    
    </div>
    <script type="text/javascript" src="../javascript/register.js"></script>
    <script type="text/javascript" src="../javascript/mobile.js"></script>
    
    
</body>

<?php require('footer-products.php')?>