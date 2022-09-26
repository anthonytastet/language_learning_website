<?php // Posts Model

include_once("config/db.php");
include_once("models/categories.php");
include_once("helpers/extractor.php");

class postsModel{

    //DB instance
    function __construct(){

        $this->DB = new DB();
        $this->categoriesModel = new categoriesModel();
        $this->extractor = new extractor();
    }

    //Create post
    public function createPost(){

        if(!empty($_POST["post_name"])){

            //get post title
            $postName = htmlentities($_POST["post_name"]);

            //get post content
            $contentName = "";
            $postContent = "";
            $postContentType = "";

            switch($_POST["post_content_type"]){

                case "h5p":

                    $contentName = $this->fileUpload();

                    if($contentName){

                        $postContent = (string)htmlentities($contentName);
                    }else{

                        $postContent = htmlentities($_POST["post_content"]);
                    }

                    $postContentType = htmlentities($_POST["post_content_type"]);

                    break;

                case "pdf":

                    $contentName = $this->fileUpload();

                    if($contentName){

                        $postContent = (string)htmlentities($contentName);
                    }else{
                        
                        $postContent = htmlentities($_POST["post_content"]);
                    }

                    $postContentType = htmlentities($_POST["post_content_type"]);

                    break;

                case "text":

                    $postContent = htmlentities($_POST["post_content"]);

                    $postContentType = htmlentities($_POST["post_content_type"]);

                    break;

                case "kahoot":

                    $postContent = htmlentities($_POST["post_content"]);

                    $postContentType = htmlentities($_POST["post_content_type"]);

                break;
            }

            //get post categories
            $categoryName = htmlentities($_POST["category_name"]);

            //insert post data in DB
            $this->DB->DBconnexion()->query(
                "INSERT INTO post 
                    (name, content, content_type, content_file_name) 
                VALUES 
                    ('$postName', '$postContent', '$postContentType', '$contentName')"
            );

            //get new post id from DB
            $post = $this->getPostByName($postName);
            $postId = $post["id"];

            //get new category data
            $selectedCategories = $_POST["category"];

            //insert new category data in DB
            foreach($selectedCategories as $selectedCategory){

                $category = $this->categoriesModel->getCategoryByName($selectedCategory);
                $categoryId = $category["id"];

                $this->DB->DBconnexion()->query("INSERT INTO post_category (post_id, category_id) VALUES ('$postId', '$categoryId')");
            }

            header("Location: index.php?page=admin_posts");
        }
    }

    //Update post
    public function updatePost(){

        //get post data
        $postId = htmlentities($_POST["post_id"]);
        $postName = htmlentities($_POST["post_name"]);
        $postContent = htmlentities($_POST["post_content"]);

        //update post data in DB
        $this->DB->DBconnexion()->query("UPDATE post SET name = '$postName', content = '$postContent' WHERE id = '$postId'");

        //delete old category data from DB
        $this->DB->DBconnexion()->query("DELETE FROM post_category WHERE post_id = '$postId'");

        //get new category data
        $selectedCategories = $_POST["category"];

        //insert new category data in DB
        foreach($selectedCategories as $selectedCategory){

            $category = $this->categoriesModel->getCategoryByName($selectedCategory);
            $categoryId = $category["id"];

            $this->DB->DBconnexion()->query("INSERT INTO post_category (post_id, category_id) VALUES ('$postId', '$categoryId')");
        }

        header("Location: index.php?page=admin_post_update&post_id=$postId");
    }

    //Delete post
    public function deletePost(){

        $postId = htmlentities($_POST["post_id"]);

        $this->fileDelete($postId);

        $this->DB->DBconnexion()->query("DELETE FROM post WHERE id = '$postId'");

        header("Location: index.php?page=admin_posts");
    }

    //Get posts
    public function getPosts(){

        //pagination
        $itemCount = $this->itemCount();
        $currentPage = $this->currentPage();
        $perPage = $this->perPage();
        $pageTotal = $this->pageTotal();
        $offset = $this->offset();

        //posts
        $posts = $this->DB->DBconnexion()->query(
            "SELECT 
                *
            FROM 
                post
            ORDER BY created_at DESC
            LIMIT $perPage OFFSET $offset"
        )->fetchAll(PDO::FETCH_ASSOC);

        return $posts;
    }

    //Get posts and categories
    public function getPostsAndCategories(){

        $postsAndCategories = $this->DB->DBconnexion()->query(
            "SELECT 
                post.id AS id,
                post.name AS name,
                post.content AS content,
                post.created_at AS created_at,
                category.name AS category
            FROM 
                post
            LEFT JOIN 
                post_category
            ON 
                post.id = post_category.post_id
            LEFT JOIN 
                category
            ON 
                category.id = post_category.category_id
            ORDER BY post.id DESC"
        )->fetchAll(PDO::FETCH_ASSOC);

        return $postsAndCategories;
    }

    //Get post by Id
    public function getPostById($postId){

        // $post = $this->DB->DBconnexion()->query("SELECT * FROM post WHERE id = '$postId'")->fetch(PDO::FETCH_ASSOC);

        $post = $this->DB->DBconnexion()->query(
            "SELECT 
                post.id,
                post.name,
                post.content,
                post.content_type,
                post.content_file_name,
                post.created_at,
                category.name AS categories
            FROM 
                post
            LEFT JOIN 
                post_category
            ON 
                post.id = post_category.post_id
            LEFT JOIN 
                category
            ON 
                category.id = post_category.category_id
            WHERE 
                post.id = '$postId'"
        )->fetchAll(PDO::FETCH_ASSOC);

        return $post;
    }

