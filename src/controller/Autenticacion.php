<?php
namespace Geeks\controller;
use Geeks\model\User as User;

class Autenticacion{
    private $salt = "StringAModificarParaHacerSeguro";
    private $u;

    function __construct (){
        session_start();

        $this->checkLogin();
    }

    public function register($email, $name, $surnames, $company, $age, $genre, $password){
        $passwordEncrypted = crypt($password, $this->salt);
        
        //Creamos el usuario
        $u=new User(
            $email,
            $name,
            $surnames,
            $age,
            $company,        
            $genre,
            $passwordEncrypted
        );


        //Registramos en la base de datos
        return $u->register();
    }

    public function updateUser($id, $data){
        $passwordEncrypted = crypt($data['password'], $this->salt);

        $u = new User(
            $data['email'],
            $data['name'],
            $data['surnames'],
            $data['age'],
            $data['company'],
            "",
            $data['password']
        );

        $u -> setId($id);

        //Actualizamos el usuario en la base de datos
        return $u -> update();
    }

    public function login($email = null, $password = null){
        $error=null;

        //Comprobamos los campos recibidos
        if($email == null || !isset($email) || strlen($email) == 0){
            $error = "Credenciales erróneas";
        }else if ($password == null || !isset($password) || strlen($password) == 0){
            $error = "Credenciales erróneas";
        }else {
            //Si los campos estan bien checkeamos que se correspondan con los del usuari de la BD
            $result = $this->checkUser($email, $password);

            if($result == false){
                $error = "Credenciales erróneas";
            }else{
                $_SESSION["id"]=$this->u->getId();
                $_SESSION["email"]=$this->u->getEmail();
                $_SESSION["role"]=$this->u->getRole();
                header('Location: index.php');
                return null;
            }
        }

        return $error;
    }

    public function checkLogin($user=null,$pass=null){
        $requestUri = basename($_SERVER["REQUEST_URI"]);

        //Si existe el id es porque el usuario esta loggeado y por tanto abandonamos la funcion
        if(isset($_SESSION['id'])){
            if($requestUri == "index.php"){
                header("Location: main.php");
            }
        }else if($requestUri != "index.php" && $requestUri != "register.php" && $requestUri != "login.php"){
                header("Location: index.php");
        }
    }


    private function checkUser($email=null,$password=null){
        
        //Creamos el objeto del modelo User
        $u=new User($email, "","","","","", crypt($password,$this->salt));

        //Seteamos nuestra variable $this->u global a $u para poder obtener sus datos en la funcion Login
        $this->u = $u;

        return $u->checkUser();
    }

    public function getUser($id){
        $u = new User();
        $u -> setId($id);
        return $u -> getUser();
    }

    public function getAsistants(){
        $u = new User();

        return $u->getAllUsers();
    }

    public function deleteAsistant($id){
        $u = new User();

        $u->setId($id);

        return $u->deleteUser();
    }


    


    

}