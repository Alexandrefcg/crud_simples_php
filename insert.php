<?php
include('db.php');
include('function.php');

if(isset($_POST["operation"])) {
	if($_POST["operation"] == "Add") {
		$image = '';
		if($_FILES["user_image"]["name"] != '')	{
			$image = upload_image();			
		}
		$statement = $connection->prepare("
			INSERT INTO cliente (cli_nome, cli_sobrenome, cli_email, cli_contato, image) 
			VALUES (:cli_nome, :cli_sobrenome, :cli_email, :cli_contato, :image)"
		);
		$result = $statement->execute(
			array(
				':cli_nome'		=>	$_POST["cli_nome"],
				':cli_sobrenome'=>	$_POST["cli_sobrenome"],
				':cli_email'	=>	$_POST["cli_email"],
				':cli_contato'	=>	$_POST["cli_contato"],
				':image'		=>	$image
			)
		);
		if(!empty($result)) {
			echo 'Dados Salvos com sucesso !';
		}
	}
	if($_POST["operation"] == "Edit") {
		$image = '';
		if($_FILES["user_image"]["name"] != '')	{
			$image = upload_image();
		} else	{
			$image = $_POST["hidden_user_image"];
		}
		$statement = $connection->prepare(
			"UPDATE cliente 
				SET cli_nome = :cli_nome, cli_sobrenome = :cli_sobrenome, cli_email = :cli_email, cli_contato = :cli_contato, image = :image  
			WHERE cli_id = :cli_id"
		);
		$result = $statement->execute(
			array(
				':cli_nome'		=>	$_POST["cli_nome"],
				':cli_sobrenome'=>	$_POST["cli_sobrenome"],
				':cli_email'	=>	$_POST["cli_email"],
				':cli_contato'	=>	$_POST["cli_contato"],
				':image'		=>	$image,
				':cli_id'		=>	$_POST["cli_id"]
			)
		);
		if(!empty($result))	{
			echo 'Dados Atualizados com sucesso';
		}
	}
}

?>