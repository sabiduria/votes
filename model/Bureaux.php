<?php
Class Bureaux {
	private $id;
	private $centres_id;
	private $nom;

	public function __construct($id, $centres_id, $nom) {
		$this->id = $id;
		$this->centres_id = $centres_id;
		$this->nom = $nom;

	}

	public function getId() {
		return $this->id;
	}

	public function getCentres_id() {
		return $this->centres_id;
	}

	public function getNom() {
		return $this->nom;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setCentres_id($centres_id) {
		$this->centres_id = $centres_id;
	}

	public function setNom($nom) {
		$this->nom = $nom;
	}


	public static function select() {
		$connexion=Connexion::getConnexion();
		$query="SELECT id, centres_id, nom FROM bureaux";
		$transaction=$connexion->prepare($query);
		$transaction->execute();
		$data=$transaction->fetchAll(PDO::FETCH_ASSOC);
		return json_encode($data);
	}

	public function insert() {
		$connexion=Connexion::getConnexion();
		$query="INSERT INTO bureaux (id, centres_id, nom) VALUES (:id, :centres_id, :nom)";
		$transaction=$connexion->prepare($query);
		$transaction->execute(array('id'=>$this->getId(), 'centres_id'=>$this->getCentres_id(), 'nom'=>$this->getNom()));
		return true;
	}

	public function update() {
		$connexion=Connexion::getConnexion();
		$query="UPDATE bureaux SET centres_id=:centres_id, nom=:nom WHERE id=:id";
		$transaction=$connexion->prepare($query);
		$transaction->execute(array('id'=>$this->getId(), 'centres_id'=>$this->getCentres_id(), 'nom'=>$this->getNom()));
		return true;
	}

	public static function delete($id) {
		$connexion=Connexion::getConnexion();
		$query="DELETE FROM bureaux WHERE id=:id";
		$transaction=$connexion->prepare($query);
		$transaction->execute(array('id'=>$id));
		return true;
	}


}