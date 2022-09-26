<?php include_once("./views/layout/header.php"); ?>
<?php if($_SESSION["user"]["permissions"] == "admin") { ?>

<h1 class="h1">Admin - Modifier Catégorie</h1>

<section class="section">
    <p class="p">Ceci est la page de modification de la catégorie.</p>
</section>

<?php
    echo "<pre>";
    // print_r($_POST["id"]);
    echo "</pre>";
?>

<?php
    echo "
        <form method='POST' class='form' autocomplete='off'>

            <fieldset class='form__fieldset'>
                <legend class='form__fieldset__legend'>Modification de la catégorie</legend>

                <input class='input' type='hidden' name='category_id' value='".$category["id"]."'>
                <input class='input' type='text' name='category_name' required value='".$category["name"]."'>

            </fieldset>

            <input class='btn btn--primary' type='submit' name='update_category' value='Enregistrer'>

        </form>
    ";
?>

<?php } ?>
<?php include_once("./views/layout/footer.php"); ?>