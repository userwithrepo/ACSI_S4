<?php

include_once 'BaseCLSH.php';

/* Sur la même BaseCLSH que Billet ou Catégorie
 * Ne sera donc pas détaillé
 */

include_once 'Modele.php';

class Utilisateur extends Modele {

	private $userid;
	private $password;///haché, salé, rehaché (sha1)
	private $mail;
	


	public function __toString(){
		return "[".__CLASS__ . "] <br>
			userid : ". $this->userid . "<br>
			password : ". $this->getAttr("password") ."<br>
			mail : ". $this->getAttr("mail");
	}

	public function save() {
        if (isset($this->userid)){
            return $this->update();
        } else {
            return $this->insert();
        }
    }


	



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




	public function update(){
		if(!isset($this->userid)){
			throw new Exception(__CLASS__ . ":Clé primaire non définie, update impossible");
		}

		$c = BaseCLSH::getConnection();
		$salt = $this->getAttr("login");
		$this->password = sha1(sha1($this->password).$salt);
		$query = $c->prepare("update utilisateurs set 
					password= ?, mail= ?
					where userid= ?");

		$query->bindParam (1, $this->password, PDO::PARAM_STR);
		$query->bindParam (2, $this->mail, PDO::PARAM_STR);
		$query->bindParam (3, $this->userid, PDO::PARAM_STR);


		return $query->execute();

	}





	public function delete(){
		$nb = 0;
		if(isset($this->userid)){
			$query = "DELETE FROM utilisateurs Where userid =" . $this->userid;
			$c = BaseCLSH::getConnection();
			$nb = $c->exec($query);
		}
		return $nb;
	}



	public function insert(){
		$nb = 0;
		$salt = $this->mail;
		$query = "INSERT INTO utilisateurs VALUES(null,'".sha1(sha1($this->password).$salt)."', '".$this->mail."')";
		$c = BaseCLSH::getConnection();
		$nb = $c->exec($query);
		$this->setAttr("userid", $c->LastInsertId());

		return $nb;
	}


	public static function findAll(){
		$query = "select * from utilisateurs";
		$c = BaseCLSH::getConnection();
		$dbres = $c->prepare($query);
		$dbres->execute();
		$d = $dbres->fetchAll();
		$tab = Array();
		foreach ($d as $ligne) {
			$user = new Utilisateur();
			$user->setAttr("userid", $ligne["userid"]);
			$user->setAttr("password", $ligne["password"]);
			$user->setAttr("mail", $ligne["mail"]);
			array_push($tab, $user);
		}

		return $tab;
	}


	public static function findById($userid){
		$c = BaseCLSH::getConnection();
		$query = 'select * from utilisateurs where userid= :userid';
		$dbres = $c->prepare($query);
		$dbres->bindParam(':userid', $userid);
		$dbres->execute();
		//$user = false;
		$d = $dbres->fetch(PDO::FETCH_OBJ);
		if($d == false) return false;
		$user = new Utilisateur();
		$user->setAttr("userid", $userid);
		$user->setAttr("password", $d->password);
		$user->setAttr("mail", $d->mail);
		
		return $user;
	}



	public static function findByMail($mail) {
		$c = BaseCLSH::getConnection();
		$query = 'select * from utilisateurs where mail= :mail';
		$dbres = $c->prepare($query);
		$dbres->bindParam(':mail', $mail);
		$dbres->execute();
		$user = false;
		$d = $dbres->fetch(PDO::FETCH_OBJ);
		if($d != false){
			$user = new Utilisateur();
			$user->setAttr("userid", $d->userid);
			$user->setAttr("password", $d->password);
			$user->setAttr("mail", $d->mail);
		}
		return $user;

	}


	public static function getNbUser(){
		$query = "select count(*) as nb from utilisateurs";
		$c = BaseCLSH::getConnection();
		$res = $c->query($query);
		$data = $res->fetch();
		$nb = $data['nb'];

		return $nb;
	}


	


}

?>