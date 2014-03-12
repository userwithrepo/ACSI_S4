<?php

/**
 * Description of PtAccueil
 *
 * @author Stéphane
 */

include_once('Modele.php');

class PtAccueil extends Modele {
    
    protected $arret_bus;
    protected $no_site;

    public function insert() {
        $pdo = BaseCLSH::getConnection();
        $query = $pdo->prepare("INSERT INTO PtAccueil VALUES(:arret_bus, :no_site);");
        $query->bindParam(":arret_bus", $this->arret_bus);
        $query->bindParam(":no_site", $this->no_site);
        $query->execute();
    }
    
    public function update() {
        $pdo = BaseCLSH::getConnection();
        $query = $pdo->prepare("UPDATE PtAccueil SET no_site=:no_site WHERE arret_bus = :arret_bus");
        $query->bindParam(":no_site", $this->no_site);
        $query->bindParam(":arret_bus", $this->arret_bus);
        $query->execute();
    }
    
    public function save() {
        if (isset($this->arret_bus)){
            return $this->update();
        } else {
            return $this->insert();
        }
    }
    
    public function delete() {
        $pdo = BaseCLSH::getConnection();
        $query = $pdo->prepare("DELETE FROM PtAccueil WHERE arret_bus = :arret_bus");
        $query->bindParam(":arret_bus", $this->arret_bus);
        $query->execute();
    }
    
    public static function findByArret($arret_bus) {
        $pdo = BaseCLSH::getConnection();
        $query = $pdo->prepare("SELECT * FROM PtAccueil WHERE arret_bus = :arret_bus");
        $query->bindParam(":arret_bus", $arret_bus);
        $query->execute();
        
        $data = $query->fetch(PDO::PARAM_STR);
        
        if($data === false) {
            return $data;
        } else {
            $pa = new PtAccueil();
            $pa->hydrate($data);
            return $pa;
        }
    }
}

?>