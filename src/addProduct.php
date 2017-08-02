<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'Validator.php';
require 'Product.php';
require 'DBConnect.php';
require 'connect.php';

use Sklep\Product;
use Sklep\DBConnect;

$min = 3 ;
$max = 25;
$Product = new Product;

$DBconnect = new DBConnect($username, $password);
$Product->setCategoryName($_POST['cat']);
$Product->setCategoryId();
$Product->setName($_POST['name'], $min, $max);
$Product->setDescription($_POST['description'], 3, 1000);
$Product->setPrice($_POST['price']);
if($Product->isValid()){
    var_dump($DBconnect);
    var_dump($Product);
    $DBconnect->addProduct($Product);    
    session_start();
    $_SESSION['add_prod'] = true;
    
    header("location:../index.php?action=addProduct");
    
    
}
