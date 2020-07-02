<?php
include('db.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM cliente ";

if(isset($_POST["search"]["value"])) {
	$query .= 'WHERE cli_nome LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR cli_sobrenome LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR cli_email LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR cli_contato LIKE "%'.$_POST["search"]["value"].'%" ';
}

if(isset($_POST["order"])){
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
} else {
	$query .= 'ORDER BY cli_id DESC ';
}

if($_POST["length"] != -1) {
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();

foreach($result as $row){
	$image = '';
	if($row["image"] != '')	{
		$image = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" />';
	} else {
		$image = '';
	}
	$sub_array = array();
	$sub_array[] = $image;
	$sub_array[] = $row["cli_nome"];
	$sub_array[] = $row["cli_sobrenome"];
	$sub_array[] = $row["cli_email"];
	$sub_array[] = $row["cli_contato"];
	$sub_array[] = '<button type="button" name="update" id="'.$row["cli_id"].'" class="btn btn-warning btn-xs update">Editar</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["cli_id"].'" class="btn btn-danger btn-xs delete">Remover</button>';
	$data[] = $sub_array;
}

$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>