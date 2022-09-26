<?php include_once("./views/layout/header.php"); ?>
<?php if($_SESSION["user"]["permissions"] == "admin") { ?>

<h1 class="h1">Admin - Créer Catégorie</h1>

<section class="section">
    <p class="p">Ceci est la page de création de catégorie.</p>
</section>

<?php
    echo "<pre>";
    // print_r($_POST);
    echo "</pre>";
?>

<?php
    echo "
        <form method='POST' class='form' autocomplete='off'>

            <fieldset class='form__fieldset categories'>
                <legend class='form__fieldset__legend'>Création de la catégorie</legend>

                <input class='input' type='text' name='category_name' placeholder='Nom de la catégorie' required>

            </fieldset>

            <input class='btn btn--primary' type='submit' name='create_category' value='Enregistrer'>

        </form>
    ";
?>

<?php } ?>
<?php include_once("./views/layout/footer.php"); ?>