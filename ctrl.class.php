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
                        session_start();
                        $_SESSION['user']=$user;
                        $_SESSION['role']=$role;

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

        public function addEtudiantAction(){
            if (isset($_POST['Id_Etudiant'],$_POST['Nom'],$_POST['Prenom'],$_POST['filiere'],$_POST['Email'],$_POST['MDP'])){
                $etu=array(
                    $_POST['Id_Etudiant'],
                    $_POST['Nom'],
                    $_POST['Prenom'],
                    $_POST['filiere'],
                    $_POST['Email'],
                    $_POST['MDP']
                );
                $this->m->addEtudiant($etu);
                header("location: ViewAdmin.php");
                exit();
            }
        }

        public function addEnseignantAction(){
            if(isset($_POST['Id_Enseignant'],$_POST['Nom'],$_POST['Prenom'],$_POST['matiere'],$_POST['Email'],$_POST['MDP'])){
                $ens=array(
                    $_POST['Id_Enseignant'],
                    $_POST['Nom'],
                    $_POST['Prenom'],
                    $_POST['matiere'],
                    $_POST['Email'],
                    $_POST['MDP']
                );
                $this->m->addEnseignant($ens);
                header("location: ViewAdmin.php");
                exit();
            }
        }
        
        public function addEmploiFiliereAction(){
            if (isset($_POST['filiere'],$_POST['jour_semaine'],$_POST['heure_debut'],$_POST['heure_fin'],$_POST['Id_salle'],$_POST['Id_Enseignant'],$_POST['matiere'])){
                $emp=array(
                    $_POST['filiere'],
                    $_POST['jour_semaine'],
                    $_POST['heure_debut'],
                    $_POST['heure_fin'],
                    $_POST['Id_salle'],
                    $_POST['Id_Enseignant'],
                    $_POST['matiere']
                );
                $this->m->addEmploiFiliere($emp);
                header("location: ViewAdmin.php");
                exit();
            }
        }

        public function action($action){
            switch($action){
                case "login":
                    $this->loginAction();
                    break;
                case "addEtudiant":
                    $this->addEtudiantAction();
                    break;
                case "addEnseignant":
                    $this->addEnseignantAction();
                    break;
                case "addEmploiFiliere":
                    $this->addEmploiFiliereAction();
                    break;
            }
        }
    }
$ctrl = new ctrl();
$action = isset($_GET['action']) ? $_GET['action'] : 'login';
$ctrl->action($action);
?>