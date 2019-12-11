<?php
include ('../model/autoload.php');
extract($_POST);
if (isset($need)){
	switch ($need){
		case "New":
			$electeurs = new Electeurs($id, $nom);
                if ($electeurs->insert()){
                    echo "Success";
                } else{
                    echo "Failed";
                }
			break;

		case "Update":
			$electeurs = new Electeurs($id, $nom);
                if ($electeurs->update()){
                    echo "Success";
                } else{
                    echo "Failed";
                }
			break;

		case "View":
			    echo Electeurs::select($id);
			break;

		case "List":
			    echo Electeurs::select();
			break;
	}
}