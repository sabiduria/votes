<?php
include ('../model/autoload.php');
extract($_POST);
if (isset($need)){
	switch ($need){
		case "New":
			$secteurs = new Secteurs($id, $nom, $province);
                if ($secteurs->insert()){
                    echo "Success";
                } else{
                    echo "Failed";
                }
			break;

		case "Update":
			$secteurs = new Secteurs($id, $nom, $province);
                if ($secteurs->update()){
                    echo "Success";
                } else{
                    echo "Failed";
                }
			break;

		case "View":
			    echo Secteurs::select($id);
			break;

		case "List":
			    echo Secteurs::select();
			break;
	}
}