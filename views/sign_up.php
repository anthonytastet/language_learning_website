<?php include_once("./views/layout/header.php"); ?>

<form class='form' method='POST' autocomplete='off'>
    <fieldset class='form__fieldset'>
        <legend class='form__fieldset__legend'>Inscription</legend>

        <input class='input' type='text' name='login' placeholder='Identifiant' required>
        <input class='input' type='email' name='email' placeholder='E-mail' required>
        <input class='input' type='password' name='password' placeholder='Mot de passe' required>

    </fieldset>
    
    <div>
        <input class='btn btn--primary' type='submit' name='sign_up' value='Inscription'>
        <span >ou</span>
        <a href='index.php?page=sign_in'>Se connecter</a>
    </div>
</form>

<?php include_once("./views/layout/footer.php"); ?>