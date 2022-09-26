<?php include_once("./views/layout/header.php"); ?>

<?php
    if($_SESSION["user"]["permissions"] == "utilisateur" || $_SESSION["user"]["permissions"] == "admin")
    {
?>
        <h1 class="h1">Changement du mot de passe</h1>

        <?php

            echo "<pre>";
            // print_r($user);
            echo "</pre>";

        ?>

        <form method="POST" class="form">
            <fieldset class="form__fieldset">
                <legend class="form__fieldset__legend">Changer le mot de passe</legend>

                <input class="input" type="password" name="current_password" placeholder="Mot de passe actuel">
                <input class="input" type="password" name="new_password" placeholder="Nouveau mot de passe">

                <input class="btn btn--primary" type="submit" name="change_password" value="Valider">
            </fieldset>
        </form>

        <?php

            if($_COOKIE["message"] == "success"){

                echo "
                    <div class='message message--success'>Mot de passe modifié avec succès</div>
                ";
            }

        ?>
<?php
    }
?>

<?php include_once("./views/layout/footer.php"); ?>