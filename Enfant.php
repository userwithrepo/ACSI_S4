<?php

/**
 * Description of Enfant
 *
 * @author Stéphane
 */
include_once('Modele.php');

class Enfant extends Modele {
    
    protected $no_enf;
    protected $no_fam;
    protected $nom_enf;
    protected $prenom_enf;
    protected $adr_enf;
    protected $sexe_enf;
    protected $datn_enf;
    protected $lieu_naiss_enf;
    
    
    public function insert() {
        $tab = $this->genererTableau();
        $pdo = BaseCLSH::getConnection();
        
        $query = $pdo->prepare("INSERT INTO Enfant(no_fam, nom_enf, prenom_enf, adr_enf, sexe_enf, datn_enf, lieu_naiss_enf) VALUES 
                                    (:no_fam, :nom_enf, :prenom_enf, :adr_enf, :sexe_enf, :datn_enf, :lieu_naiss_enf);");
        
        $query->execute($tab);   
    }
    public function update() {
         if(!isset($this->no_enf)) {
            throw new Exception(__CLASS__ . " non trouvé");
        }
        
        $tab = $this->genererTableau(true);
        $pdo = BaseCLSH::getConnection();
        
        $query = $pdo->prepare("UPDATE Enfant SET no_fam=:no_fam, nom_enf=:nom_enf, prenom_enf=:prenom_enf, adr_enf=:adr_enf, 
                                sexe_enf=:sexe_enf, datn_enf=:datn_enf, lieu_naiss_enf=:lieu_naiss_enf 
                                WHERE no_enf=:no_enf");
        
        $query->execute($tab);

    }
    public function save() {
        if (isset($this->no_enf)){
            return $this->update();
        } else {
            return $this->insert();
        }
    }
    
    public function delete() {
        $pdo = BaseCLSH::getConnection();
        
        $query = $pdo->prepare("DELETE FROM Enfant WHERE no_enf = :no_enf");
  $query->bindParam(":no_enf", $this->no_enf);
  $query->execute();
    }
    
    public static function findById($no_enf) {
        $pdo = BaseCLSH::getConnection();
        
        $query = $pdo->prepare("SELECT * FROM Enfant WHERE no_enf = :no_enf");
        $query->bindParam(':no_enf', $no_enf);
        $query->execute();
        
        $data = $query->fetch(PDO::PARAM_STR);
        
        if($data === false) {
            return $data;
        } else {
            $e = new Enfant();
            $e->hydrate($data);
        
            return $e;
        }
    }
    
    public static function findByNomPrenom($nom, $prenom) {
        $pdo = BaseCLSH::getConnection();
        
        $query = $pdo->prepare("SELECT * FROM Enfant WHERE nom_enf = :nom_enf AND prenom_enf=:prenom_enf");
        $query->bindParam(':nom_enf', $nom);
        $query->bindParam(':prenom_enf', $prenom);
        $query->execute();
        
        $data = $query->fetch(PDO::PARAM_STR);
        
        if($data === false) {
            return $data;
        } else {
            $e = new Enfant();
            $e->hydrate($data);        
        
            return $e;
        }
    }
    
    public static function findByFamille($no_fam) {
        $pdo = BaseCLSH::getConnection();
        
        $query = $pdo->prepare("SELECT * FROM Enfant WHERE no_fam = :no_fam");
        $query->bindParam(':no_fam', $no_fam);
        $query->execute();
        
        $data = $query->fetchAll(PDO::PARAM_STR);
        $tab_enf = array();
        
        
        if($data === false) {
            return $data;
        } else {
            
            foreach($data as $enf) {
                $e = new Enfant();
                $e->hydrate($enf); 
                $tab_enf[] = $e;
            }
            
            return $tab_enf;
      }
    }
}

?>