<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Sklep;

/**
 * Description of Validator
 *
 * @author kamil
 */
class RegValidator extends RegForm{

    /**
     * @param $text
     * @param $min
     * @param $max
     * @return bool
     */
    public function textValid($text, $min, $max){
        
        if(strlen($text) < $min OR strlen($text) > $max ){
            
            return $this->valid=false;
        }
        else{
            echo 'text ok<br>';
        }
    }
    /*

     * @var $min - minimum lenght of password
     * @var $max - maximum lenght of password
           
     */
    public function passwordValid($password , $min , $max){
        if(strlen($password) < $min OR strlen($password) > $max) {
            
            return $this->valid=false ;
        }
        else{
            $this->setPassword(password_hash($password, PASSWORD_DEFAULT));
            
        }    
    }
    public function passwordCompare($password, $password2){
        if(strcmp($password, $password2)!=0){
            echo "hasla rozne<br>";
            return $this->valid = false;
            
        }
    }
    /*
     * @var $mail - mail adress to validate
     */
    public function mailValid($mail){
        if(!(filter_var($mail, FILTER_VALIDATE_EMAIL))){
            
            $this->setMail($mail);
            return $this->valid=false ;
        }
        else{
            
            echo " mail ok <br>";
        }
        
            
    }
    
    public function phoneValid($phone){
        if (!is_numeric($phone)){
            return $this->valid = false ;
         
        }
        elseif (strlen($phone) != 9) {
            return $this->valid = false ;
        }
        else{
            echo "phone ok<br>";
        }
    }
}
