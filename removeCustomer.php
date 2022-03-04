<?php 
	require_once('./dao/customerDAO.php'); 
	
	if($_GET['action'] == "delete"){
		if(isset($_GET['_id'])){
			$customerDAO =  new customerDAO();
			$result = $customerDAO->deleteContact($_GET['_id']);
			echo $result;
			if($result){
				header('Location:mailing_list.php?deleted=true');
			} else{
				header('Location:mailing_list.php?deleted=false');
			}
		}
	}
?>