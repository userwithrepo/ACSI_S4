<?php

/**
 * Description of Unite
 *
 * @author Stéphane
 */

include_once("Modele.php");

class Unite extends Modele {
    
    private $no_unite;
    private $no_site_possede;
    private $no_site;
    private $nom_unite;

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
        $query = $pdo->prepare("INSERT INTO Unite(no_site_possède, no_site, nom_unité) 
                                VALUES(:no_site_possede, :no_site, :nom_unite");
        $query->execute($tab);
    }

    public function update() {
        $pdo = BaseCLSH::getConnection();
        $tab = $this->genererTableau(true);
        $query = $pdo->prepare("UPDATE Unite SET no_site_possède = :no_site_possede, no_site = :no_site,
                                nom_unité = :nom_unite WHERE no_unite = :no_unite");
        $query->execute($tab);
    }
    
    public function save() {
        if (isset($this->no_unite)){
            return $this->update();
        } else {
            return $this->insert();
        }
    }
    
    public function delete() {
        $pdo = BaseCLSH::getConnection();
        $query = $pdo->prepare("DELETE FROM Unite WHERE no_unite=:no_unite");
        $query->bindParam("no_unite", $this->no_unite);
        $query->execute();
    }

    

    
    public static function findAllById($no_unite) {
        $pdo = BaseCLSH::getConnection();
        $query = $pdo->prepare("SELECT * FROM Unite WHERE no_site_possède=:no_site_possede");
        $query->bindParam(":no_site_possede", $no_unite);
        $query->execute();
        
        $data = $query->fetchAll();
        $tab = Array();
        foreach ($data as $ligne) {
            # code...
        
            $u = new Unite();
            $u->setAttr("no_unite", $ligne["NO_UNITE"]);
            $u->setAttr("no_site_possede", $ligne["NO_SITE_POSSÈDE"]);
            $u->setAttr("no_site", $ligne["NO_SITE"]);
            $u->setAttr("nom_unite", $ligne["NOM_UNITÉ"]);
            array_push($tab, $u);
        }
        return $tab;
    }
    
    public static function findByNom($nom_unite) {
        $pdo = BaseCLSH::getConnection();
        $query = $pdo->prepare("SELECT * FROM Unite WHERE nom_unité=:nom_unite");
        $query->bindParam(":nom_unite", $nom_unite);
        $query->execute();
        
        $data = $query->fetch(PDO::PARAM_STR);
        
        if($data == false) {
            return $data;
        } else {
            $u = new Unite();
            $u->hydrate($data);
            return $u;
        }
    }
}

?>