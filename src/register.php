<?php

require_once 'Form.php';
require_once 'RegForm.php';
require_once "RegValidator.php";
require_once 'DBConnect.php';
require_once 'connect.php';
use Sklep\RegValidator;
use Sklep\DBConnect;



$min = 3;
$max = 25;

$RegValidator= new RegValidator;

$RegValidator->setName($_POST['name']);
$RegValidator->setPassword($_POST['password']);
$RegValidator->setPassword2($_POST['password2']);
$RegValidator->setMail($_POST['mail']);
$RegValidator->setPhone($_POST['phone']);
$RegValidator->setAdress($_POST['adress']);

$RegValidator->textValid($RegValidator->getName(), $min, $max);
$RegValidator->passwordCompare($RegValidator->getPassword(), $RegValidator->getPassword2());
$RegValidator->passwordValid($RegValidator->getPassword(), $min, $max);
$RegValidator->mailValid($RegValidator->getMail());
$RegValidator->phoneValid($RegValidator->getPhone());


if ($RegValidator->isValid()){
   
   $DBconnect = new DBConnect($username, $password);
   if($DBconnect->checkLogin($RegValidator->getName()) AND $DBconnect->checkMail($RegValidator->getMail())){
       $DBconnect->registration($RegValidator);
   }
   
}

