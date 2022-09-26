<?php include_once("./views/layout/header.php"); ?>

<h1 class="h1">Cours</h1>

<section class="section">
</section>

<?php
    echo "<pre>";
    // print_r($categories);
    echo "</pre>";
?>

<div class="content__container">

    <?= "<h2 class='content__title'>".$post[0]["name"]."</h2>" ?>

    <div class='content__categories'>
        <?php
            foreach($categories as $category){

                echo "<a class='btn btn--secondary' href='index.php?category_name=".$category["category_name"]."'>".$category["category_name"]."</a>";
            }
        ?>
    </div>

    <div class='content__content'>

        <?php
            switch($post[0]["content_type"]){

                case "text":

                    echo "
                        <div style='white-space: pre-wrap;'>".$post[0]["content"]."</div>
                    ";

                    break;

                case "h5p":

                    echo "
                        <iframe src='views/content/h5p-standalone-1.3.4/demo/index.php?post_content=". $post[0]["content"] ."' width='1090' height='639' frameborder='0' allowfullscreen='allowfullscreen' allow='geolocation *; microphone *; camera *; midi *; encrypted-media *'></iframe><script src='https://h5p.org/sites/all/modules/h5p/library/js/h5p-resizer.js' charset='UTF-8'></script>
                    ";
                    break;

                case "pdf":

                    echo "
                        <iframe class='course--pdf' src='views/content/pdf/". $post[0]["content"] .".pdf#toolbar=0&view=FitH' frameborder='0' width='960' height='749' allowfullscreen='true' mozallowfullscreen='true' webkitallowfullscreen='true'></iframe>
                    ";
                    break;

                case "kahoot":

                    echo "
                        <iframe src='". $post[0]["content"] ."' frameborder='0' width='960' height='749' allowfullscreen='true' mozallowfullscreen='true' webkitallowfullscreen='true'></iframe>
                    ";
                    break;
            }
        ?>
    </div>

    <!-- slide -->
    <!-- <iframe src="https://h5p.org/h5p/embed/612#toolbar=0" width="1090" height="639" frameborder="0" allowfullscreen="allowfullscreen" allow="geolocation *; microphone *; camera *; midi *; encrypted-media *" title="Course Presentation"></iframe><script src="https://h5p.org/sites/all/modules/h5p/library/js/h5p-resizer.js" charset="UTF-8"></script> -->

    <!-- slide -->
    <!-- <iframe src="https://docs.google.com/presentation/d/e/2PACX-1vTyc1XCmyTeH9Y3uYdxq7RQecQIlnqlxTwqU0VZPv1VKNw7Yb720aWFBFn9lH-Qaz6h9HMb1gVgvg7gn37xFsM/embed?start=false&loop=false&delayms=60000" frameborder="0" width="960" height="749" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe> -->

    <!-- Kahoot -->
    <!-- <iframe src="https://kahoot.it/challenge/03430121?challenge-id=ec2ab01d-8ea7-4805-9d12-8dc6cb958a8e_1656995418069" frameborder="0" width="960" height="749" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe> -->

</div>

<?php include_once("./views/layout/footer.php"); ?>