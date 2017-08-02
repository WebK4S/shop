<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Sklep;
use PDO;
/**
 * Description of DBConnect
 *
 * @author kamil
 */
class DBConnect{
    private $username;
    private $password;
    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }
    
    public function connect(){
        $db = new \PDO("mysql:host=localhost;dbname=sklep", $this->username, $this->password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
    /*
     * Checking if the login is in database
     */
    public function checkLogin($login){
        try {
           
            $db = $this->connect(); 
            $stmt = $db->prepare("SELECT * FROM users where username = :login");
            $stmt->bindParam(':login', $login);
            $stmt->execute();
            $result = $stmt->fetchAll();
            if(count($result)==0){     
                return $_SESSION['checkLogin'] = true;
            }
            else{
                echo 'login juz jest';
                return $_SESSION['checkLogin'] = false;
            }
            
        } 
        catch (Exception $ex) {
            echo 'Error'.$ex;
        }   
    }
    /*
     * Checking if the email is in database
     */
    public function checkMail($mail){
        try{
            $db = $this->connect();
            $stmt = $db->prepare("SELECT * FROM users WHERE mail = :mail");
            $stmt->bindParam(':mail', $mail);
            $stmt->execute();
            $result = $stmt->fetchAll();
            if(count($result)==0){
                return true;
            }
            else{
                echo 'email juz jest';
                return false;
            }
        }
        catch (Exception $ex){
            echo "Error".$ex;
        }
    }
    /*
     * @ $regValid - object of RegValidator class
     */
    public function registration(RegValidator $regValid){
       
        try{
            $db = $this->connect();
            $stmt = $db->prepare("INSERT INTO users VALUES(NULL, :username, :password, :mail, :phone, :adress)");
            $stmt->bindParam(':username', $regValid->getName());
            $stmt->bindParam(':password', $regValid->getPassword());
            $stmt->bindParam(':mail', $regValid->getMail());
            $stmt->bindParam(':phone', $regValid->getPhone());
            $stmt->bindParam(':adress', $regValid->getAdress());
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
            
        } 
        catch (Exception $ex) {
            echo 'Error'.$ex;
            return false;
        }
        
        
    }
    public function loginIn(LogForm $LogForm){
        try{
            $db = $this->connect();
            $stmt = $db->prepare("SELECT password FROM users WHERE username = :login");
            $stmt->bindParam(':login', $LogForm->getLogin());
            $stmt->execute();
            $result = $stmt->fetchAll();
            if(count($result)!=1){
                return false;
            }
            else{
                if(password_verify($LogForm->getPassword(),$result['0']['password'])){
                    $LogForm->setLogged(TRUE);
                    return TRUE;
                }
                else {
                    return FALSE;
                }
            }
        }  
        catch (Exception $ex){
            echo "Error".$ex;
        }
    }
    public function addCategory(Category $Category){
        try {
            $db = $this->connect();
            $stmt = $db->prepare("INSERT INTO categories VALUES(NULL, :name)");
            $stmt->bindParam(':name', $Category->getName());
            if($stmt->execute()){
                return TRUE;
            }
            else{
                return FALSE;
            }
        } 
        catch (Exception $ex) {
            echo 'Error :'.$ex;
        }
    }
    public function listCategory(){
        try{
            $db = $this->connect();
            $stmt = $db->prepare("SELECT name FROM categories");
            if($stmt->execute()){
                $result = $stmt->fetchAll();
                return $result;
            }
        } catch (Exception $ex) {
            echo 'Error'. $ex;
        }
    }
    public function addProduct(Product $product){
        try{
            $db = $this->connect();
            $stmt = $db->prepare("INSERT INTO products VALUES (NULL, :catid, :name, :description, :price )");
            $stmt->bindParam(':catid', $product->getCategoryId());
            $stmt->bindParam(':name', $product->getName());
            $stmt->bindParam(':description', $product->getDescription());
            $stmt->bindParam(':price', $product->getPrice());
            var_dump($stmt);
            if($stmt->execute()){
                return TRUE;
            }
            else {
                return FALSE;
            }
            
        } catch (Exception $ex) {
            echo "Error". $ex;
        }
    }
}