<?php
Class Affectations {
	private $id;
	private $bureaux_id;
	private $electeurs_id;
	private $etat;

	public function __construct($id, $bureaux_id, $electeurs_id, $etat) {
		$this->id = $id;
		$this->bureaux_id = $bureaux_id;
		$this->electeurs_id = $electeurs_id;
		$this->etat = $etat;

	}

	public function getId() {
		return $this->id;
	}

	public function getBureaux_id() {
		return $this->bureaux_id;
	}

	public function getElecteurs_id() {
		return $this->electeurs_id;
	}

	public function getEtat() {
		return $this->etat;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setBureaux_id($bureaux_id) {
		$this->bureaux_id = $bureaux_id;
	}

	public function setElecteurs_id($electeurs_id) {
		$this->electeurs_id = $electeurs_id;
	}

	public function setEtat($etat) {
		$this->etat = $etat;
	}


	public static function select() {
		$connexion=Connexion::getConnexion();
		$query="SELECT id, bureaux_id, electeurs_id, etat FROM affectations";
		$transaction=$connexion->prepare($query);
		$transaction->execute();
		$data=$transaction->fetchAll(PDO::FETCH_ASSOC);
		return json_encode($data);
	}

	public function insert() {
		$connexion=Connexion::getConnexion();
		$query="INSERT INTO affectations (id, bureaux_id, electeurs_id, etat) VALUES (:id, :bureaux_id, :electeurs_id, :etat)";
		$transaction=$connexion->prepare($query);
		$transaction->execute(array('id'=>$this->getId(), 'bureaux_id'=>$this->getBureaux_id(), 'electeurs_id'=>$this->getElecteurs_id(), 'etat'=>$this->getEtat()));
		return true;
	}

	public function update() {
		$connexion=Connexion::getConnexion();
		$query="UPDATE affectations SET bureaux_id=:bureaux_id, electeurs_id=:electeurs_id, etat=:etat WHERE id=:id";
		$transaction=$connexion->prepare($query);
		$transaction->execute(array('id'=>$this->getId(), 'bureaux_id'=>$this->getBureaux_id(), 'electeurs_id'=>$this->getElecteurs_id(), 'etat'=>$this->getEtat()));
		return true;
	}

	public static function delete($id) {
		$connexion=Connexion::getConnexion();
		$query="DELETE FROM affectations WHERE id=:id";
		$transaction=$connexion->prepare($query);
		$transaction->execute(array('id'=>$id));
		return true;
	}


}