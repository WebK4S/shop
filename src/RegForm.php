<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Sklep;

/**
 * Description of RegForm
 *
 * @author kamil
 */
class RegForm extends Form {
    
    private $name;
    private $password;
    private $password_2;
    private $mail;
    private $phone;
    private $adress;
    
    public function setName($name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }
    
    
    public function setPassword($password){
        $this->password = $password;
    }
    public function getPassword(){
        return $this->password;
    }
    
    
    public function setPassword2($password){
        $this->password_2 = $password;
    }
    public function getPassword2(){
        return $this->password_2;
    }
    
    
    public function setMail($mail){
        $this->mail = $mail;
    }
    public function getMail(){
        return $this->mail;
    }
    
    
    public function setPhone($phone){
        $this->phone = $phone;
    }
    public function getPhone(){
        return $this->phone;
    }
    
    
    public function setAdress($adress){
        $this->adress = $adress;
    }
    public function getAdress(){
        return $this->adress;
    }
    
    
}
