<?php include_once("./views/layout/header.php"); ?>

<h1 class="h1">Liste des Exercices</h1>

<section class="section">
</section>

<?php
    echo "
        <div class='cards__container'>
    ";

        foreach($posts as $post){
            
            echo "
                <div class='card' id='post".$post["id"]."' style='display:none'>

                    <span class='card__title'>".$post["name"]."</span>

                    <span class='card__categories'>
            ";
                    if($categories){

                        foreach($categories[$post["id"]] as $category){

                            echo "
                                <span class='btn btn--warning'>".$category["category_name"]."
                            ";

                                if(in_array($_GET["content"], $category)){

                                    echo "
                                        <script defer>
                                            document.getElementById('post".$post["id"]."').setAttribute('style', 'display:flex;');
                                        </script>
                                    ";
                                }

                            echo "
                                </span>
                            ";
                        }
                    }
            echo "
                    </span>

                    <a href='index.php?page=exercise&post_id=".$post["id"]."' class='btn btn--primary'>Voir</a>

                </div>
            ";
        }

    echo "
        </div>
    ";
?>

<?php include_once("./views/layout/footer.php"); ?>