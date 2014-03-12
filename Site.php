<?php

/**
 * Description of Site
 *
 * @author Stéphane
 */

include_once('Modele.php');

class Site extends Modele {
    
    protected $no_site;
    protected $nom_site;


    //Getter
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
    
    
    public function insert(){
        $nb = 0;
        $pdo = BaseCLSH::getConnection();
        $query = $pdo->prepare("INSERT INTO Site(nom_site) VALUES(:nom_site);");
        $query->bindParam(":nom_site", $this->nom_site);
        $query->execute();
        $this->setAttr("no_site", $c->LastInsertId());
        return $nb;
        
    }


    
    public function update() {
        $pdo = BaseCLSH::getConnection();
        $query = $pdo->prepare("UPDATE Site SET nom_site=:nom_site WHERE no_site = :no_site");
        $query->bindParam(":nom_site", $this->nom_site);
        $query->bindParam(":no_site", $this->no_site);
    }
    
    public function save() {
        if (isset($this->no_site)){
            return $this->update();
        } else {
            return $this->insert();
        }
    }
    
    public function delete() {
        $pdo = BaseCLSH::getConnection();
        $query = $pdo->prepare("DELETE FROM Site WHERE no_site=:no_site");
        $query->bindParam(":no_site", $this->no_site);
        $query->execute();
    }
    
    public static function findById($no_site) {
        $pdo = BaseCLSH::getConnection();
        $query = $pdo->prepare("SELECT * FROM Site WHERE no_site = :no_site");
        $query->bindParam(":no_site", $no_site);
        $query->execute();
        
        $data = $query->fetch(PDO::PARAM_STR);
        
        if($data === false) {
            return $data;
        } else {
            $s = new Site();
            //var_dump($data);
            /*
            $s->hydrate($data);
            */
            $s->setAttr("no_site", $data["NO_SITE"]);
            $s->setAttr("nom_site", $data["NOM_SITE"]);
            return $s;
        }
    }


    public static function findByName($nom_site) {
        $pdo = BaseCLSH::getConnection();
        $query = $pdo->prepare("SELECT * FROM Site WHERE nom_site = :nom_site");
        $chaine = '"'.$nom_site.'"';
        $query->bindParam(":nom_site", $chaine);
        $query->execute();
        
        $data = $query->fetch(PDO::PARAM_STR);
        
        if($data === false) {
            return $data;
        } else {
            $s = new Site();
            $s->hydrate($data);
            return $s;
        }
        
    }


    public static function findByTitre($nom_site){
        $query = "select * from Site where nom_site = :nom_site";
        $c = BaseCLSH::getConnection();
        $dbres = $c->prepare($query);
        $dbres->bindParam(':nom_site', $nom_site);
        $dbres->execute();
        $data = $dbres->fetch(PDO::PARAM_STR);
        
        if($data === false) {
            return $data;
        } else {
            $s = new Site();
            $s->hydrate($data);
            return $s;
        }
    }

  


    public static function findAllk() {
        $pdo = BaseCLSH::getConnection();
        $query = $pdo->prepare("SELECT * FROM Site");
        $query->execute();
        $d = $query->fetchAll();
        $tab = Array();
        foreach ($d as $ligne) {
            $site = new Site();
            /*
            $data=array(
                'no_site' => $d['no_site'],
                'nom_site'=>$d['nom_site']
            );
            */
            $site->setAttr("no_site", $ligne["no_site"]);
            $site->setAttr("nom_site", $ligne["nom_site"]);
            //$site->hydrate($data);
            array_push($tab, $site);
        }
        return $tab;
    }

    public static function findAll(){
        $query = "select * from site;";
        $pdo = BaseCLSH::getConnection();
        $dbres = $pdo->prepare($query);
        $dbres->execute();
        $d = $dbres->fetchAll(PDO::PARAM_STR);
        $tab = Array();
        foreach($d as $ligne){
            $site = new Site();
            $site->setAttr("no_site", $ligne["NO_SITE"]);
            $site->setAttr("nom_site", $ligne["NOM_SITE"]);
            
            array_push($tab, $site);
        }

        return $tab;
    }



    
}

?>