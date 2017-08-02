<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Sklep\DBConnect;


namespace Sklep;

/**
 * Description of Product
 *
 * @author kamil
 */

class Product extends Validator{
    private $name;
    private $category_name;
    private $category_id;
    private $description;
    private $price;
    
    public function getName(){
        return $this->name;
    }
    public function setName($name, $min, $max){
        if($this->textValid($name, $min, $max)){
            return $this->name = $name;
        }
        else {
            return false;
        }
        
    }
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description, $min ,$max){
        if($this->textValid($description, $min, $max)){
            return $this->description = $description;
        }
        else {
            return false;
        }
    }
    public function getPrice(){
        return $this->price;
    }
    public function setPrice($price){
        if ($this->priceValid($price)){
            return $this->price = $price;
        }
    }
    public function getCategoryName(){
        return $this->category_name;
    }
    public function setCategoryName($category_name){
        return $this->category_name = $category_name;
    }
    public function getCategoryId(){
        return $this->category_id;
    }
    public function setCategoryId(){
        include 'connect.php';
        $DBConnect = new DBConnect($username, $password);
        $db = $DBConnect->connect();
        $stmt = $db->prepare("SELECT DISTINCT id FROM categories WHERE name=:name");
        $stmt->bindParam(':name', $this->category_name);
        
        if ($stmt->execute()){
            $result = $stmt->fetchAll();
            return $this->category_id=$result[0]['id'];
        }
    }
    public function showProducts($category_name, $orderby, $ordering){
        require 'connect.php';
        
        $this->setCategoryName($category_name);
        $this->setCategoryId();  
        $DBConnect = new DBConnect($username, $password);
        $db = $DBConnect->connect();
        $stmt = $db->prepare("SELECT * FROM products WHERE cat_id = :category_id ORDER BY $orderby $ordering");
        $stmt->bindParam(':category_id', $this->getCategoryId());
        //$stmt->bindParam(':ordering', $ordering);
        if($stmt->execute()){
            
            return $result = $stmt->fetchAll();
        }
    }
    
}
