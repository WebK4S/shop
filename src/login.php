<?php
require_once 'LogForm.php';
require_once 'DBConnect.php';
require_once 'connect.php';
use Sklep\DBConnect;
use Sklep\LogForm;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



$LogForm = new LogForm;
$LogForm->setLogin($_POST['login']);
$LogForm->setPassword($_POST['password']);


$DBconnect = new DBConnect($username, $password);
if($DBconnect->loginIn($LogForm)){
    //Dla zalogowanego
    header('location:../index.php');
    session_start();
    $_SESSION['logged_in'] = true;
}
