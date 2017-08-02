<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Sklep</title>
        <link rel="stylesheet" href="res/css/style.css">
    </head>
    <body>
        <header>
            <div id="logo" class="head">
                <h1>
                     <a href="index.php">Sklep</a>
                </h1>
            </div>
            <div id="login" class="head">
                <?php
                session_start();
                IF(!$_SESSION['logged_in']):
                ?>
                <form action="src/login.php" method="POST">
                    <input type="text" name="login" placeholder="Login" required="required"/>                   
                    <br>
                    <input  type="password" name="password" placeholder="Password" required="required"  />
                    <br>
                    <input type="submit" value="Zaloguj"/>
                </form>
                <a href="index.php?action=registration">Rejestracja</a>
                <?php
                    
                ENDIF;
                if($_SESSION['logged_in']) {
                    echo "<a href='src/logout.php'>Logout</a><br>";
                    echo "<a href='index.php?action=userpanel'>Panel użytkownika</a><br>";
                }
                ?>
                <a href="index.php?action=admin">admin</a>
            </div>
        </header>
        <nav>
            <h4>Nav Title</h4>
            <ul class="nav">
                <li><a href="#">Link1</a></li>
                <li><a href="#">Link1</a></li>
                <li><a href="#">Link1</a></li>
                <li><a href="#">Link1</a></li> 
            </ul>
        </nav>
        <aside>
            <div class="menu">
                    <ul class="menu-list">
                        <?php include 'src/sideMenu.php' ?>
                    </ul>
            </div>
        </aside>
        <main>
            <div class="content">
            <?php
                switch ($_GET['action']){
               
                    case "admin":
                        include 'src/admin/admin.php';
                        break;
                    case "addcat":
                        include 'src/admin/addcat.php';
                        break;
                    case "addprod":
                        include 'src/admin/addproduct.php';
                        break;
                    case "registration":
                        include 'src/registration.php';
                        break;
                    case "userpanel":
                        include 'src/userpanel.php';
                        break;
                    case "addProduct":
                        include 'src/addprod.php';
                        break;
                    case "view":
                        include 'src/view.php';
                        break;
                }
            ?>
           </div>
        </main>
        
        <footer>
            <p>
                Designed by WebK4S
            </p>
        </footer>
    </body>
</html>
