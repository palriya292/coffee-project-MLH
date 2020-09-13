<!-- Top include file -->
<?php
require('connection.inc.php');
require('functions.inc.php');
if (isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN'] != '') {
} else {
   header('location:login.php');
   die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://fonts.googleapis.com/css2?family=Courier+Prime&family=Noto+Sans&family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet">
   <title>Admin - KCROASTERS</title>

   <!-- CAUTION: only for development purpose -->
   <!-- <script>
      setInterval(function() {
         location.reload(true);
      }, 5000);
   </script> -->
   <!-- CAUTION: only for development purpose -->

   <style>
      /* GLOBAL */
      :root {
         /* Color */
         --blue: #4E82FA;
         --dark-blue: #212A39;
         --gray: #A6AAB4;
         --gray-light: #F5F6FA;
         --white: #FFFFFF;
         /* Fonts */
         --heading: 'Noto Sans JP', sans-serif;
         --content: 'Noto Sans', sans-serif;
         --key: 'Courier Prime', monospace;
         /* Border */
         --default-border: 1px solid #e5e9f2;
         --default-radius: 10px;
      }

      * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
         font-family: var(--content);
      }

      .icon {
         width: 20px;
      }
      .menu-icon{
         width: 30px;
      }
      .button {
         text-decoration: none;
         font-family: var(--key);
         color: var(--white);
         background-color: var(--gray);
         padding: 3px;
         margin: 0 2px;
         border-radius: 5px;
         border: var(--default-border);
      }

      .btn-danger {
         background-color: red;
      }

      .btn-ok {
         background-color: green;
      }

      .btn-cool {
         background-color: var(--blue);
      }

      /* The Wrapper */
      .wrapper {
         display: flex;
         flex-direction: row;
         height: 100vh;
         overflow: hidden;
      }

      /* The Sidebar */
      .sidebar {
         flex: 0 0 200px;
         background-color: var(--dark-blue);
      }

      .logo {
         width: 200px;
      }

      .mobile-header>.ham {
         display: none;
      }

      header {
         display: flex;
         flex-direction: column;
         align-items: center;
      }

      .welcome {
         font-family: var(--heading);
         display: flex;
         justify-content: space-evenly;
         width: 75%;
         align-items: center;
         color: var(--white);
         padding: 25px 0;
      }

      .user {
         display: flex;
         align-items: center;
      }

      .user>img {
         width: 35px;
      }

      .user>p {
         padding-left: 5px;
      }

      .main-nav {
         display: flex;
         flex-direction: column;
         align-items: center;
      }

      .main-nav>a {
         text-align: center;
         width: 100%;
         margin: 5px;
         padding: 10px;
         text-decoration: none;
         color: var(--gray);
      }

      .active {
         color: var(--white) !important;
      }

      @media only screen and (max-width: 760px),
      (min-device-width: 768px) and (max-device-width: 1024px) {
         .wrapper {
            flex-direction: column;
         }

         .mobile-header {
            display: flex;
            width: 75%;
            justify-content: space-between;
            align-items: center;
         }

         .mobile-header>.ham {
            display: block;
         }

         header {
            flex-wrap: wrap;
            justify-content: space-around;
         }

         .sidebar {
            flex: 0 0 auto;
            position: absolute;
            width: 100%;
            z-index: 999;
         }

         .close {
            display: none;
         }

         .open {
            display: flex;
         }

         section {
            margin-top: 55px;
         }

         .ham {
            cursor: pointer;
         }

         #fullscreen-image {
            z-index: 10;
         }
      }

      /* The Main Display Content - Global */
      .main-display {
         background-color: var(--gray-light);
         flex: auto;
         overflow: auto;
         padding: 15px;
         display: flex;
         flex-direction: column;
         justify-content: space-between;
      }

      .main-display-content {
         padding: 0 50px;
         height: 100vh;
         overflow-y: scroll;
      }

      /* Categories - Start */
      .heading {
         display: flex;
         align-items: center;
         margin-bottom: 25px;
         background-color: var(--white);
         padding: 10px;
         border: var(--default-border);
         border-radius: var(--default-radius);
      }

      .heading>h2 {
         font-family: var(--heading);
         margin-right: 15px;
      }

      .stats {
         padding: 10px 0;
         display: flex;
      }

      .stats-card:nth-child(2) {
         margin: 0 30px;
      }

      .stats-card {
         flex: auto;
         padding: 25px;
         background-color: var(--white);
         border: var(--default-border);
         border-radius: var(--default-radius)
      }

      table {
         width: 100%;
         border-collapse: separate;
         border-spacing: 0;
      }

      th {
         background-color: var(--gray-light);
         color: black;
         font-family: var(--heading);
      }

      td {
         background-color: var(--white);
         border: var(--default-border);
      }

      tr:first-child td:first-child {
         border-top-left-radius: var(--default-radius);
      }

      tr:first-child td:last-child {
         border-top-right-radius: var(--default-radius);
      }

      tr:last-child td:first-child {
         border-bottom-left-radius: var(--default-radius);
      }

      tr:last-child td:last-child {
         border-bottom-right-radius: var(--default-radius);
      }

      td,
      th {
         padding: 15px;
         text-align: center;
      }

      @media only screen and (max-width: 1110px),
      (min-device-width: 768px) and (max-device-width: 1024px) {
         .heading {
            margin-bottom: 15px;
         }

         .main-display-content {
            padding: 10px;
         }

         .stats {
            flex-direction: column;
         }

         .stats-card:nth-child(2) {
            margin: 15px 0;
         }

         table {
            margin-top: 20px;
         }

         /* Force table to not be like tables anymore */
         table,
         thead,
         tbody,
         th,
         td,
         tr {
            display: block;
         }

         /* Hide table headers (but not display: none;, for accessibility) */
         thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
         }

         tr {
            border: var(--default-border);
            margin: 15px 0;
         }

         td {
            /* Behave  like a "row" */
            border: none;
            border-bottom: var(--default-border);
            position: relative;
            padding-left: 50%;
         }

         td:before {
            /* Now like a table header */
            position: absolute;
            /* Top/left values mimic padding */
            top: 6px;
            left: 6px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
         }

         /*
	Label the data
	*/
         #category td:nth-of-type(1):before {
            content: "#";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #category td:nth-of-type(2):before {
            content: "ID";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #category td:nth-of-type(3):before {
            content: "Categories";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #category td:nth-of-type(4):before {
            content: "Actions";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         footer {
            margin-top: 15px;
         }
      }

      /* Categories - End */

      /* Product - Start */
      #product.main-display {
         position: relative;
         overflow: hidden;
      }

      #fullscreen-image {
         display: none;
         cursor: pointer;
         position: absolute;
         width: 100%;
         height: 100%;
         top: 0;
         left: 0;
         background-color: #000000a1;
      }

      #fullscreen-image>img {
         position: absolute;
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
      }

      .product-image-wrap {
         padding: 10px;
         cursor: pointer;
      }

      .product-image {
         height: 40px;
      }

      @media only screen and (max-width: 1110px),
      (min-device-width: 768px) and (max-device-width: 1024px) {
         .product-image-wrap {
            padding: 15px;
            padding-left: 50%;
         }

         #product td:nth-of-type(1):before {
            content: "#";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #product td:nth-of-type(2):before {
            content: "ID";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #product td:nth-of-type(3):before {
            content: "Category";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #product td:nth-of-type(4):before {
            content: "Name";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #product td:nth-of-type(5):before {
            content: "Picture";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #product td:nth-of-type(6):before {
            content: "MRP";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #product td:nth-of-type(7):before {
            content: "Price";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #product td:nth-of-type(8):before {
            content: "Qty";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #product td:nth-of-type(9):before {
            content: "Actions";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }
      }

      /* Product - End */

      /* Order - Start */
      @media only screen and (max-width: 1110px),
      (min-device-width: 768px) and (max-device-width: 1024px) {
         #order td:nth-of-type(1):before {
            content: "Order ID";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #order td:nth-of-type(2):before {
            content: "Order Date";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #order td:nth-of-type(3):before {
            content: "Address";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #order td:nth-of-type(4):before {
            content: "Payment Type";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #order td:nth-of-type(5):before {
            content: "Payment Status";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #order td:nth-of-type(6):before {
            content: "Order Status";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }
      }

      /* Order - End */

      /* Users - Start */
      @media only screen and (max-width: 1110px),
      (min-device-width: 768px) and (max-device-width: 1024px) {
         #users td:nth-of-type(1):before {
            content: "#";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #users td:nth-of-type(2):before {
            content: "ID";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #users td:nth-of-type(3):before {
            content: "Name";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #users td:nth-of-type(4):before {
            content: "Email";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #users td:nth-of-type(5):before {
            content: "Mobile";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #users td:nth-of-type(6):before {
            content: "Date";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #users td:nth-of-type(7):before {
            content: "Actions";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }
      }

      /* Users - End */

      /* Support - Start */
      @media only screen and (max-width: 1110px),
      (min-device-width: 768px) and (max-device-width: 1024px) {

         #support td:nth-of-type(1):before {
            content: "#";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #support td:nth-of-type(2):before {
            content: "ID";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #support td:nth-of-type(3):before {
            content: "Name";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #support td:nth-of-type(4):before {
            content: "Email";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #support td:nth-of-type(5):before {
            content: "Mobile";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #support td:nth-of-type(6):before {
            content: "Query";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #support td:nth-of-type(7):before {
            content: "Date";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #support td:nth-of-type(8):before {
            content: "Actions";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }
      }

      /* Support - End */

      /* New Category,Product - Start */
      #new .main-display-content {
         display: flex;
         justify-content: center;
         align-items: center;
      }

      #new .form {
         width: 340px;
         height: auto;
         background: var(--white);
         border-radius: var(--default-radius);
         box-shadow: 0 0 20px -20px #000;
         padding: 30px 30px;
         padding-bottom: 50px;
         position: relative;
      }

      .new-category .form {
         align-self: center;
      }

      .new-product .form {
         align-self: flex-start;
      }

      #new h4 {
         margin: 10px 0;
         padding-bottom: 10px;
         width: 180px;
         color: var(--gray);
         border-bottom: 3px solid var(--gray);
      }

      #new input {
         width: 100%;
         padding: 10px;
         background: none;
         outline: none;
         resize: none;
         border: 0;
         transition: all 0.3s;
         border-bottom: 2px solid #bebed2;
      }

      #new input:focus {
         border-bottom: 2px solid var(--gray);
      }

      #new label:before {
         content: attr(type);
         display: block;
         margin: 28px 0 0;
         font-size: 14px;
         color: #5a5a5a;
      }

      #new button {
         float: right;
         padding: 8px 12px;
         margin: 8px 0 0;
         border: 2px solid var(--gray);
         background: 0;
         color: #5a5a6e;
         cursor: pointer;
         transition: all 0.3s;
      }

      #new button:hover {
         background: var(--gray);
         color: var(--white);
      }

      #new .error {
         content: "";
         position: absolute;
         bottom: -15px;
         right: -20px;
         background: #50505a;
         color: #fff;
         width: 320px;
         padding: 16px 4px 16px 0;
         border-radius: 6px;
         font-size: 13px;
         box-shadow: 10px 10px 20px -20px #000;
      }

      #new span {
         margin: 0 5px 0 15px;
      }

      /* New Category,Product - End */

      /* Order Detail - Start */
      @media only screen and (max-width: 1110px),
      (min-device-width: 768px) and (max-device-width: 1024px) {

         #order-detail td:nth-of-type(1):before {
            content: "Product Name";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #order-detail td:nth-of-type(2):before {
            content: "Product Image";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #order-detail td:nth-of-type(3):before {
            content: "Qty";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #order-detail td:nth-of-type(4):before {
            content: "Price";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         #order-detail td:nth-of-type(5):before {
            content: "Total Price";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         }

         /* #support td:nth-of-type(6):before {
            content: "Query";
            font-weight: bold;
            top: 50%;
            transform: translateY(-50%);
         } */
      }

      /* Order-Detail - End */

      /* Footer - Start*/
      footer {
         margin-top: 25px;
         padding: 15px 0;
         background-color: var(--white);
         border-radius: var(--default-radius);
         border: var(--default-border);
      }

      footer>p {
         margin: 0 10px;
      }

      /* Footer - End*/

      /* Custom Scroll Bar - Start*/
      .main-display-content::-webkit-scrollbar-track {
         -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
         background-color: #F5F5F5;
      }

      .main-display-content::-webkit-scrollbar {
         width: 6px;
         background-color: #F5F5F5;
      }

      .main-display-content::-webkit-scrollbar-thumb {
         background-color: #000000;
      }

      /* Custom Scroll Bar - End*/
   </style>
</head>

<body>
   <main class="wrapper">
      <aside id="sidebar" class="sidebar">
         <header>
            <div class="mobile-header">
               <a href="index.php">
                  <img class="logo" src="images/logo2.jpg" alt="Logo">
               </a>
               <a class="ham"><img src="images/menu.png" class="menu-icon" alt="Menu"></a>
            </div>
            <div class="welcome close">
               <div class="user">
                  <img src="images/logo.jpg" alt="Avatar">
                  <p>Admin</p>
               </div>
               <a href="logout.php"><img src="images/logout.png" class="icon" alt="logout"></a>
            </div>
            <nav id="main-nav" class="main-nav close">
               <a href="index.php" class="active">Dashboard</a>
               <a href="categories.php">Categories</a>
               <a href="product.php"> Products</a>
               <a href="order_master.php">Orders</a>
               <a href="users.php">Users</a>
               <a href="contact_us.php">Support</a>
            </nav>
         </header>
      </aside>