<?php include 'fonctions.php';
 include 'foncSubscribe.php';
 getheader("Car Form");
 navigationBar();

 ?>
 
<form class="form-group" method="post"> 
  <div class="form-group">
      <label  class="col-form-label-lg" name='vin2' >VIN(VEHICULE IDENTIFICATION NUMBER):<?php if(isset($_SESSION['vin'])){echo $_SESSION['vin']; } ?> </label>
     <!-- <input type="text" oninput="validateVin()"   <?php hidden();?> required name="vin" class="form-control" id="vinnumber" minlength="11" maxlength="17" placeholder="VIN">-->
         <p id="demo"></p>
         <label class="col-form-label-lg">Car brand:<?php if(isset($_POST['brand'])){echo $_POST['brand']; } ?></label>
         <select class="form-control" <?php hidden2();?>  name="brand" id="brand"><option value="<?php if(isset($_POST['brand'])){ echo $_POST['brand'];}?>"></option><?php getCarBrand();?> </select>
         <br><button <?php hidden2();?>   name="search" type="submit" value="Search" class="btn btn-secondary" >Search</button><br>
    <div  class="form-group" <?php hidden3();?> >
         <label  class="col-form-label-lg">Car Model</label>
         <select name="carmake" class="form-control">
    <?php  getCarMake();?>
    </select>
     
        <label  class="col-form-label-lg"  for="exampleSelect1">The year make of the car</label>
        <select required name="Annee" class="form-control" id="exampleSelect1">
         <?php datefix(); ?>
      </select>
    
        <button name="submit"  type="submit" class="btn btn-secondary" onclick="validateForm()">Submit</button>
    <button class="btn btn-secondary" name="reset1" type="reset">Reset</button>
   <?php  addClientCar();?>
    </div>
  </div>
</form>
       
    
  <?php     footer();?>
