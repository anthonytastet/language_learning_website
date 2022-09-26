<?php //Posts Controller

include_once("models/posts.php");

class postsController{

    //Model instance
    function __construct(){

        $this->postsModel = new postsModel();
    }

    //Create post
    public function createPost(){

        $this->postsModel->createPost();
    }

    //Update post
    public function updatePost(){

        $this->postsModel->updatePost();
    }

    //Delete post
    public function deletePost(){

        $this->postsModel->deletePost();
    }

    //Get posts
    public function getPosts(){

        $posts = $this->postsModel->getPosts();
        return $posts;
    }

    public function getPostsAndCategories(){

        $postsAndCategories = $this->postsModel->getPostsAndCategories();
        return $postsAndCategories;
    }

    //Get post by Id
    public function getPostById($postId){

        $post = $this->postsModel->getPostById($postId);
        return $post;
    }

    //Get post by Name
    public function getPostByName($postName){

        $post = $this->postsModel->getPostByName($postName);
        return $post;
    }

    public function fileUpload(){

        $h5pContentName = $this->postsModel->fileUpload();
    }

    public function fileDelete($postId){

        $this->postsModel->fileDelete($postId);
    }

    //pagination
    public function itemCount(){
        $itemCount = $this->postsModel->itemCount();
        return $itemCount;
    }
    public function currentPage(){
        $currentPage = $this->postsModel->currentPage();
        return $currentPage;
    }
    public function perPage(){
        $perPage = $this->postsModel->perPage();
        return $perPage;
    }
    public function pageTotal(){
        $pageTotal = $this->postsModel->pageTotal();
        return $pageTotal;
    }
    public function offset(){
        $offset = $this->postsModel->offset();
        return $offset;
    }
}