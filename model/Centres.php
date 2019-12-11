<?php
Class Centres {
	private $id;
	private $secteurs_id;
	private $nom;

	public function __construct($id, $secteurs_id, $nom) {
		$this->id = $id;
		$this->secteurs_id = $secteurs_id;
		$this->nom = $nom;

	}

	public function getId() {
		return $this->id;
	}

	public function getSecteurs_id() {
		return $this->secteurs_id;
	}

	public function getNom() {
		return $this->nom;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setSecteurs_id($secteurs_id) {
		$this->secteurs_id = $secteurs_id;
	}

	public function setNom($nom) {
		$this->nom = $nom;
	}


	public static function select() {
		$connexion=Connexion::getConnexion();
		$query="SELECT id, secteurs_id, nom FROM centres";
		$transaction=$connexion->prepare($query);
		$transaction->execute();
		$data=$transaction->fetchAll(PDO::FETCH_ASSOC);
		return json_encode($data);
	}

	public function insert() {
		$connexion=Connexion::getConnexion();
		$query="INSERT INTO centres (id, secteurs_id, nom) VALUES (:id, :secteurs_id, :nom)";
		$transaction=$connexion->prepare($query);
		$transaction->execute(array('id'=>$this->getId(), 'secteurs_id'=>$this->getSecteurs_id(), 'nom'=>$this->getNom()));
		return true;
	}

	public function update() {
		$connexion=Connexion::getConnexion();
		$query="UPDATE centres SET secteurs_id=:secteurs_id, nom=:nom WHERE id=:id";
		$transaction=$connexion->prepare($query);
		$transaction->execute(array('id'=>$this->getId(), 'secteurs_id'=>$this->getSecteurs_id(), 'nom'=>$this->getNom()));
		return true;
	}

	public static function delete($id) {
		$connexion=Connexion::getConnexion();
		$query="DELETE FROM centres WHERE id=:id";
		$transaction=$connexion->prepare($query);
		$transaction->execute(array('id'=>$id));
		return true;
	}


}