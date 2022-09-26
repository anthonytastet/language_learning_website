<?php include_once("./views/layout/header.php"); ?>
<?php if($_SESSION["user"]["permissions"] == "admin") { ?>

<h1 class="h1">Admin - gestion du contenu</h1>

<section class="section">
    <!-- <p class="p">Ceci est la page d'administration du contenu. Elle permet de visualiser et gérer le contenu présent sur le site.</p> -->

    <a class="btn btn--primary" href="index.php?page=admin_post_create" style="margin-left: 5vw;">Nouveau</a>
</section>

<?php        
    echo "<pre>";
    // print_r($posts);
    echo "</pre>";
?>


<table class="table">
    <thead classe='thead'>
        <tr class='tr'>
            <th class='th'>N°</th>
            <th class='th'>Titre</th>
            <th class='th'>Date de publication</th>
            <th class='th'>Actions</th>
        </tr>
    </thead>

    <tbody class='tbody'>
        <?php
            foreach($posts as $post){

                echo "
                    <tr class='tr'>
                        <td class='td'>" . $post['id'] . "</td>
                        <td class='td'>" . $post['name'] . "</td>
                        <td class='td'>" . $post['created_at'] . "</td>
                        <td class='td td--actions'>
                            <a href='index.php?page=admin_post_update&post_id=".$post["id"]."' class='btn btn--primary'>Modifier</a>
                            <a href='index.php?page=admin_post_delete&post_id=".$post["id"]."' class='btn btn--danger'>Supprimer</a>
                        </td>
                    </tr>
                ";
            }
        ?>
    </tbody>
</table>

<div class="pagination">
    <?php 
        if($currentPage > 1){
            echo "
                <a class='btn btn--primary' href='index.php?page=admin_posts&p=".($currentPage - 1)."'>&laquo; Page précédente</a>
            ";
        }
        if($currentPage < $pageTotal){
            echo "
                <a class='btn btn--primary' style='margin-left:auto' href='index.php?page=admin_posts&p=".($currentPage + 1)."'>Page suivante &raquo;</a>
            ";
        }  
    ?>
</div>

<?php } ?>
<?php include_once("./views/layout/footer.php"); ?>