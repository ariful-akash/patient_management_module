<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$ss = $_SESSION['akash'];
if (!isset($ss)) {
    header("Location:index.php");
}
?>


<!DOCTYPE html>
<html>
    <head>

        <title>Patient</title>
        <link href="style/mystyle.css" rel="stylesheet" type="text/css"/>

        <link rel="shortcut icon" type="image" href="images/logo.png" />

        <link href="style/w3.css" rel="stylesheet" type="text/css"/>

        <link href="style/w3-theme-light-green.css" rel="stylesheet" type="text/css"/>


    </head>
    <body class="w3-theme-light">
        <div class="navbar container w3-theme-l1 w3-row">
            <a href="home.php">
                <img class="nev-img" src="images/logo.PNG" height="100%" alt="leave-small"/>
                <span class=" nev-left menu-item w3-hover-text-black" onclick="">MediCare</span>
            </a>
            <div class="navbar-menu">
                <a style="text-decoration: none;" href="home.php"><span class=" menu-item w3-hover-text-red w3-text-dark-gray" onclick="">Home</span></a>
                <a style="text-decoration: none;" href="history.php"><span class=" menu-item w3-hover-text-red w3-text-dark-gray" onclick="">My History</span></a>

                <span class="menu-item w3-hover-text-black" onclick=""><?= strtoupper($ss) ?></span>
                <a href="logout.php" style="text-decoration: none;"><span class="menu-item w3-hover-text-red w3-text-dark-gray">Logout</span></a>
            </div>
        </div>


    </body>
</html>


