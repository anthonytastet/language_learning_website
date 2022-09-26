<?php include_once("./views/layout/header.php"); ?>
<?php if($_SESSION["user"]["permissions"] == "admin") { ?>

<h1 class="h1">Gestion des utilisateurs</h1>

<section class="section"></section>

<table class="table">
    <thead classe='thead'>
        <tr class='tr'>
            <th class='th'>ID</th>
            <th class='th'>Login</th>
            <th class='th'>E-mail</th>
            <th class='th'>Permissions</th>
            <th class='th'>Actions</th>
        </tr>
    </thead>

    <tbody class='tbody'>
        <?php

            foreach($users as $user){

                echo "
                <tr class='tr'>
                    <td class='td'>" . $user['id'] . "</td>
                    <td class='td'>" . $user['login'] . "</td>
                    <td class='td'><a href='mailto:".$user['email']."' target='blank'>".$user['email']."</a></td>
                    <td class='td'>" . $user['permissions'] . "</td>
                    <td class='td td--actions'>
                        <a class='btn btn--primary' href='index.php?page=admin_user&user_id=".$user['id']."'>Profil</a>
                        <a class='btn btn--warning' href='mailto:".$user['email']."' target='blank'>Contacter</a>
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
                <a class='btn btn--primary' href='index.php?page=admin_users&p=".($currentPage - 1)."'>&laquo; Page précédente</a>
            ";
        }
        if($currentPage < $pageTotal){
            echo "
                <a class='btn btn--primary' style='margin-left:auto' href='index.php?page=admin_users&p=".($currentPage + 1)."'>Page suivante &raquo;</a>
            ";
        }  
    ?>
</div>

<?php } ?>
<?php include_once("./views/layout/footer.php"); ?>