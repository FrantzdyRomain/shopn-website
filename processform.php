<?php 


//include ("DatabaseConnect.php");
include_once 'database/DatabaseConnect.php';

$errors         = array();  	// array to hold validation errors
$data 			= array(); 		// array to pass back data

$name1 = $_POST['name'];
$email1 = $_POST['email'];
$useroption1 = $_POST['useroption'];
$message1 = $_POST['message'];

	if (empty($_POST['name']))
		$errors['name'] = 'Name is required.';
	if (empty($_POST['email']))
		$errors['email'] = 'Email is required.';
	if (empty($_POST['message']))
		$errors['message'] = 'message is required.';

if ( ! empty($errors)) {

	// if there are items in our errors array, return those errors
		$data['success'] = false;
		$data['errors']  = $errors;
	} else {
		//$db = new DatabaseConnect();
		$db = Database::getInstance();
		if(!$db){
			echo "no db instance";

		}else{

			echo "string";
		}

		 //$db->insert(); 
		 $connection = $db->getCurrentConnection();
		 $q = ("insert into Email_Form(name, email, useroption, message) values('$name1', '$email1', '$useroption1','$message1')");
		 $result = $connection->query($q);
		 echo $res;

		$data['success'] = true;
		//$data['message'] = 'Success!';
	
	}
echo json_encode($data);

?>