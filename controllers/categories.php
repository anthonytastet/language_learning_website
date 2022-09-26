<?php //Categories Controller

include_once("models/categories.php");

class categoriesController{

    //Categories model instance
    function __construct(){

        $this->categoriesModel = new categoriesModel();
    }

    //Create category
    public function createCategory(){

        $this->categoriesModel->createCategory();
    }

    //Update category
    public function updateCategory(){

        $this->categoriesModel->updateCategory();
    }

    //Delete category
    public function deleteCategory(){

        $this->categoriesModel->deleteCategory();
    }

    //Get categories
    public function getCategories(){

        $categories = $this->categoriesModel->getCategories();
        return $categories;
    }

    //Get category by Id
    public function getCategoryById($categoryId){

        $category = $this->categoriesModel->getCategoryById($categoryId);
        return $category;
    }

    //Get category by Name
    public function getCategoryByName($categoryName){

        $category = $this->categoriesModel->getCategoryByName($categoryName);
        return $category;
    }

    public function getCategoriesByPostId($postId){

        $categories = $this->categoriesModel->getCategoriesByPostId($postId);
        return $categories;
    }

    //pagination
    // public function itemCount(){
    //     $itemCount = $this->categoriesModel->itemCount();
    //     return $itemCount;
    // }
    // public function currentPage(){
    //     $currentPage = $this->categoriesModel->currentPage();
    //     return $currentPage;
    // }
    // public function perPage(){
    //     $perPage = $this->categoriesModel->perPage();
    //     return $perPage;
    // }
    // public function pageTotal(){
    //     $pageTotal = $this->categoriesModel->pageTotal();
    //     return $pageTotal;
    // }
    // public function offset(){
    //     $offset = $this->categoriesModel->offset();
    //     return $offset;
    // }
}