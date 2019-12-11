<?php
Class Secteurs {
	private $id;
	private $nom;
	private $province;

	public function __construct($id, $nom, $province) {
		$this->id = $id;
		$this->nom = $nom;
		$this->province = $province;

	}

	public function getId() {
		return $this->id;
	}

	public function getNom() {
		return $this->nom;
	}

	public function getProvince() {
		return $this->province;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setNom($nom) {
		$this->nom = $nom;
	}

	public function setProvince($province) {
		$this->province = $province;
	}


	public static function select() {
		$connexion=Connexion::getConnexion();
		$query="SELECT id, nom, province FROM secteurs";
		$transaction=$connexion->prepare($query);
		$transaction->execute();
		$data=$transaction->fetchAll(PDO::FETCH_ASSOC);
		return json_encode($data);
	}

	public function insert() {
		$connexion=Connexion::getConnexion();
		$query="INSERT INTO secteurs (id, nom, province) VALUES (:id, :nom, :province)";
		$transaction=$connexion->prepare($query);
		$transaction->execute(array('id'=>$this->getId(), 'nom'=>$this->getNom(), 'province'=>$this->getProvince()));
		return true;
	}

	public function update() {
		$connexion=Connexion::getConnexion();
		$query="UPDATE secteurs SET nom=:nom, province=:province WHERE id=:id";
		$transaction=$connexion->prepare($query);
		$transaction->execute(array('id'=>$this->getId(), 'nom'=>$this->getNom(), 'province'=>$this->getProvince()));
		return true;
	}

	public static function delete($id) {
		$connexion=Connexion::getConnexion();
		$query="DELETE FROM secteurs WHERE id=:id";
		$transaction=$connexion->prepare($query);
		$transaction->execute(array('id'=>$id));
		return true;
	}


}