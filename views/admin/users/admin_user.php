<?php include_once("./views/layout/header.php"); ?>
<?php if($_SESSION["user"]["permissions"] == "admin"){ ?>

<?php 
    echo "<pre>";
        // print_r($_SESSION);
    echo "</pre>";
?>

<h1 class="h1">Profil de l'utilisateur <?= $user["login"] ?></h1>

<section class="section"></section>

<table class="table">
    <?php
        if($_SESSION["user"]["permissions"] == "admin"){
            echo "
                <tr class='tr'>
                    <th class='th'>id</td>
                    <td class='td'>".$user["id"]."</td>
                </tr>
            ";
        }

        echo "
            <tr class='tr'>
                <th class='th'>login</td>
                <td class='td'>".$user["login"]."</td>
            </tr>

            <tr class='tr'>
                <th class='th'>e-mail</td>
                <td class='td'>".$user["email"]."</td>
            </tr>

            <tr class='tr'>
                <th class='th'>inscrit depuis le</td>
                <td class='td'>".$user["sign_up_date"]."</td>
            </tr>
        ";

        if($_SESSION["user"]["permissions"] == "admin"){
            echo "
                <tr class='tr'>
                    <th class='th'>permissions</td>
                    <td class='td'>
                        <form method='POST'>
                            <select class='btn btn--secondary' name='change_permissions'>
                                <option value='";
                                    if($user["permissions"] == "utilisateur"){echo"utilisateur";}else{echo "admin";} 
                                echo "' selected>";
                                    if($user["permissions"] == "utilisateur"){echo"utilisateur";}else{echo "admin";}
                                echo "</option>
                                <option value='";
                                    if($user["permissions"] == "utilisateur"){echo"admin";}else{echo "utilisateur";}
                                echo "'>";
                                    if($user["permissions"] == "utilisateur"){echo"admin";}else{echo "utilisateur";}
                                echo "</option>
                            </select>
                            <input type='hidden' name='id' value='".$user["id"]."'>
                            <input class='btn btn--danger' type='submit' value='Changer Permissions'>
                        </form>
                    </td>
                </tr>
            ";
        }
    ?>
</table>

<?php
    if($_COOKIE["change_permissions"] == "success"){

        echo "
            <div class='message message--success'>Les privilèges de l'utilisateur ".$user["login"]." ont été changés pour \"".$user["permissions"]."\"</div>
        ";
    }
?>

<?php } ?>
<?php include_once("./views/layout/footer.php"); ?>