<?php

##Implementando um login e senha

class Controller {
    public $mensagem;


    public function __construct() {

        ini_set('error_reporting', E_ALL);
        ini_set('display_errors', 1);
    }
    
    public function init() {       
        
        if (isset($_SESSION['valid'])){
            
            if (isset($_GET['op'])) {
                $op = $_GET['op'];
            } else {
                $op = "";
            }
          
            switch ($op) {
            case 'cfg':
                $this->cfg();
                break;
            case 'logout':
                $this->logout();
                break;
            default:
                $this->index();
                break;
            }
            
        }else{
            $this->login();
        }

        
    }

    
    public function index() {
        require 'View/index.php';
    }

    public function login() {
        if (isset($_POST['login']) && !empty($_POST['usuario']) && !empty($_POST['senha'])) {
                $this->valida_login();
        } else{
            if(isset($_SESSION['mensagem'])==false){
                $_SESSION['mensagem']='';
            }            
            require 'View/login.php';
        }
    }


    public function valida_login() {

            if ($_POST['usuario'] == 'teste' && $_POST['senha'] == '1234') {
                $_SESSION['valid'] = true;
                $_SESSION['timeout'] = time();
                $_SESSION['usuario'] = 'Rasp_levins';
            }else {
                unset($_POST);
                $_SESSION['mensagem'] = 'Usuário ou senha incorreto!';
            }

            $this->init();


    }

    public function logout() {
        // Apaga todas as variáveis da sessão
        $_SESSION = array();

        // Se é preciso matar a sessão, então os cookies de sessão também devem ser apagados.
        // Nota: Isto destruirá a sessão, e não apenas os dados!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                      $params["path"], $params["domain"],
                      $params["secure"], $params["httponly"]
            );
        }

        // Por último, destrói a sessão
        session_destroy();


        //Começa outra sessão
        session_start();

        $this->init();

    }

    public function cfg() {
        require 'View/configuracao.php';
    }
}
?>