<?php include_once("./views/layout/header.php"); ?>

<?php
    if($_SESSION["user"]["permissions"] == "utilisateur" || $_SESSION["user"]["permissions"] == "admin")
    {
?>
        <h1 class="h1">Mon compte <?php echo "".$_GET["user"].""; ?></h1>

        <?php

            echo "<pre>";
            // print_r($_SESSION["user"]);
            echo "</pre>";

        ?>

        <table class="table">
            <?php
                
                if($_SESSION["user"]["permissions"] == "admin"){
                    echo "
                        <tr class='tr'>
                            <th class='th'>id</td>
                            <td class='td'>".$_SESSION["user"]["id"]."</td>
                        </tr>
                    ";
                }

                echo "
                    <tr class='tr'>
                        <th class='th'>Login</td>
                        <td class='td'>".$_SESSION["user"]["login"]."</td>
                    </tr>

                    <tr class='tr'>
                        <th class='th'>mot de passe</td>
                        <td class='td'>
                            <a class='btn btn--primary' href='index.php?page=password_change'>Changer le mot de passe</a>
                        </td>
                    </tr>

                    <tr class='tr'>
                        <th class='th'>e-mail</td>
                        <td class='td'>".$_SESSION["user"]["email"]."</td>
                    </tr>

                    <tr class='tr'>
                        <th class='th'>inscrit depuis le</td>
                        <td class='td'>".$_SESSION["user"]["sign_up_date"]."</td>
                    </tr>
                ";

                if($_SESSION["user"]["permissions"] == "admin"){
                    echo "
                        <tr class='tr'>
                            <th class='th'>permissions</td>
                            <td class='td td--actions'>
                                <form class='flex__direction--row' method='POST'>
                                    <select class='btn btn--secondary' name='change_permissions'>
                                        <option value='";
                                            if($_SESSION["user"]["permissions"] == "utilisateur"){echo"utilisateur";}else{echo "admin";} 
                                        echo "' selected>";
                                            if($_SESSION["user"]["permissions"] == "utilisateur"){echo"utilisateur";}else{echo "admin";}
                                        echo "</option>
                                        <option value='";
                                            if($_SESSION["user"]["permissions"] == "utilisateur"){echo"admin";}else{echo "utilisateur";}
                                        echo "'>";
                                            if($_SESSION["user"]["permissions"] == "utilisateur"){echo"admin";}else{echo "utilisateur";}
                                        echo "</option>
                                    </select>
                                    <input type='hidden' name='id' value='".$_SESSION["user"]["id"]."'>
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
<?php
    }
?>

<?php include_once("./views/layout/footer.php"); ?>