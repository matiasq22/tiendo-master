<?php
require_once 'models/users/User.php';
class UsersController
{
    public function index()
    {
        require_once 'views/users/index.php';
    }

    public function register(){
        require_once 'views/users/register.php';
    }

    public function save(){
       if (isset($_POST)){
           $name = isset($_POST['name']) ? $_POST['name'] : false;
           $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : false;
           $email = isset($_POST['email']) ? $_POST['email'] : false;
           $pass = isset($_POST['pass']) ? $_POST['pass'] : false;

           $validate = new Utils();
           $val = $validate->validateVars($name,$lastname,$email,$pass);



            if ($val['name'] == false) {
                $_SESSION['errors'] = "Ingrese un Nombre Valido";
            }elseif ($val['lastname'] == false) {

                $_SESSION['errors'] = "Ingrese un Apellido Valido";
            }elseif($val['email'] == false) {

                $_SESSION['errors'] = "Ingrese un email Valido";
            }elseif($val['pass'] == false){

                $_SESSION['errors'] = "Password invalido";
            }else{
                $user = new User();
                $user->setName($name);
                $user->setLastname($lastname);
                $user->setEmail($email);
                $user->setPassword($pass);
                $save = $user->save();
            }

            if ($save){
                $_SESSION['register'] = "complete";
            }else{
                $_SESSION['register'] = "failed";
            }

            header('Location:'.base_url.'Users/register');
       }
    }

    public function login(){
        if (isset($_POST)){
            $email = $_POST['email'];
            $pass = $_POST['password'];
            //Validate User and created Session
            $user = new User();
            $user->setEmail($email);
            $user->setPassword($pass);
            $login =  $user->login();
        }

        if ($login && is_object($login)){
            $_SESSION['login'] = $login;
            if ($login->profile == "admin"){
                $_SESSION['admin'] = true;
            }
        }else{
            $_SESSION['error_login'] = true;
        }
        header('Location:'.base_url);
    }

    public function logout(){
        if (isset($_SESSION['login'])){
             unset($_SESSION['login']);

             if (isset($_SESSION['admin'])){
                 unset($_SESSION['admin']);
             }
        }

        header("Location:".base_url);
    }

}