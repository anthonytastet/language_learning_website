<?php include_once("./views/layout/header.php"); ?>

<form class='form' method='POST' autocomplete='off'>
    <fieldset class='form__fieldset'>
        <legend class='form__fieldset__legend'>Connexion</legend>

        <input class='input' type='text' name='login' placeholder='Identifiant' required>
        <input class='input' type='password' name='password' placeholder='Mot de passe' required>

    </fieldset>
    
    <div>
        <input class='btn btn--primary' type='submit' name='sign_in' value='Se connecter'>
        <span>ou</span>
        <a href='index.php?page=sign_up'>S'inscrire</a>
    </div>

    <?php
        if($_POST["password"] && !password_verify($_POST["password"], $password)){

            echo '<div class="form__error" >L\'identifiant ou le mot de passe est erroné.</div>';
        }
    ?>
</form>

<?php include_once("./views/layout/footer.php"); ?>