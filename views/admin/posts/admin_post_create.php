<?php include_once("./views/layout/header.php"); ?>
<?php if($_SESSION["user"]["permissions"] == "admin") { ?>

<h1 class="h1">Admin - Créer</h1>

<section class="section">
    <!-- <p class="p">Ceci est la page de création d'un cours ou exercice en particulier.</p> -->
</section>

<?php
    echo "<pre>";
    // print_r($_POST);
    echo "</pre>";
?>

<?php
    echo "
        <form class='form' action='index.php?page=admin_post_create' enctype='multipart/form-data' method='POST' autocomplete='off'>

            <fieldset class='form__fieldset'>
                <legend class='form__fieldset__legend'>Titre</legend>

                <input class='input' type='text' name='post_name' placeholder='Titre'>
            </fieldset>

            <fieldset class='form__fieldset'>
                <legend class='form__fieldset__legend'>Type de contenu</legend>

                <div class='toggle__content__container flex__direction--row'>

                    <span class='btn btn--secondary btn--addH5p' onclick='addH5p()'>
                        H5P
                    </span>

                    <span style='display:none' class='btn btn--danger btn--removeH5p' onclick='removeH5p()'>
                        H5P
                    </span>

                    <span class='btn btn--secondary btn--addPdf' onclick='addPdf()'>
                        PDF
                    </span>

                    <span style='display:none' class='btn btn--danger btn--removePdf' onclick='removePdf()'>
                        PDF
                    </span>

                    <span class='btn btn--secondary btn--addSlide' onclick='addSlide()'>
                        Présentation
                    </span>

                    <span style='display:none' class='btn btn--danger btn--removeSlide' onclick='removeSlide()'>
                        Présentation
                    </span>

                    <span class='btn btn--secondary btn--addText' onclick='addText()'>
                        Texte
                    </span>

                    <span style='display:none' class='btn btn--danger btn--removeText' onclick='removeText()'>
                        Texte
                    </span>

                    <span class='btn btn--secondary btn--addKahoot' onclick='addKahoot()'>
                        KAHOOT
                    </span>

                    <span style='display:none' class='btn btn--danger btn--removeKahoot' onclick='removeKahoot()'>
                        KAHOOT
                    </span>
                </div>
            </fieldset>

            <div class='content__container'> </div>

            <fieldset class='form__fieldset flex__direction--row'>
                <legend class='form__fieldset__legend'>Catégories</legend>
    ";
                foreach($categories as $category){

                    echo "
                        <span class='btn btn--secondary'>
                            <input type='checkbox' id='".$category["name"]."' name='category[]' value='".$category["name"]."' ";
                            foreach($post as $data){
                                if($category["name"] == $data["categories"]){echo "checked";}
                            }
                            echo ">
                            <label for='".$category["name"]."'>".$category["name"]."</label>
                        </span>
                    ";
                }

    echo "
            </fieldset>

            <input class='btn btn--primary' type='submit' name='create_post' value='Enregistrer'>

        </form>
    ";
?>

<?php } ?>
<?php include_once("./views/layout/footer.php"); ?>

<script src="src/js/post_create.js<?= '?v='.time() ?>" defer></script>