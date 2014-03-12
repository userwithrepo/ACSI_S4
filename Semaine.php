<?php

/**
 * Description of Semaine
 *
 * @author Stéphane
 */

include_once("Modele.php");

class Semaine extends Modele {

    protected $sem_sej;
    protected $du_sem;
    protected $au_em;
    protected $nbj_sem;

    public function getAttr($attr_name){
        if(property_exists(__CLASS__, $attr_name)){
            return $this->$attr_name;
        }
        $emess = __CLASS__ . ": unknow member $attr_name (getAttr)";
    }


    //Setter
    public function setAttr($attr_name, $attr_val){
        if(property_exists(__CLASS__, $attr_name)){
            $this->$attr_name = $attr_val;
        }
        $emess = __CLASS__ . ":unknow member $attr_name (setAttr)";
    }
    
    public function insert() {
        $pdo = BaseCLSH::getConnection();
        $tab = $this->genererTableau();
        $query = $pdo->prepare("INSERT INTO Semaine(du_sem, au_sem, nbj_sem) 
                                VALUES(:du_sem, :au_em, :nbj_sem);");
        $query->execute($tab);
    }
    
    public function update() {
        $pdo = BaseCLSH::getConnection();
        $tab = $this->genererTableau(true);
        $query = $pdo->prepare("UPDATE Semaine SET du_sem=:du_sem, au_em=:au_em,
                               nbj_sem=:nbj_sem WHERE sem_sej=:sem_sej");
        $query->execute($tab);
    }
    
    public function save() {
        if (isset($this->sem_sej)){
            return $this->update();
        } else {
            return $this->insert();
        }
    }
    
    public function delete() {
        $pdo = BaseCLSH::getConnection();
        $query = $pdo->prepare("DELETE FROM Semaine WHERE sem_sej = :sem_sej");
        $query->bindParam(":sem_sej", $this->sem_sej);
        $query->execute();
    }
    
    public static function findById($sem_sej) {
        $pdo = BaseCLSH::getConnection();
        $query = $pdo->prepare("SELECT * FROM Semaine WHERE sem_sej = :sem_sej");
        $query->bindParam(":sem_sej", $sem_sej);
        $query->execute();
        
        $data = $query->fetch(PDO::PARAM_STR);
        if($data === false) {
            return $data;
        } else {
           $s = new Semaine();
           $s->setAttr("sem_sej",$data["SEM_SEJ"]);
           $s->setAttr("du_sem",$data["DU_SEM"]);
           $s->setAttr("au_em",$data["AU_EM"]);
           $s->setAttr("nbj_sej",$data["NBJ_SEM"]);
           return $s;
        }
    }
}

?>