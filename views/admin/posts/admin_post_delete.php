<?php include_once("./views/layout/header.php"); ?>
<?php if($_SESSION["user"]["permissions"] == "admin") { ?>

<h1 class="h1">Admin - Supprimer</h1>

<?php
    echo "<pre>";
    print_r($post);
    echo "</pre>";
?>

<section class="section">
    <p class="p">Êtes vous sûr de vouloir supprimer le post n°<?= $post[0]["id"]." \"".$post[0]["name"]."\""  ?> ?</p>

    <form method='POST' class='form--inline'>
        <input type='hidden' name='post_id' value='<?= $post[0]["id"] ?>'>
        <input class='btn btn--danger' type='submit' name='delete_post' value='Supprimer'>
    </form>
</section>

<?php } ?>
<?php include_once("./views/layout/footer.php"); ?>