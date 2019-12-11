<?php
Class Candidats {
	private $id;
	private $numero;
	private $nom;
	private $typecandidature;

	public function __construct($id, $numero, $nom, $typecandidature) {
		$this->id = $id;
		$this->numero = $numero;
		$this->nom = $nom;
		$this->typecandidature = $typecandidature;

	}

	public function getId() {
		return $this->id;
	}

	public function getNumero() {
		return $this->numero;
	}

	public function getNom() {
		return $this->nom;
	}

	public function getTypecandidature() {
		return $this->typecandidature;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setNumero($numero) {
		$this->numero = $numero;
	}

	public function setNom($nom) {
		$this->nom = $nom;
	}

	public function setTypecandidature($typecandidature) {
		$this->typecandidature = $typecandidature;
	}


	public static function select() {
		$connexion=Connexion::getConnexion();
		$query="SELECT id, numero, nom, typecandidature FROM candidats";
		$transaction=$connexion->prepare($query);
		$transaction->execute();
		$data=$transaction->fetchAll(PDO::FETCH_ASSOC);
		return json_encode($data);
	}

	public function insert() {
		$connexion=Connexion::getConnexion();
		$query="INSERT INTO candidats (id, numero, nom, typecandidature) VALUES (:id, :numero, :nom, :typecandidature)";
		$transaction=$connexion->prepare($query);
		$transaction->execute(array('id'=>$this->getId(), 'numero'=>$this->getNumero(), 'nom'=>$this->getNom(), 'typecandidature'=>$this->getTypecandidature()));
		return true;
	}

	public function update() {
		$connexion=Connexion::getConnexion();
		$query="UPDATE candidats SET numero=:numero, nom=:nom, typecandidature=:typecandidature WHERE id=:id";
		$transaction=$connexion->prepare($query);
		$transaction->execute(array('id'=>$this->getId(), 'numero'=>$this->getNumero(), 'nom'=>$this->getNom(), 'typecandidature'=>$this->getTypecandidature()));
		return true;
	}

	public static function delete($id) {
		$connexion=Connexion::getConnexion();
		$query="DELETE FROM candidats WHERE id=:id";
		$transaction=$connexion->prepare($query);
		$transaction->execute(array('id'=>$id));
		return true;
	}


}