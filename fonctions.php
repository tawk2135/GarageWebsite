<?php

function getheader($title)
{
    try {
        session_start();
        header("Content-Type:text/html; charset=utf-8")
        ?>
        <!DOCTYPE html>
        <head>
        <body>

           
            <script src="javascript/javafonction.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="css/bootstrap.css">
             <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
               </head>
               
<?php
function navigationBar(){
    ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand"   href="index.php"><img id="logo" src=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor03">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
          <a class="nav-link" href="index.php">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="carForm.php">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
       <li class="nav-item">
           <a class="nav-link" href="Subscribe.php">Subscribe</a>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">List of services offered</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Oil change</a>
          <a class="dropdown-item" href="#">Fix Brakes</a>
          <a class="dropdown-item" href="#">Change tires</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="Subscribe.php">Subscribe</a>
        </div>
      </li>
      <script> asyncMeth().catch (error=>{console.log('error');console.error(error);}); fetchSomething(); </script>
       <li class="nav-item">
           <a href="Login.php"> <button type="button" class="btn btn-secondary" style="background-color: lightgrey; color: black;">Login</button></a>
      </li>
          <li class="nav-item">
              <button type="button" class="btn btn-secondary" hidden style="background-color: lightgrey; color: black;">Log out</button>      </li>
   </ul>
 </div>
</nav>
                <!--Container under the navbar -->
        <div class="container-fluid">
              <a href="tel:514-608-7128"><img src="images/phone.jpg"></a>
        <a href="https://www.facebook.com/pneusetmechanicmobile"><img src="images/facebooklogo.png"></a>
        <a href="mailto:shawn_barq@hotmail.com? subject= car repair"><img id="email1" src=""></a>
        <button type="button" style="margin: 10px; margin-left: 180px;" class="btn btn-danger">WHY US?</button>
        <button type="button" style="margin: 10px;" class="btn btn-danger">GET A FREE QUOTE</button>
        <button type="button" class="btn btn-danger" style="margin: 10px;">MAINTENANCE</button>
        <button type="button" class="btn btn-danger" style="margin: 10px;">TIRES</button>
        <button type="button" class="btn btn-danger" style="margin: 10px;">FLUIDS</button>
        <button type="button" class="btn btn-danger" style="margin: 10px;"><a  style="color: white"href='<?php if(isset($_SESSION['firstname'])){echo 'appointmentForm.php';} else{echo 'Login.php';}?>' > NEW APPOINTMENT</a></button>
</div>
               <?php
               function footer()
               {
                    echo"<hr><footer>
            
            <p>&copy;";
                echo date("Y");
                echo" PNEUS ET MECHANICS</p>

        </footer>
    </div>

</body></html>";
               }
}
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }

}