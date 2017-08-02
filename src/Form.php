<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of form
 *
 * @author kamil
 */
namespace Sklep;

class Form {
    
    protected $valid = true;
    
    public function isValid(){
        return $this->valid;
    }
    
    
}
