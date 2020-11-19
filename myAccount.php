<?php include 'fonctions.php';
 include 'foncLogin.php';
 getheader('My Account');
 navigationBar();
 ?>
<hr style="color: red;">

<h1 class="header">WELOME BACK <?php echo strtoupper($_SESSION['firstname']) ." ". strtoupper($_SESSION['lastname']);  ?></h1>
<br><h2 style="font-size: 22px; color: black">Your profile:</h2>
<p>FIRSTNAME: <?php echo $_SESSION['firstname'];?></p>
<p>LASTNAME: <?php echo $_SESSION['lastname'];?></p>
<p>VIN: <?php echo $_SESSION['vin'];?></p>
<p>ADRESS: <?php echo $_SESSION['adress'];?></p>
<p>CITY: <?php echo $_SESSION['city'];?></p>
<p>PROVINCE: <?php echo $_SESSION['province'];?></p>
<p>POSTAL CODE: <?php echo $_SESSION['postalcode'];?></p>
<p>TELEPHONE NUMBER: <?php echo $_SESSION['phonenumber'];?></p>
<p>CAR MAKE: <?php echo $_SESSION['carmake'];?></p>
<p>CAR BRAND: <?php echo $_SESSION['carbrand'];?></p>
<p>YEAR MODEL: <?php echo $_SESSION['yearmodel'];?></p>

<?php footer();?>