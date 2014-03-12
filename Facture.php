<?php

/**
 * Description of Facture
 *
 * @author Stéphane
 */

include_once('Modele.php');

class Facture extends Modele {
    protected $no_fact;
    protected $date_fact;
    protected $montant_fact;
        
    public function insert() {
        
        $pdo = BaseCLSH::getConnection();
        
        $query = $pdo->prepare("INSERT INTO Facture(date_fact, montant_fact) VALUES(:date_fact, :montant_fact);");
        $query->bindParam(':date_fact', $this->date_fact);
        $query->bindParam(':montant_fact', $this->montant_fact);
        
        $query->execute();
        
    }
    
    public function update() {
                 
        if(!isset($this->no_fact)) {
            throw new Exception(__CLASS__ . " non trouvée");
        }
        
        $pdo = BaseCLSH::getConnection();
        
        $query = $pdo->prepare('UPDATE Facture SET date_fact = :date_fact, montant_fact = :montant_fact
                                      WHERE no_fact = :no_fact');
        $query->bindParam(':date_fact', $this->date_fact);
        $query->bindParam(':montant_fact', $this->montant_fact);
        $query->bindParam(':no_fact', $this->no_fact);
        $query->execute();
    }
    
    public function save() {
        if (isset($this->no_fact)){
            return $this->update();
        } else {
            return $this->insert();
        }
    }
    
    public function delete() {  
        $pdo = BaseCLSH::getConnection();
        
        $query = $pdo->prepare("DELETE FROM Facture WHERE no_fact = :no_fact");
  $query->bindParam(":no_fact", $this->no_fact);
  $query->execute();
    }
    
    public static function findById($no_fact) {
        $pdo = BaseCLSH::getConnection();
        
        $query = $pdo->prepare("SELECT * FROM Facture WHERE no_fact = :no_fact");
        $query->bindParam(':no_fact', $no_fact);
        $query->execute();
        
        $data = $query->fetch(PDO::PARAM_STR);
        
        if($data === false) {
            return $data;
        } else {
            $f = new Facture();
            $f->hydrate($data);
        
            return $f;
        }
    }
}

?>