<?php include 'fonctions.php';
 getheader("Appointment");
 navigationBar();
 ?>
<form name="formulaire">
    <label> Date of appointment:</label>
    <input type="date" id="appointmentdate" name="appdate">
    <label> Time of appointment:</label>
    <input type="time" id="appointmentdate" name="appdate">
</form>
<?php footer();?>
