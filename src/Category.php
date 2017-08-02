<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Sklep;

/**
 * Description of Categories
 *
 * @author kamil
 */
class Category {
    private $name;
    
    public function getName(){
        return $this->name;
    }
    
    public function setName($name){
        if(strlen($name)<3 OR strlen($name)>30){
            return false;
        }
        elseif (!is_string($name)) {
            return false;
        }
        else{
            return $this->name = $name;   
        }
    
        
    }
   
    public function generateLink($link){
        return "index.php?action=view&category=".$link;
    }
    
}
