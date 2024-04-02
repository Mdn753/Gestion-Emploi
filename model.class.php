<?php
    class Model{
        private $DB;
        public function __construct(){
            define('USER','root');
            define('PASS','');
            try {
                $this->DB = new PDO('mysql:host=localhost;dbname=get', USER, PASS);
                // Set PDO error mode to exception
                $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                // Print PDO exception message
                echo "Connection failed: " . $e->getMessage();
            }
        }
        
        public function login($username, $mdp, $role){
            $query = $this->DB->prepare("SELECT * FROM $role WHERE Email=? AND MDP=?");
            $query->execute([$username, $mdp]);
            $user=$query->fetch(PDO::FETCH_ASSOC);
            return $user;
        }
        public function addEtudiant($etu){
            $query=$this->DB->prepare('INSERT INTO etudiant (Id_Etudiant, Nom, Prenom, filiere, Email, MDP) VALUES (?,?,?,?,?,?)');
            $query->execute([$etu[0],$etu[1],$etu[2],$etu[3],$etu[4],$etu[5]]);
        }
        public function addEnseignant($ens){
            $query=$this->DB->prepare('INSERT INTO enseignant (Id_Enseignant, Nom, Prenom, matiere, Email, MDP) VALUES (?,?,?,?,?,?)');
            $query->execute([$ens[0],$ens[1],$ens[2],$ens[3],$ens[4],$ens[5]]);
        }
        public function addEmploiFiliere($emp){
            $query=$this->DB->prepare('INSERT INTO emploi_filiere (filiere, jour_semaine, heure_debut, heure_fin, Id_salle, Id_Enseignant, matiere) VALUES (?,?,?,?,?,?,?) ');
            $query->execute([$emp[0],$emp[1],$emp[2],$emp[3],$emp[4],$emp[5],$emp[6]]);
        }
        public function AllEnseignant(){
            $query=$this->DB->prepare('SELECT * FROM enseignant');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        public function AllEtudiant(){
            $query=$this->DB->prepare('SELECT * FROM etudiant');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getEmploiFiliere($filiere){
            $query=$this->DB->prepare('SELECT * FROM emploi_filiere WHERE filiere=?');
            $query->execute([$filiere]);
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getEmploiEnseignant($Id_Enseignant){
            $query=$this->DB->prepare('SELECT * FROM emploi_enseignant WHERE Id_Enseignant=?');
            $query->execute([$Id_Enseignant]);
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>