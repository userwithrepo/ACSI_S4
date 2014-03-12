<?php

/**
 * Description of Offre
 *
 * @author Stéphane
 */

include_once('Modele.php');

class Offre extends Modele {
    
    protected $no_unite;
    protected $sem_sej;
    protected $nb_places_offertes;
    protected $nb_places_occupees;
    
    
    public function insert() {
        
        $pdo = BaseCLSH::getConnection();
        $query = $pdo->prepare("INSERT INTO Offre VALUES(:no_unite, :sem_sej, :nb_pl_off, :nb_pl_occ");
        $query->bindParam(":no_unite", $this->no_unite);
        $query->bindParam(":sem_sej", $this->sem_sej);
        $query->bindParam(":nb_pl_off", $this->nb_places_offertes);
        $query->bindParam(":nb_pl_occ", $this->nb_places_occupees);
        
        $query->execute();

    }
    
    public function update() {
        if(!isset($this->no_unite) && !isset($this->sem_sej)) {
            throw new Exception(__CLASS__ . " non trouvée");
        }
        
        $pdo = BaseCLSH::getConnection();
        
        $query = $pdo->prepare("UPDATE Offre SET nb_places_offertes = :nb_pl_off, nb_places_occupees = :nb_pl_occ
                                WHERE no_unite = :no_unite AND sem_sej = :sem_sej");
        $query->bindParam(":nb_pl_off", $this->nb_places_offertes);
        $query->bindParam(":nb_pl_occ", $this->nb_places_occupees);
        $query->bindParam(":no_unite", $this->no_unite);
        $query->bindParam(":sem_sej", $this->sem_sej);
        
        $query->execute();
    }
    
    public function save() {
        if (isset($this->no_unite) && isset($this->sem_sej)){
            return $this->update();
        } else {
            return $this->insert();
        }
    }
    
    public function delete() {
        $pdo = BaseCLSH::getConnection();
        
        $query = $pdo->prepare("DELETE FROM Offre WHERE no_unite = :no_unite AND sem_sej :=sem_sej");
  $query->bindParam(":no_enf", $this->no_unite);
        $query->bindParam(":sem_sej", $this->sem_sej);
  $query->execute(); 
    }
    
    public static function findByUnitETSem($no_unite, $sem_sej) {
        $pdo = BaseCLSH::getConnection();
        
        $query = $pdo->prepare("SELECT * FROM Offre WHERE no_unite = :no_unite AND sem_sej = :sem_sej");
        $query->bindParam(":no_unite", $no_unite);
        $query->bindParam(":sem_sej", $sem_sej);
        $query->execute();
        
        $data = $query->fetch(PDO::PARAM_STR);
        
        if($data === false) {
            return $data;
        } else {
            $o = new Offre();
            $o->hydrate($data);
            return $o;
        }
    }



        public static function findByUnit($no_unite) {
        $pdo = BaseCLSH::getConnection();
        
        $query = $pdo->prepare("SELECT * FROM Offre WHERE no_unite = :no_unite");
        $query->bindParam(":no_unite", $no_unite);
        $query->execute();
        
        $data = $query->fetch(PDO::PARAM_STR);
        
        if($data === false) {
            return $data;
        } else {
            $o = new Offre();
            $o->hydrate($data);
            return $o;
        }
        
    }
}

?>