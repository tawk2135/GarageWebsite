<?php include 'fonctions.php';
 getheader("Accueil");
 navigationBar();?>

<body onload="slide();changeImage();">

    <div class="jumbotron" id="contain" style=" background-image : url('images/fixcar.jpeg'); background-size: cover; background-position: center; " >
    
    <h1 class="display-3" style="color: black; text-align: center; font-weight: bold; ">Welcome to PNEU ET MECHANIC</h1>
    <h2 style="color: black; font-weight: bold"  id="myAnimation" class="lead"><i><img width="100px" src="images/trailer.jpg"/>FINALLY, the garage who comes and fix you're car at the comfort of your own home!<img width="100px" src="images/home.jpg"/></i></h2>
  <hr class="my-4">
  <p id="slide1" style="  text-align: center;" >Yes while you rest we fix your car. GREAT SERVICE, GREAT PRICES AND MOST OF ALL WE WILL GET THE PARTS THAT YOU NEED FOR YOUR CAR.</p>
  <p class="lead">
      <a class="btn btn-primary btn-lg" onclick="display()" type="button">Learn more</a>
  <p id='show' style="display: none" >Pneux et Mechanic is a mobile garage that will come to you for your repairs so that you won't have to wait at the garage. Our customers uses our services a lot because of
  the time they save.</p>

</div>
    <div class="card-body" style="background-color: slategray">
    <h4 class="card-title">List of jobs on your car that you might need before winter</h4>
    <ol>
        <i><li>Oil change</li></i>
        <i><li>Change of tires</li></i>
        <i><li>Fill up the windshield washer tank</li></i>
        <i><li>Change the windshield wipers</li></i>
        <i><li>Anti-rust on your car</li></i>
        <i><li>Make sure battery is still good</li></i>
    </ol>
    </div>
 <a href='https://www.stat-counter.org/'></a> 
<script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/763438/t/12"></script>
<?php footer();?>
 