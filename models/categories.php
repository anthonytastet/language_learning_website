<?php // Categories Model

include_once("config/db.php");

class categoriesModel{

    //DB instance
    function __construct(){

        $this->DB = new DB();
    }

    //Create category
    public function createCategory(){

        $categoryName = $_POST["category_name"];

        $this->DB->DBconnexion()->query("INSERT INTO category (name) VALUES ('$categoryName')");

        $category = $this->getCategoryByName($categoryName);
        $categoryId = $category["id"];

        header("Location: index.php?page=admin_categories");
    }

    //Update category
    public function updateCategory(){

        $categoryId = $_POST["category_id"];
        $categoryName = $_POST["category_name"];

        $this->DB->DBconnexion()->query("UPDATE category SET name = '$categoryName' WHERE id = '$categoryId'");

        header("Location: index.php?page=admin_categories");
    }

    //Delete category
    public function deleteCategory(){

        $categoryId = $_POST["category_id"];

        $this->DB->DBconnexion()->query("DELETE FROM category WHERE id = '$categoryId'");
        $this->DB->DBconnexion()->query("DELETE FROM post_category WHERE category_id = '$categoryId'");

        header("Location: index.php?page=admin_categories");
    }

    //Get categories
    public function getCategories(){

        //pagination
        // $itemCount = $this->itemCount();
        // $currentPage = $this->currentPage();
        // $perPage = $this->perPage();
        // $pageTotal = $this->pageTotal();
        // $offset = $this->offset();

        //categories
        // $categories = $this->DB->DBconnexion()->query(
        //     "SELECT 
        //         * 
        //     FROM 
        //         category 
        //     ORDER BY name ASC
        //     LIMIT $perPage OFFSET $offset"
        // )->fetchAll(PDO::FETCH_ASSOC);
        // return $categories;

        $categories = $this->DB->DBconnexion()->query(
            "SELECT 
                * 
            FROM 
                category 
            ORDER BY name ASC"
        )->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }

    //Get category by Id
    public function getCategoryById($categoryId){

        $category = $this->DB->DBconnexion()->query("SELECT * FROM category WHERE id = '$categoryId'")->fetch(PDO::FETCH_ASSOC);
        return $category;
    }

    //Get category by Name
    public function getCategoryByName($categoryName){

        $category = $this->DB->DBconnexion()->query("SELECT * FROM category WHERE name = '$categoryName'")->fetch(PDO::FETCH_ASSOC);
        return $category;
    }

    public function getCategoriesByPostId($postId){

        $categories = $this->DB->DBconnexion()->query(
            "SELECT 
                category.id AS category_id,
                category.name AS category_name
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

        return $categories;
    }

    //pagination
    public function itemCount(){
        $itemCount = (int)$this->DB->DBconnexion()->query("SELECT COUNT(id) FROM category")->fetch(PDO::FETCH_NUM)[0];
        return $itemCount;
    }
    public function currentPage(){
        $currentPage = (int)($_GET["p"] ?? 1) ?: 1;
        return $currentPage;
    }
    public function perPage(){
        $perPage = 5;
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