<?php
include ('../model/autoload.php');
extract($_POST);
if (isset($need)){
	switch ($need){
		case "New":
			$centres = new Centres($id, $secteurs_id, $nom);
                if ($centres->insert()){
                    echo "Success";
                } else{
                    echo "Failed";
                }
			break;

		case "Update":
			$centres = new Centres($id, $secteurs_id, $nom);
                if ($centres->update()){
                    echo "Success";
                } else{
                    echo "Failed";
                }
			break;

		case "View":
			    echo Centres::select($id);
			break;

		case "List":
			    echo Centres::select();
			break;
	}
}