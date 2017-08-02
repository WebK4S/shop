<?php
require 'connect.php';
use Sklep\DBConnect;

$DBconnect = new DBConnect($username, $password);
$result = $DBconnect->listCategory();
?>



    <form name="addProduct" action="src/addProduct.php" method="POST">
        <input type="text" name="name" placeholder="Name" /><br>
        <select name="cat">
            <?php 
            foreach ($result as $value) {
                 echo "<option value='".$value['name']."'>".$value['name']."</option>";
            }
            ?>
        </select><br>
        <textarea name="description" rows="4" cols="20" placeholder="Description"></textarea><br>
        <input type="number" name="price" value="" placeholder="Price"/><br>
        <input type="submit" name="addprod" value="Add Product"/><br>
    </form>

<?php
    if($_SESSION['add_prod']){
        echo 'Product added';
        unset($_SESSION['add_prod']);
    }
?>