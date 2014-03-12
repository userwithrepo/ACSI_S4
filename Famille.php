<?php

/**
 * Description of Famille
 *
 * @author Stéphane
 */

include_once('Modele.php');


class Famille extends Modele {
    
    private $no_fam;
    private $nom_resp;
    private $pre_resp;
    private $type_resp;
    private $adr_resp;
    private $tel_resp;
    private $noalloc_caf_resp;
    private $qf_resp;
    private $en_ville;
    private $bons_vac;
    private $mail;
    private $password;


    public function getAttr($attr_name){
        if(property_exists(__CLASS__, $attr_name)){
            return $this->$attr_name;
        }
        $emess = __CLASS__ . ": unknown member $attr_name (getAttr)";
        throw new Exception($emess, 45);
    }



    public function setAttr($attr_name, $attr_val){
        if(property_exists(__CLASS__, $attr_name)){
            $this->$attr_name=$attr_val;
            return $this->$attr_name;
        }
        $emess = __CLASS__ . ": unknown member $attr_name (setAttr)";
        throw new Exception($emess, 45);
    }

   
    
    public function insert() {
        
        $nb = 0;
        $pdo = BaseCLSH::getConnection();
        $salt = $this->mail;
        $query = "INSERT INTO famille VALUES(null,
                                            '".$this->nom_resp."',
                                            '".$this->pre_resp."',
                                            '".$this->type_resp."',
                                            '".$this->adr_resp."',
                                            '".$this->tel_resp."',
                                            '".$this->noalloc_caf_resp."',
                                            '".$this->qf_resp."',
                                            '".$this->en_ville."',
                                            '".$this->bons_vac."',
                                            '".sha1(sha1($this->password).$salt)."',
                                            '".$this->mail."'
                                            )";
        
