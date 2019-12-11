<?php
include ('../model/autoload.php');
extract($_POST);
if (isset($need)){
	switch ($need){
		case "New":
			$affectations = new Affectations($id, $bureaux_id, $electeurs_id, $etat);
                if ($affectations->insert()){
                    echo "Success";
                } else{
                    echo "Failed";
                }
			break;

		case "Update":
			$affectations = new Affectations($id, $bureaux_id, $electeurs_id, $etat);
                if ($affectations->update()){
                    echo "Success";
                } else{
                    echo "Failed";
                }
			break;

		case "View":
			    echo Affectations::select($id);
			break;

		case "List":
			    echo Affectations::select();
			break;
	}
}