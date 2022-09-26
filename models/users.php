<?php // Users Model

include_once("config/db.php");

class usersModel{

    //DB instance
    function __construct(){

        $this->DB = new DB();
    }

    //Sign up
    public function signUp(){
            
        $login = htmlentities($_POST["login"]);
        $password = password_hash(htmlentities($_POST["password"]), PASSWORD_BCRYPT, ['cost' => 12,]);
        $email = htmlentities($_POST["email"]);

        $this->DB->DBconnexion()->query(
            "INSERT INTO users (login, password, email) 
            VALUES ('$login', '$password', '$email')"
        );

        header("Location: index.php?page=sign_in");
    }

    //Sign in
    public function signIn(){

        $login = htmlentities($_POST["login"]);

        $user = $this->DB->DBconnexion()->query("SELECT * FROM users WHERE login='$login'")->fetch(PDO::FETCH_ASSOC);

        $id = $user["id"];
        $password = $user["password"];
        $email = $user["email"];
        $sign_up_date = $user["sign_up_date"];
        $permissions = $user["permissions"];

        if(password_verify(htmlentities($_POST["password"]), $password)){

            $_SESSION["user"]["id"] = $id;
            $_SESSION["user"]["login"] = $login;
            $_SESSION["user"]["email"] = $email;
            $_SESSION["user"]["sign_up_date"] = $sign_up_date;
            $_SESSION["user"]["permissions"] = $permissions;

            header("Location: index.php");
        }
    }

    //Sign out
    public function signOut(){

        if($_SESSION["user"]){

            session_destroy();

            header("Location: index.php");
        }
    }

    //Get users
    public function getUsers(){

        //pagination
        $itemCount = $this->itemCount();
        $currentPage = $this->currentPage();
        $perPage = $this->perPage();
        $pageTotal = $this->pageTotal();
        $offset = $this->offset();

        //users
        $users = $this->DB->DBconnexion()->query(
            "SELECT 
                * 
            FROM 
                users
            ORDER BY sign_up_date DESC
            LIMIT $perPage OFFSET $offset"
        )->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    //Get user by Id
    public function getUserById($id){

        $user = $this->DB->DBconnexion()->query("SELECT * FROM users WHERE id='$id'")->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    //Change permissions
    public function changePermissions(){

        if($_POST["id"] && $_POST["change_permissions"]){

            $id = $_POST["id"];
            $newPermissions = $_POST["change_permissions"];
    
            $this->DB->DBconnexion()->query("UPDATE users SET permissions = '$newPermissions' WHERE id = '$id'");

            setcookie("message", "success", time()+10);

            if($_POST["id"] == $_SESSION["user"]["id"]){
                session_destroy();
                header("Location: index.php?page=sign_in");
            }
            else{
                header("Location: index.php?page=admin_user&user_id=".$id."");
            }
        }
    }

    //Change password
    public function changePassword(){

        $user = $this->getUserById($_SESSION["user"]["id"]);
        $id = $user["id"];
        $currentPasswordFromDB = $user["password"];
        $currentPasswordFromInput = $_POST["current_password"];
        $newPassword = password_hash(htmlentities($_POST["new_password"]), PASSWORD_BCRYPT, ['cost' => 12]);

        if(password_verify($currentPasswordFromInput, $currentPasswordFromDB)){

            $this->DB->DBconnexion()->query("UPDATE users SET password = '$newPassword' WHERE id = '$id'");
            session_destroy();
            setcookie("message", "success", time()+60);
            header("Location: index.php?page=sign_in");
        }
    }

    //pagination
    public function itemCount(){
        $itemCount = (int)$this->DB->DBconnexion()->query("SELECT COUNT(id) FROM users")->fetch(PDO::FETCH_NUM)[0];
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