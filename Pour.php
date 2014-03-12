<?php

/**
 * Description of Pour
 *
 * @author Stéphane
 */

include_once('Modele.php');

class Pour extends Modele {
    
    protected $no_inscription;
    protected $sem_sej;
    
    
    public function insert() {
        $pdo = BaseCLSH::getConnection();
        $query = $pdo->prepare("INSERT INTO Pour VALUES(:no_inscription, :sem_sej);");
        $query->bindParam(":no_inscription", $this->no_inscription);
        $query->bindParam(":sem_sej", $this->sem_sej);
        $query->execute();
    }
    
    public function update() {}
    
    public function save() {
        return $this->insert();
    }
    
    public function delete() {
        $pdo = BaseCLSH::getConnection();
        $query = $pdo->prepare("DELETE FROM Pour WHERE no_inscription=:no_inscription AND sem_sej=:sem_sej;");
        $query->bindParam(":no_inscription", $this->no_inscription);
        $query->bindParam(":sem_sej", $this->sem_sej);
        $query->execute();
    }
    
    public static function findByInscription($no_inscription) {
        $pdo = BaseCLSH::getConnection();
        $query = $pdo->prepare("SELECT * FROM Pour WHERE no_inscription=:no_inscription");
        $query->bindParam(":no_inscription", $no_inscription);
        $query->execute();
        
        $data = $query->fetchAll(PDO::PARAM_STR);
        
        if($data === false) {
            return $data;
        } else {
            $tab_pours = array();

            foreach($data as $pour) {
                $p = new Pour();
                $p->hydrate($pour);
                $tab_pours[] = $p;
            }

            return $tab_pours;
            
        }
    }
}

?>