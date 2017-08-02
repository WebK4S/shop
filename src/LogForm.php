<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Sklep;

/**
 * Description of LogForm
 *
 * @author kamil
 */
class LogForm {
    
    private $login ;
    private $password;
    private $loggedIn = false;
    



    /*
     * Setters and getters 
     */
    public function setLogin ($login){
        return $this->login = $login;
    }
    public function getLogin (){
        return $this->login;
    }
    public function setPassword ($password){
        return $this->password = $password;
    }
    public function getPassword(){
        return $this->password;
    }
    
    public function setLogged($value){
        return $this->loggedIn = $value;
    }
    public function isLogged(){
        return $this->loggedIn;
    }
    
}
