<?php
include_once('../deconnexion.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

    <title>accueil</title>
</head>
<body>
    

    <nav>
        
        <ul class="menu">
            <li class="menu-item">
                <a href="">Accueil</a>
            </li>
            <li class="menu-item">
                <a href="">Admin</a>
                <ul class="sub-menu">
                    <li><a href="">List users</a></li>
                    <li><a href="">List roles</a></li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="">Profil</a>
                <ul class="sub-menu">
                    <li><a href="../deconnexion.php">Déconnexion</a></li>
                </ul>
            </li>
        </ul>
    </nav> <br>

<hr><br><br>