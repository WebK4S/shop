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
class Validator {
    private $isValid = true;
    
    public function isValid(){
        return $this->isValid;
    }

    public function textValid($text, $min, $max){
        
        if(strlen($text) < $min OR strlen($text) > $max ){
            
            return $this->isvalid=false;
        }
        else{
            return true;
        }
    }
    public function passwordValid($password , $min , $max){
        if(strlen($password) < $min OR strlen($password) > $max) {
            
            return $this->isValid=false ;
        }
        else{
            $this->setPassword(password_hash($password, PASSWORD_DEFAULT));
            
        }    
    }
    public function priceValid($number){
        if (!is_numeric($number)){
            return  false ;
        }
        if($number<0){
            return  false;
        }
        else {
            return true;
        }
    }
}
