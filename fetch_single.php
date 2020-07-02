<?php
include('db.php');
include('function.php');

if(isset($_POST["cli_id"])) {
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM cliente 
			WHERE cli_id = '".$_POST["cli_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row) {
		$output["cli_nome"] = $row["cli_nome"];
		$output["cli_sobrenome"] = $row["cli_sobrenome"];
		$output["cli_email"] = $row["cli_email"];
		$output["cli_contato"] = $row["cli_contato"];
		if($row["image"] != '')	{
			$output['user_image'] = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
		} else {
			$output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
		}
	}
	echo json_encode($output);
}
?>