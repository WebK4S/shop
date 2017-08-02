<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'Category.php';
require 'DBConnect.php';
require_once 'connect.php';
use Sklep\Category;
use Sklep\DBConnect;


$DBconnect = new DBConnect($username, $password);
$result = $DBconnect->listCategory();
$Category = new Category;

foreach ($result as $key => $value) {
    $Category->setName($value['name']);
    
    echo '<li><a href="'.$Category->generateLink($value['name']).'">'.$Category->getName().'</a></li>';
}