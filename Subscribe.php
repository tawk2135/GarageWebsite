<?php
include 'fonctions.php';
getheader("Subscription");
include 'foncSubscribe.php';
navigationBar();?>
<form method="post"  style=" background-color:black; /* For browsers that do not support gradients */
  background-image: linear-gradient(to right, grey , white);" name="subform" >
  <fieldset>
      <legend><h3>Subscription Form</h3></legend>
    <div class="form-group">
         
        <label class="col-form-label-lg" for="exampleInputEmail1">E-mail</label>
        <input type="email" required name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="E-mail">
        <small id="emailHelp" style="color: black;" class="form-text ">We will never share your e-mail</small>
    </div>
    <div class="form-group">
        <label class="col-form-label-lg"  for="exampleInputPassword1">Password</label>
        <input required type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
    </div>
      <div class="form-group">
          <label class="col-form-label-lg" class="col-form-label-lg">Firstname</label>
          <input required type="text"  class="form-control" name="firstname" id="firstname" placeholder="Firstname"/>
          <label required class="col-form-label-lg">Lastname</label>
          <input required type="text" name="lastname" class="form-control" id="lastname" placeholder="Lastname">
          <label class="col-form-label-lg">Adress</label>
          <input required type="text" name="adress" class="form-control" id="adresse" placeholder="Civic Number and Street">
          <label class="col-form-label-lg">City</label>
        <select required name="city" class="form-control" id="exampleSelect1" >
        <?php citypick();?>
      </select>
          
           <label class="col-form-label-lg">Province</label>
            <input required type="text" name="province" placeholder="Province" id="Province" class="form-control">
           <label class="col-form-label-lg">Code Postal</label>
           <input required type="text" name="postalcode" placeholder="Postal Code" id="CodePostal" class="form-control">
           <label  class="col-form-label-lg">Phone Number</label>
           
           <input required type="tel" name="Tel" placeholder="(999)-999-9999" class="form-control">
            <label  class="col-form-label-lg" name='vin2' >VIN(VEHICULE IDENTIFICATION NUMBER):<?php if(isset($_POST['vin'])){echo $_POST['vin']; } ?> </label>
      <input type="text" oninput="validateVin()"   required name="vin" class="form-control" id="vinnumber" minlength="11" maxlength="17" placeholder="VIN">
      </div>
   
        
      <button type="submit" id="submit" name="register" class="btn btn-primary">Submit</button>
   <?php addClient(); ?>
  </fieldset>
    
</form>
<?php footer() ?>
