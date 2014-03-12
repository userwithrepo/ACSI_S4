<?php

/**
 * Description of newPHPClass
 *
 * @author Stéphane
 */

include_once('Modele.php');

class Inscription extends Modele {
    
    protected $no_inscription;
    protected $no_fact;
    protected $arret_bus;
    protected $no_unite;
    protected $no_enf;
    protected $deduc_jour;
    protected $nom_accompagnateur_enf;
    protected $pre_accompagnateur_enf;
    protected $montant_inscr;
    protected $lieu_inscr;
        
    public function insert() {
        
        $tab = $this->genererTableau();
        $pdo = BaseCLSH::getConnection();
        
        $query = $pdo->prepare("INSERT INTO Inscription(no_fact, arret_bus, no_unit, no_enf, deduc_jour, nom_accompagnateur_enf,
                                pre_accompagnateur_enf, montant, lieu_inscr) VALUES(:no_fact, :arret_bus, :no_unit, :no_enf,
                                :deduc_jour, :nom_accompagnateur_enf, :pre_accompagnateur_enf, :montant, :lieu_inscr)");
                
        $query->execute($tab);
    }

    public function update() {
                
        if(!isset($this->no_inscription)) {
            throw new Exception(__CLASS__ . " non trouvée");
        }
        
        $tab = $this->genererTableau(true);
        $pdo = BaseCLSH::getConnection();
        
        $query = $pdo->prepare("UPDATE Inscription SET no_fact=:no_fact, arret_bus=:arret_bus, no_unit=:no_unit, 
                                no_enf,=:no_enf, deduc_jour=:deduc_jour, nom_accompagnateur_enf=:nom_accompagnateur_enf, 
                                pre_accompagnateur_enf=:pre_accompagnateur_enf, montant=:montant, lieu_inscr=:lieu_inscr
                                WHERE no_inscription=:no_inscription");
                
        $query->execute($tab);
    }
    
    public function save() {
        if (isset($this->no_inscription)){
            return $this->update();
        } else {
            return $this->insert();
        }
    }
    
    public function delete() {
        $pdo = BaseCLSH::getConnection();
        
        $query = $pdo->prepare("DELETE FROM Inscription WHERE no_inscription = :no_inscription");
  $query->bindParam(":no_inscription", $this->no_inscription);
  $query->execute();
    }
    
    public static function findById($no_inscription) {
        $pdo = BaseCLSH::getConnection();
        
        $query = $pdo->prepare("SELECT * FROM Inscription WHERE no_inscription = :no_inscription");
        $query->bindParam(':no_inscription', $this->no_inscription);
        $query->execute();
        
        $data = $query->fetch(PDO::PARAM_STR);
        
        if($data === false) {
            return $data;
        } else {
            $i = new Inscription();
            $i->hydrate($data);

            return $i;
        }
        
    }
    
    public static function findByEnfant($no_enf) {
        $pdo = BaseCLSH::getConnection();
        
        $query = $pdo->prepare("SELECT * FROM Inscription WHERE no_enf = :no_enf");
        $query->bindParam(':no_enf', $this->no_enf);
        $query->execute();
        
        $inscriptions = $query->fetchAll(PDO::PARAM_STR);
        $tabInscription = array();
        
        foreach($inscriptions as $inscription) {
            $i = new Inscription();
            $i->hydrate($inscription);
            
            $tabInscription[] = $i;
        }
        
        return $tabInscription;
    }
    
}

?>