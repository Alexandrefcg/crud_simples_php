<?php

include('db.php');
include("function.php");

if(isset($_POST["cli_id"])) {	
	$image = get_image_name($_POST["cli_id"]);
	if($image != '') {
		unlink("upload/" . $image);
	}
	$statement = $connection->prepare(
		"DELETE FROM cliente WHERE cli_id = :cli_id"
	);
	$result = $statement->execute(
		array(':cli_id'	=>	$_POST["cli_id"])
	);
	
	if(!empty($result))	{
		echo 'Cliente removido';
	}
}
?>