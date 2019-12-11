<?php
include ('../model/autoload.php');
extract($_POST);
if (isset($need)){
	switch ($need){
		case "New":
			$votes = new Votes($id, $candidats_id, $affectations_id);
                if ($votes->insert()){
                    echo "Success";
                } else{
                    echo "Failed";
                }
			break;

		case "Update":
			$votes = new Votes($id, $candidats_id, $affectations_id);
                if ($votes->update()){
                    echo "Success";
                } else{
                    echo "Failed";
                }
			break;

		case "View":
			    echo Votes::select($id);
			break;

		case "List":
			    echo Votes::select();
			break;
	}
}