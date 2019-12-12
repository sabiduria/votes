<?php
Class Votes {
	private $id;
	private $candidats_id;
	private $affectations_id;

	public function __construct($id, $candidats_id, $affectations_id) {
		$this->id = $id;
		$this->candidats_id = $candidats_id;
		$this->affectations_id = $affectations_id;

	}

	public function getId() {
		return $this->id;
	}

	public function getCandidats_id() {
		return $this->candidats_id;
	}

	public function getAffectations_id() {
		return $this->affectations_id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setCandidats_id($candidats_id) {
		$this->candidats_id = $candidats_id;
	}

	public function setAffectations_id($affectations_id) {
		$this->affectations_id = $affectations_id;
	}


	public static function select() {
		$connexion=Connexion::getConnexion();
		$query="SELECT id, candidats_id, affectations_id FROM votes";
		$transaction=$connexion->prepare($query);
		$transaction->execute();
		$data=$transaction->fetchAll(PDO::FETCH_ASSOC);
		return json_encode($data);
	}

	public function insert() {
		$connexion=Connexion::getConnexion();
		$query="INSERT INTO votes (id, candidats_id, affectations_id) VALUES (:id, :candidats_id, :affectations_id)";
		$transaction=$connexion->prepare($query);
		$transaction->execute(array('id'=>$this->getId(), 'candidats_id'=>$this->getCandidats_id(), 'affectations_id'=>$this->getAffectations_id()));
		return true;
	}

	public function update() {
		$connexion=Connexion::getConnexion();
		$query="UPDATE votes SET candidats_id=:candidats_id, affectations_id=:affectations_id WHERE id=:id";
		$transaction=$connexion->prepare($query);
		$transaction->execute(array('id'=>$this->getId(), 'candidats_id'=>$this->getCandidats_id(), 'affectations_id'=>$this->getAffectations_id()));
		return true;
	}

	public static function delete($id) {
		$connexion=Connexion::getConnexion();
		$query="DELETE FROM votes WHERE id=:id";
		$transaction=$connexion->prepare($query);
		$transaction->execute(array('id'=>$id));
		return true;
	}

    public static  function countData($candidats_id){
        $connexion = Connexion::getConnexion();
        $query = "SELECT COUNT(*) as nber FROM votes WHERE candidats_id=:cd_id";
        $transaction = $connexion->prepare($query);
        $transaction->execute(array('cd_id'=>$candidats_id));

        if($data = $transaction->fetch()){
            return $data['nber'];
        }
    }


}