        $nb = $pdo->exec($query);
        $this->setAttr("no_fam", $pdo->LastInsertId());
        
        
        return $nb;
    }

    

    public function updatel() {
        if(!isset($this->no_fam)) {
            throw new Exception(__CLASS__ . " non trouvée");
        }
        
        $tab = $this->genererTableau(true);
        $pdo = BaseCLSH::getConnection();
        
        $query = $pdo->prepare("UPDATE Famille SET nom_resp=:nom_resp, pre_resp=:pre_resp, type_resp=:type_resp, 
                                    adr_resp=:adr_resp, tel_resp=:tel_resp, noalloc_caf_resp=:noalloc_caf_resp, 
                                    qf_resp=:qf_resp, en_ville=:en_ville, bons_vac=:bons_vac, mail=:mail, password=:password WHERE no_fam=:no_fam");
        
        $query->execute($tab);
         
    }


    public function update(){
        if(!isset($this->no_fam)){
            throw new Exception(__CLASS__ . ":Clé primaire non définie, update impossible");
        }

        $c = BaseCLSH::getConnection();
        $query = $c->prepare("UPDATE Famille set NOM_RESP= ?,
                                                 PRE_RESP= ?
                                                 ADR_RESP= ?
                                                 TEL_RESP= ?
                                                 NOALLOC_CAF_RESP= ?
                                                 EN_VILLE= ?
                                                 BONS_VAC= ? where NO_FAM= ?");

        $query->bindParam (1, $this->nom_resp, PDO::PARAM_STR);
        $query->bindParam (2, $this->pre_resp, PDO::PARAM_STR);
        $query->bindParam (3, $this->adr_resp, PDO::PARAM_STR);
        $query->bindParam (4, $this->tel_resp, PDO::PARAM_STR);
        $query->bindParam (5, $this->noalloc_caf_resp, PDO::PARAM_STR);
        $query->bindParam (6, $this->en_ville, PDO::PARAM_STR);
        $query->bindParam (7, $this->bons_vac, PDO::PARAM_STR);
        $query->bindParam (8, $this->no_fam, PDO::PARAM_STR);

        var_dump($this);

      //UPDATE Famille set pre_resp = 'Alexandra' where no_fam = 3

        return $query->execute();

    }


    //Met à jour le billet
    public function updatelol(){
        $c = Base::getConnection();

        $query = $c->prepare ("update billets set titre= ?, body= ?,
            date= ?, cat_id= ?, auteur= ?
            where id= ?");

        //Liaison des paramètres
        $query->bindParam (1, $this->titre, PDO::PARAM_STR);
        $query->bindParam (2, $this->body, PDO::PARAM_STR);
        $today = date("Y-m-d H:i:s");
        $query->bindParam (3, $today, PDO::PARAM_STR);//date est considérée comme String
        $query->bindParam (4, $this->cat_id, PDO::PARAM_STR);
        $query->bindParam (5, $this->auteur, PDO::PARAM_STR);
        $query->bindParam (6, $this->id, PDO::PARAM_STR);

        //exécution de la requête
        return $query->execute();
    }

    
        
    public function save() {
        if (isset($this->no_fam)){
            return $this->update();
        } else {
            return $this->insert();
        }
    }
    
    public function delete() {
        $pdo = BaseCLSH::getConnection();
        
        $query = $pdo->prepare("DELETE FROM Famille WHERE no_fam = :no_fam");
  $query->bindParam(":no_fam", $this->no_fam);
  $query->execute();
    }
    
    public static function findById($no_fam) {
        $pdo = BaseCLSH::getConnection();
        
        $query = $pdo->prepare("SELECT * FROM Famille WHERE no_fam = :no_fam");
        $query->bindParam(':no_fam', $no_fam);
        $query->execute();
        
        $data = $query->fetch(PDO::PARAM_STR);
        
        if($data === false) {
            return $data;
        } else {
            $f = new Famille();
            $f->hydrate($data);        
        
            return $f;
        }
    }
    
    public static function findByNomPrenom($nom, $prenom) {
        $pdo = BaseCLSH::getConnection();
        
        $query = $pdo->prepare("SELECT * FROM Famille WHERE nom_resp = :nom_resp AND pre_resp=:pre_resp");
        $query->bindParam(':nom_resp', $nom);
        $query->bindParam(':pre_resp', $prenom);
        $query->execute();
        
        $data = $query->fetch(PDO::PARAM_STR);
        
        if($data === false) {
            return $data;
        } else {
            $f = new Famille();
            $f->hydrate($data);        
        
            return $f;
        }
    }


    public static function findByMail($mail) {
        $c = BaseCLSH::getConnection();
        $query = "SELECT * FROM famille where mail = :mail";
        $dbres = $c->prepare($query);
        $dbres->bindParam(':mail', $mail);
        $dbres->execute();
        $famille = false;
        $d = $dbres->fetch(PDO::FETCH_OBJ);
        if($d != false){
            $famille = new Famille();
            $famille->setAttr("no_fam", $d->NO_FAM);
            $famille->setAttr("nom_resp", $d->NOM_RESP);
            $famille->setAttr("pre_resp", $d->PRE_RESP);
            $famille->setAttr("type_resp", $d->TYPE_RESP);
            $famille->setAttr("adr_resp", $d->ADR_RESP);
            $famille->setAttr("tel_resp", $d->TEL_RESP);
            $famille->setAttr("noalloc_caf_resp", $d->NOALLOC_CAF_RESP);
            $famille->setAttr("qf_resp", $d->QF_RESP);
            $famille->setAttr("en_ville", $d->EN_VILLE);
            $famille->setAttr("bons_vac", $d->BONS_VAC);
            $famille->setAttr("mail", $d->mail);
            $famille->setAttr("password", $d->password);
        }
        return $famille;

    }


    public static function findByNom($nom) {
        $c = BaseCLSH::getConnection();
        $query = "SELECT * FROM famille where nom_resp = :nom";
        $dbres = $c->prepare($query);
        $dbres->bindParam(':nom', $nom);
        $dbres->execute();
        $famille = 'false';
        $d = $dbres->fetch(PDO::FETCH_OBJ);
        if($d != false){
            $famille = new Famille();
            $famille->setAttr("no_fam", $d->NO_FAM);
            $famille->setAttr("nom_resp", $d->NOM_RESP);
            $famille->setAttr("pre_resp", $d->PRE_RESP);
            $famille->setAttr("type_resp", $d->TYPE_RESP);
            $famille->setAttr("adr_resp", $d->ADR_RESP);
            $famille->setAttr("tel_resp", $d->TEL_RESP);
            $famille->setAttr("noalloc_caf_resp", $d->NOALLOC_CAF_RESP);
            $famille->setAttr("qf_resp", $d->QF_RESP);
            $famille->setAttr("en_ville", $d->EN_VILLE);
            $famille->setAttr("bons_vac", $d->BONS_VAC);
            $famille->setAttr("mail", $d->mail);
            $famille->setAttr("password", $d->password);
        }
        return $famille;

    }



}

?>