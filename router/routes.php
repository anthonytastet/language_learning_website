<?php //Router
session_start();

include_once("controllers/users.php");
include_once("controllers/posts.php");
include_once("controllers/categories.php");
include_once("config/upload.php");

class router{

    // controller instance
    function __construct(){
        
        $this->usersController = new usersController();
        $this->postsController = new postsController();
        $this->categoriesController = new categoriesController();
    }
    
    public function routes(){

        $page = $_GET["page"];

        switch($page){

            case "home":

                include_once("views/home.php");

                break;

            case "sign_in":

                if($_POST["sign_in"]){

                    $this->usersController->signIn();
                }

                include_once("views/sign_in.php");

                break;

            case "sign_up":

                if($_POST["sign_up"]){

                    $this->usersController->signUp();
                }

                include_once("views/sign_up.php");

                break;

            case "sign_out":

                $this->usersController->signOut();

                include_once("views/home.php");

                break;

            case "courses":

                //pagination
                $itemCount = $this->postsController->itemCount();
                $currentPage = $this->postsController->currentPage();
                $perPage = $this->postsController->perPage();
                $pageTotal = $this->postsController->pageTotal();
                $offset = $this->postsController->offset();

                //posts
                $posts = $this->postsController->getPosts();
                $categories = [];
                foreach($posts as $post){

                    $categories[$post["id"]] = $this->categoriesController->getCategoriesByPostId($post["id"]);
                }

                include_once("views/content/courses/courses.php");

                break;

            case "course":

                $post = $this->postsController->getPostById($_GET["post_id"]);
                $categories = $this->categoriesController->getCategoriesByPostId($_GET["post_id"]);

                include_once("views/content/courses/course.php");

                break;
            
            case "exercises":

                //pagination
                $itemCount = $this->postsController->itemCount();
                $currentPage = $this->postsController->currentPage();
                $perPage = $this->postsController->perPage();
                $pageTotal = $this->postsController->pageTotal();
                $offset = $this->postsController->offset();

                //posts
                $posts = $this->postsController->getPosts();
                $categories = [];
                foreach($posts as $post){

                    $categories[$post["id"]] = $this->categoriesController->getCategoriesByPostId($post["id"]);
                }

                include_once("views/content/exercises/exercises.php");

                break;

            case "exercise":

                $post = $this->postsController->getPostById($_GET["post_id"]);
                $categories = $this->categoriesController->getCategoriesByPostId($postId);

                include_once("views/content/exercises/exercise.php");

                break;

            case "h5p":

                header("Location: http://localhost/doranco_stage/h5p-standalone-1.3.4/demo/index.php");

                // include_once("h5p-standalone-1.3.4/demo/index.html");

                break;

            case "about":

                include_once("views/about.php");

                break;

            case "contact":

                include_once("views/contact.php");

                break;

            case "admin":

                include_once("views/admin/admin.php");

                break;

            case "admin_users":

                //pagination
                $itemCount = $this->usersController->itemCount();
                $currentPage = $this->usersController->currentPage();
                $perPage = $this->usersController->perPage();
                $pageTotal = $this->usersController->pageTotal();
                $offset = $this->usersController->offset();

                //users
                $users = $this->usersController->getUsers();

                include_once("views/admin/users/admin_users.php");

                break;
            
            case "admin_user":

                $user = $this->usersController->getUserById($_GET["user_id"]);

                if($_POST["change_permissions"]){

                    $this->usersController->changePermissions();
                }

                include_once("views/admin/users/admin_user.php");

                break;
            
            case "admin_posts":

                //pagination
                $itemCount = $this->postsController->itemCount();
                $currentPage = $this->postsController->currentPage();
                $perPage = $this->postsController->perPage();
                $pageTotal = $this->postsController->pageTotal();
                $offset = $this->postsController->offset();

                //posts
                $posts = $this->postsController->getPosts();
                $categories = $this->categoriesController->getCategories();
            
                include_once("views/admin/posts/admin_posts.php");

                break;

            case "admin_post_create":

                $categories = $this->categoriesController->getCategories();

                if($_POST["create_post"]){

                    $this->postsController->createPost();
                }
        
                include_once("views/admin/posts/admin_post_create.php");

                break;

            case "admin_post_update":

                $post = $this->postsController->getPostById($_GET["post_id"]);

                $categories = $this->categoriesController->getCategories();

                if($_POST["update_post"]){

                    $this->postsController->updatePost();
                }

                if($_POST["file_delete"]){

                    $this->postsController->fileDelete($_GET["post_id"]);
                }

                include_once("views/admin/posts/admin_post_update.php");

                break;

            case "admin_post_delete":
            
                $post = $this->postsController->getPostById($_GET["post_id"]);

                if($_POST["delete_post"]){

                    $this->postsController->deletePost();
                }

                include_once("views/admin/posts/admin_post_delete.php");

                break;
            
            case "admin_categories":

                //pagination
                // $itemCount = $this->categoriesController->itemCount();
                // $currentPage = $this->categoriesController->currentPage();
                // $perPage = $this->categoriesController->perPage();
                // $pageTotal = $this->categoriesController->pageTotal();
                // $offset = $this->categoriesController->offset();

                //categories
                $categories = $this->categoriesController->getCategories();

                include_once("views/admin/categories/admin_categories.php");

                break;

            case "admin_category_create":

                if($_POST["create_category"]){

                    $this->categoriesController->createCategory();
                }

                include_once("views/admin/categories/admin_category_create.php");

                break;

            case "admin_category_update":

                $category = $this->categoriesController->getCategoryById($_GET["category_id"]);

                if($_POST["update_category"]){

                    $this->categoriesController->updateCategory();
                }

                include_once("views/admin/categories/admin_category_update.php");

                break;

            case "admin_category_delete":

                $category = $this->categoriesController->getCategoryById($_GET["category_id"]);

                if($_POST["delete_category"]){

                    $this->categoriesController->deleteCategory();
                }

                include_once("views/admin/categories/admin_category_delete.php");

                break;
    
            case "user":

                $user = $this->usersController->getUserById($_SESSION["user"]["id"]);

                if($_POST["change_permissions"]){

                    $this->usersController->changePermissions();
                }

                include_once("views/user/user.php");

                break;
            
            case "password_change":

                if($_POST["change_password"]){

                    $this->usersController->changePassword();
                }

                include_once("views/user/password_change.php");

                break;

            default:

                require("views/home.php");
                
            break;
        }
    }
}