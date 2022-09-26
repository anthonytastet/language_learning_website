<?php include_once("./views/layout/header.php"); ?>
<?php if($_SESSION["user"]["permissions"] == "admin") { ?>

<h1 class="h1">Admin - gestion des catégories</h1>

<section class="section">
    <!-- <p class="p">Ceci est la page d'administration des catégories. Elle permet de visualiser et gérer des catégories présentes sur le site.</p> -->

    <a class="btn btn--primary" href="index.php?page=admin_category_create" style="margin-left: 5vw;">Nouvelle catégorie</a>
</section>

<table class="table">
    <thead classe='thead'>
        <tr class='tr'>
            <th class='th'>Titre</th>
            <th class='th'>Actions</th>
        </tr>
    </thead>

    <tbody class='tbody'>
        <?php

            $hiddenCategories = ["Cours", "Exercice", "A1", "A2", "B1", "B2", "C1", "C2"];

            foreach($categories as $category){

                if(!in_array($category["name"], $hiddenCategories)){

                    echo "
                    <tr class='tr'>
                        <td class='td'>" . $category['name'] . "</td>
                        <td class='td td--actions'>
                            <a href='index.php?page=admin_category_update&category_id=".$category["id"]."' class='btn btn--primary'>Modifier</a>
                            <a href='index.php?page=admin_category_delete&category_id=".$category["id"]."' class='btn btn--danger'>Supprimer</a>
                        </td>
                    </tr>
                    ";
                }
                else{
                    echo "";
                }
            }

        ?>
    </tbody>
</table>

<div class="pagination">
    <?php 
        if($currentPage > 1){
            echo "
                <a class='btn btn--primary' href='index.php?page=admin_categories&p=".($currentPage - 1)."'>&laquo; Page précédente</a>
            ";
        }
        if($currentPage < $pageTotal){
            echo "
                <a class='btn btn--primary' style='margin-left:auto' href='index.php?page=admin_categories&p=".($currentPage + 1)."'>Page suivante &raquo;</a>
            ";
        }  
    ?>
</div>

<?php } ?>
<?php include_once("./views/layout/footer.php"); ?>