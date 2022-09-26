<?php //Users Controller

include_once("models/users.php");

class usersController{

    //Users model instance
    function __construct(){

        $this->usersModel = new usersModel();
    }

    //Sign Up
    public function signUp(){

        $this->usersModel->signUp();
    }

    //Sign In
    public function signIn(){

        $this->usersModel->signIn();
    }

    //Sign Out
    public function signOut(){

        $this->usersModel->signOut();
    }

    //Get users
    public function getUsers(){

        $users = $this->usersModel->getUsers();
        return $users;
    }

    //Get user by Id
    public function getUserById($id){

        $user = $this->usersModel->getUserById($id);
        return $user;
    }

    //Change permissions
    public function changePermissions(){

        $this->usersModel->changePermissions();
    }

    //Change password
    public function changePassword(){

        $this->usersModel->changePassword();
    }

    //pagination
    public function itemCount(){
        $itemCount = $this->usersModel->itemCount();
        return $itemCount;
    }
    public function currentPage(){
        $currentPage = $this->usersModel->currentPage();
        return $currentPage;
    }
    public function perPage(){
        $perPage = $this->usersModel->perPage();
        return $perPage;
    }
    public function pageTotal(){
        $pageTotal = $this->usersModel->pageTotal();
        return $pageTotal;
    }
    public function offset(){
        $offset = $this->usersModel->offset();
        return $offset;
    }
}