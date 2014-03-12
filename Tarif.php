<?php

/**
 * Description of Tarif
 *
 * @author Stéphane
 */

include_once("Modele.php");

class Tarif extends Modele {
    
    protected $en_ville;
    protected $code_gf;
    protected $bons_vac;
    protected $alloc_caf;
    protected $tarif_jour;
    
    public function insert() {
        $pdo = BaseCLSH::getConnection();
        $tab = $this->genererTableau(true);
        $query = $pdo->prepare("INSERT INTO Tarif VALUES(:en_ville, :code_gf, :bons_vac, :alloc_caf, :tarif_jour);");
        $query->execute($tab);
    }
    
    public function update() {}
    
    public function save() {
        return $this->insert();
    }
    
    public function delete() {
        $pdo = BaseCLSH::getConnection();
        
        $tab = $this->genererTableau(true);
        unset($tab['tarif_jour']);
        
        $query = $pdo->prepare("DELETE FROM Tarif WHERE en_ville=:en_ville, code_gf=:code_gf, bons_vac=:bons_vac, alloc_caf=:alloc_caf");
        $query->execute($tab);
    }
    
}

?>