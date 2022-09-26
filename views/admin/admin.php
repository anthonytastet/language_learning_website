<?php include_once("./views/layout/header.php"); ?>
<?php if($_SESSION["user"]["permissions"] == "admin"){ ?>

<h1 class="h1">Admin</h1>

<?php
    echo "
        <div class='cards__container menu'>

            <div class='card'>

                <span class='card__title'>
                    <a href='index.php?page=admin_posts'>   
                        contenu
                    </a>
                </span>

            </div>

            <div class='card'>

                <span class='card__title'>
                    <a href='index.php?page=admin_categories'>
                        catégories
                    </a>
                </span>

            </div>

            <div class='card'>

                <span class='card__title'>
                    <a href='index.php?page=admin_users'>
                        utilisateurs
                    </a>
                </span>

            </div>

        </div>
    ";
?>

<?php } ?>
<?php include_once("./views/layout/footer.php"); ?>