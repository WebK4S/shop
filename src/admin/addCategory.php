<?php
    require '../Category.php';
    require '../DBConnect.php';
    require '../connect.php';
    use Sklep\Category;
    use Sklep\DBConnect;
    

    if(isset($_POST['catname'])){
        $Category = new Category;
        $Category->setName($_POST['catname']);
        $DBconnect = new DBConnect($username, $password);
        if($DBconnect->addCategory($Category)){
            session_start();
            $_SESSION['cat_ok'] = TRUE;
            header("location:../../index.php?action=addcat");
        }
    }
