<?php
Class Electeurs {
	private $id;
	private $nom;

	public function __construct($id, $nom) {
		$this->id = $id;
		$this->nom = $nom;

	}

	public function getId() {
		return $this->id;
	}

	public function getNom() {
		return $this->nom;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setNom($nom) {
		$this->nom = $nom;
	}


	public static function select() {
		$connexion=Connexion::getConnexion();
		$query="SELECT id, nom FROM electeurs";
		$transaction=$connexion->prepare($query);
		$transaction->execute();
		$data=$transaction->fetchAll(PDO::FETCH_ASSOC);
		return json_encode($data);
	}

	public function insert() {
		$connexion=Connexion::getConnexion();
		$query="INSERT INTO electeurs (id, nom) VALUES (:id, :nom)";
		$transaction=$connexion->prepare($query);
		$transaction->execute(array('id'=>$this->getId(), 'nom'=>$this->getNom()));
		return true;
	}

	public function update() {
		$connexion=Connexion::getConnexion();
		$query="UPDATE electeurs SET nom=:nom WHERE id=:id";
		$transaction=$connexion->prepare($query);
		$transaction->execute(array('id'=>$this->getId(), 'nom'=>$this->getNom()));
		return true;
	}

	public static function delete($id) {
		$connexion=Connexion::getConnexion();
		$query="DELETE FROM electeurs WHERE id=:id";
		$transaction=$connexion->prepare($query);
		$transaction->execute(array('id'=>$id));
		return true;
	}

	public static  function countData($table){
	    $connexion = Connexion::getConnexion();
	    $query = "SELECT COUNT(*) as nber FROM $table WHERE 1";
	    $transaction = $connexion->prepare($query);
	    $transaction->execute();

	    if($data = $transaction->fetch()){
	        return $data['nber'];
        }
    }


}