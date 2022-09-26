<?php include_once("./views/layout/header.php"); ?>
<?php if($_SESSION["user"]["permissions"] == "admin") { ?>

<h1 class="h1">Admin - Supprimer Catégorie</h1>

<section class="section">
    <p class="p">Êtes vous sûr de vouloir supprimer la catégorie <?= "\"".$category["name"]."\""  ?> ?</p>
</section>

<?php
echo "<pre>";
// print_r($_POST["id"]);
echo "</pre>";
?>

<?php
    echo "
        <form method='POST' class='form--inline'>
            <input type='hidden' name='category_id' value='".$category["id"]."'>
            <input class='btn btn--danger' type='submit' name='delete_category' value='Supprimer'>
        </form>
    ";
?>

<?php } ?>
<?php include_once("./views/layout/footer.php"); ?>