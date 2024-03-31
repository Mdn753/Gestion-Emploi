<?php
    require 'model.class.php';
    class ctrl{
        private $m;
        public function __construct()
        {
            $this->m=new Model();
        }
        public function loginAction(){
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_POST['username']) && isset($_POST['mdp']) && isset($_POST['role'])){
                    $username = $_POST['username'];
                    $mdp = $_POST['mdp'];
                    $role = $_POST['role'];
        
                    $user = $this->m->login($username, $mdp, $role);
                    
                    if ($user){
                        switch($role){
                            case "admin":
                                header("Location: ViewAdmin.php");
                                exit();
                            case "enseignant":
                                header("Location: ViewEnseignant.php");
                                exit();
                            case "etudiant":
                                header("Location: ViewEtudiant.php");
                                exit();
                        }
                    } else {
                        echo "Login failed";
                    }
                } else {
                    echo "Missing username, password, or role field";
                }
            }
        }
        
        public function action($action){
            switch($action){
                case "login":
                    $this->loginAction();
                    break;
            }
        }
    }
$ctrl = new ctrl();
$action = isset($_GET['action']);// ? $_GET['action'] : 'login';
$ctrl->action($action);
?>