    //Get post by Name
    public function getPostByName($postName){

        $post = $this->DB->DBconnexion()->query("SELECT * FROM post WHERE name = '$postName'")->fetch(PDO::FETCH_ASSOC);
        return $post;
    }

    public function fileUpload(){

        if(!empty($_FILES["fileToUpload"])){

            //define characteristics of the file to upload 
            $file = $_FILES["fileToUpload"]["file"];
            $fileName = $_FILES["fileToUpload"]["name"];
            $fileTmpName = $_FILES["fileToUpload"]["tmp_name"];
            $fileType = $_FILES["fileToUpload"]["type"];
            $fileSize = $_FILES["fileToUpload"]["size"];
            $fileError = $_FILES["fileToUpload"]["error"];
            $fileExtension = strtolower(end(explode(".", $fileName)));
            // $filePrefix = preg_replace("/[0-9]+/", "", str_replace("-", "", strtolower(reset(explode(".", $fileName)))));
            $filePrefix = preg_replace("/_$/", "", str_replace(" ", "_", str_replace("-", "", strtolower(reset(explode(".", $fileName))))));


            //define allowed files types for upload
            $allowed = array("h5p", "pdf");
            
            if(in_array($fileExtension, $allowed)){

                if($fileError === 0){

                    $contentName = "";

                    switch($fileExtension){

                        case "h5p":

                            //define names of zipped and unzipped files
                            $h5pContentNameZip = $filePrefix . ".zip";
                            $h5pContentName = $filePrefix;

                            //define target location for upload
                            $uploadDestination = "/opt/lampp/htdocs/doranco_stage/views/content/h5p-standalone-1.3.4/workspace/" . $h5pContentNameZip;

                            //define content path before and after the extraction
                            $zipPath = "views/content/h5p-standalone-1.3.4/workspace/" . $h5pContentNameZip;
                            $unZipPath = "views/content/h5p-standalone-1.3.4/workspace/" . $h5pContentName . "/";

                            //upload file and grant necessary permissions
                            move_uploaded_file($fileTmpName, $uploadDestination);
                            mkdir($unZipPath, 0777);

                            //unzip uploaded file and grant necessary permission
                            $extract = $this->extractor->extract($zipPath, $unZipPath);
                            exec("chmod -R 0777 /opt/lampp/htdocs/doranco_stage/views/content/h5p-standalone-1.3.4/workspace/");

                            //removes zip archive
                            unlink("/opt/lampp/htdocs/doranco_stage/views/content/h5p-standalone-1.3.4/workspace/".$h5pContentNameZip);

                            //displays status
                            if($extract){
                                echo $GLOBALS["status"]["succes"];
                                $contentName = $filePrefix;
                            }else{
                                echo $GLOBALS["status"]["error"];
                            }

                            //return name of the uploaded extracted file
                            return $contentName;

                        case "pdf":

                            //define name of pdf file
                            $pdfContentName = $filePrefix . ".pdf";

                            //define target location for upload
                            $uploadDestination = "/opt/lampp/htdocs/doranco_stage/views/content/pdf/" . $pdfContentName;

                            //upload file and grant necessary permissions
                            // exec("chmod -R 0777 /opt/lampp/htdocs/doranco_stage/views/content/h5p-standalone-1.3.4/workspace/");

                            $upload = move_uploaded_file($fileTmpName, $uploadDestination);

                            if($upload){

                                $contentName = $filePrefix;
                            };

                            //return name of the uploaded file
                            return $contentName;
                    }
                }else{echo "fileError: " . $fileError;}
            }else{echo "You cannot upload files with this extension: " . $fileExtension;}
        }
    }

    public function fileDelete($postId){

        $post = $this->getPostById($postId);

        switch($post[0]["content_type"]){

            case "h5p":

                if(is_dir("views/content/h5p-standalone-1.3.4/workspace/" . $post[0]["content_file_name"] . "/")){

                    exec("rm -r views/content/h5p-standalone-1.3.4/workspace/" . $post[0]["content_file_name"] . "/");
                }

                break;

            case "pdf":

                if(is_file("/opt/lampp/htdocs/doranco_stage/views/content/pdf/".$post[0]["content_file_name"].".".$post[0]["content_type"])){

                    unlink("/opt/lampp/htdocs/doranco_stage/views/content/pdf/".$post[0]["content_file_name"].".".$post[0]["content_type"]);
                }

                break;
        }        
    }

    //pagination
    public function itemCount(){
        $itemCount = (int)$this->DB->DBconnexion()->query("SELECT COUNT(id) FROM post")->fetch(PDO::FETCH_NUM)[0];
        return $itemCount;
    }
    public function currentPage(){
        $currentPage = (int)($_GET["p"] ?? 1) ?: 1;
        return $currentPage;
    }
    public function perPage(){
        $perPage = 12;
        return $perPage;
    }
    public function pageTotal(){
        $itemCount = $this->itemCount();
        $perPage = $this->perPage();
        $pageTotal = ceil($itemCount / $perPage);
        return $pageTotal;
    }
    public function offset(){
        $perPage = $this->perPage();
        $currentPage = $this->currentPage();
        $offset = $perPage * ($currentPage - 1);
        return $offset;
    }
}