<?php

/**
 * Description of Modele
 *
 * @author Stéphane
 */
include_once('BaseCLSH.php');

abstract class Modele {
        
    public function __construct() { }
    
    public function getAttr($attr_name) {
        if(property_exists($this, $attr_name)) {
            return $this->$attr_name;
        }
        
        $emess = ": Attribut $attr_name inconnu";
        throw new Exception($emess, 45);
    }
    
    public function setAttr($attr_name, $valeur) {
        
        $attr_name = strtolower($attr_name);
        
        if(property_exists($this, $attr_name)) {
            $this->$attr_name = htmlspecialchars($valeur);
            return $this;
        }
        
        $emess = ": Attribut $attr_name inconnu";
        throw new Exception($emess, 45);
    }
    
    protected function hydrate($data) {
        
        foreach($data as $champ => $valeur) {
            $this->setAttr($champ, $valeur);
        }
        
    }
    
    public function genererTableau($bool = false) {
        $tab = get_object_vars($this);
        $nb = count($tab);
        
        $i = 0;
        $tab_attr = array();
        
        if($bool === false) {
            foreach($tab as $champ => $valeur) {
                
                if($i !== 0)
                    $tab_attr[$champ] = $valeur;
             
                $i++;
            }
        } else {
            $tab_attr = $tab;
        }

        return $tab_attr;
        
    }
    
    abstract public function insert();
    abstract public function update();
    abstract public function save();
    abstract public function delete();
}

?>