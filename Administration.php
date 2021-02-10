<?php
include 'fonctions.php';
include 'foncAdmin.php';
getheader("Administration");
navigationBar();
addService();
removeService();
updateService();
?>
<h1>Administration</h1>

<hr>
<button type="submit" name="addService" onclick="addClick();" value="add service" class="btn-secondary"> Add Service</button>
<button type="submit" name="updateService" onclick="updateClick();" value="add service" class="btn-secondary">Update a Service</button>
<button type="submit" name="removeService" onclick="removeClick();" value="add service" class="btn-secondary"> Remove Service</button>
<form class="form-text" method="post" id="formAddService" style="display: none;">
    <legend>Add Service</legend>

    <label>Service Code(4 digits ex:9999)</label>
    <input type="text" name="addCode" placeholder="9999" />

    <label>Service name</label>
    <input type="text" name="addName" placeholder="Service name" style="margin-left: 30px" />

    <label>Price</label>
    <input type="number" name="addPrice" style="margin-left: 65px" placeholder="99.99" />
    <button type="submit" name="addServices">ADD</button>

</form>
<form class="form-text" method="post" id="formRemoveService" style="display: none;" >
    <legend>Remove Service</legend>

    <label>Service Code(4 digits ex:9999)</label>
    <input type="text" name="removeCode" placeholder="9999" />
<button type="submit" name="removeService">Remove</button>
</form>
<form class="form-text" method="post" id="formUpdateService" style="display: none;" >
    <legend>Update Service</legend>

    <label>Service Code(4 digits ex:9999)</label>
    <input type="text" name="updateCode" placeholder="9999" />

    <label>Service name</label>
    <input type="text" name="updateName" placeholder="Service name" style="margin-left: 30px" />

    <label>Price</label>
    <input type="number" name="updatePrice" style="margin-left: 65px" placeholder="99.99" />
    <button type="submit" name="updateServices">UPDATE</button>

</form>
<table style="width: 50%; border: 5px; alignment-baseline:  center; margin-left: 25%" >
    <tr>
        <th>Code Service</th>
        <th>Service Product</th>
        <th>Price</th>
    </tr>
    <?php getService(); ?>
</table>
<?php footer(); ?>
