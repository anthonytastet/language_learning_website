<?php //Database

class DB {

    //database connexion parameters
    private $DBadress = "localhost";
    private $userName = "root";
    private $userPassword = "";
    private $DBname = "stage";

    //database connexion
    public function DBconnexion(){

        $DBadress = $this->DBadress;
        $userName = $this->userName;
        $userPassword = $this->userPassword;
        $DBname = $this->DBname;

        try {

            $DBconnexion = new PDO("mysql:host=" . $DBadress . ";dbname=" . $DBname . ";charset=utf8", $userName, $userPassword);
        }
        catch(PDOException $erreur){
        
            echo "Error:" . $erreur->getMessage();
        }
        return $DBconnexion;
    }
}