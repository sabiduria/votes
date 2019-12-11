<?php
include ('../model/autoload.php');
extract($_POST);
if (isset($need)){
	switch ($need){
		case "New":
			$bureaux = new Bureaux($id, $centres_id, $nom);
                if ($bureaux->insert()){
                    echo "Success";
                } else{
                    echo "Failed";
                }
			break;

		case "Update":
			$bureaux = new Bureaux($id, $centres_id, $nom);
                if ($bureaux->update()){
                    echo "Success";
                } else{
                    echo "Failed";
                }
			break;

		case "View":
			    echo Bureaux::select($id);
			break;

		case "List":
			    echo Bureaux::select();
			break;
	}
}

for ($i=1; $i<=6; $i++){
    $bureaux = new Bureaux(null, 1, "Bureau $i");
    if ($bureaux->insert()){
        echo "Success";
    } else{
        echo "Failed";
    }
}