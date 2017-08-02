<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'Validator.php';
require 'Product.php';

 
require 'connect.php';

use Sklep\Product;


if(empty($_POST['order'])){
    $_POST['order'] = "name";
    $_POST['ordering'] = "ASC";
}
$Product = new Product;
$result = $Product->showProducts($_GET['category'], $_POST['order'], $_POST['ordering']);
include 'ordering.php';
foreach ($result as $key => $value) {
    echo '<div class="item">';
    echo '<h2>'.$value['name'].'</h2>';
    echo '<p>'.$value['description'].'</p>';
    echo '<p>'.$value['price'].'</p>';
    echo '</div>';
}
