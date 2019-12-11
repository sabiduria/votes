<?php
include ('../model/autoload.php');
extract($_POST);
if (isset($need)){
	switch ($need){
		case "New":
			$candidats = new Candidats($id, $numero, $nom, $typecandidature);
                if ($candidats->insert()){
                    echo "Success";
                } else{
                    echo "Failed";
                }
			break;

		case "Update":
			$candidats = new Candidats($id, $numero, $nom, $typecandidature);
                if ($candidats->update()){
                    echo "Success";
                } else{
                    echo "Failed";
                }
			break;

		case "View":
			    echo Candidats::select($id);
			break;

		case "List":
			    echo Candidats::select();
			break;
	}
}