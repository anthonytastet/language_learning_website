<?php session_start(); ?>

<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='./src/css/style.css<?= '?v='.time() ?>'/>
    <title><?= $pageTitle ?? "Mon site" ?></title>
</head>
<body>
    <header class='header'>

        <div class="header__content <?php if($_GET["page"] == "sign_in"){echo "header__content--danger";}else if($_GET["page"] == "sign_up"){echo "header__content--warning";} ?>">
        
            <div class='header__content__left'>

                <span class="header__logo">LOGO</span>

                <nav class='header__nav'>
                    <?php
                            echo "
                                <a class='header__nav__item' href='./index.php'>Accueil</a>
                                <a class='header__nav__item' href='./index.php?page=courses&content=Cours'>Cours</a>
                                <a class='header__nav__item' href='./index.php?page=exercises&content=Exercice'>Exercices</a>
                                <a class='header__nav__item' href='./index.php?page=about'>A propos</a>
                                <a class='header__nav__item' href='./index.php?page=contact'>Contact</a>
                            ";

                            if($_SESSION["user"]["permissions"] == "admin"){

                                echo "

                                    <a class='header__nav__item' href='./index.php?page=admin'>Admin</a>
                                ";
                            }
                    ?>
                </nav>

                    </div>

            <div class="header__content__right">

                <div class="header__user">
                    <a class="a--bright" href="index.php?page=user"><?php echo $_SESSION["user"]["login"]; ?></a>
                </div>

                <div class="header__auth">
                    <?php
                        if(!$_SESSION["user"]){

                            echo 
                            "
                                <a href='./index.php?page=sign_up'>Inscription</a>
                                <a href='./index.php?page=sign_in'>Connexion</a>
                            ";
                        }

                        if($_SESSION["user"]){

                            echo "
                                <a href='index.php?page=sign_out' class='btn btn--warning'>Déconnexion</a>
                            ";
                        }
                    ?>
                </div>

            </div>
            
        </div>

    </header>

    <main class='main'>