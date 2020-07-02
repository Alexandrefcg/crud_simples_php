<html lang="pt-br">
	<head>
		<title>Teste Essentia</title>		
		
		<meta http-equiv="Content-Language" content="pt-br">
		<meta charset="UTF-8">

		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />				
		<link rel="stylesheet" href="css/main.css"/>
		<link rel="icon" href="images/hu_1.png" type="image/x-icon">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
		
	</head>
	<body>
		<div class="container box">
			<div class="header">
				<img src="images/logo_essential_site.svg" alt="logo" />
				<h1 align="center">Cadastro de clientes</h1>	
			</div>			
			<br />
			<div class="table-responsive">
				<br />
				<div align="right">
					<button type="button" id="add_button" data-toggle="modal" data-target="#clienteModal" class="btn btn-info btn-lg">Cadastrar novo Cliente</button>
				</div>
				<br /><br />
				<table id="dadosCliente" class="table table-bordered table-striped"style="width: 1230px;">
					<thead>
						<tr>
							<th width="10%">Imagem</th>
							<th width="35%">Nome</th>
							<th width="35%">Sobrenome</th>
							<th width="35%">E-mail</th>
							<th width="35%">Telefone</th>
							<th width="10%">Editar</th>
							<th width="10%">Remover</th>
						</tr>
					</thead>
				</table>				
			</div>
		</div>
		<div id="clienteModal" class="modal fade">
			<div class="modal-dialog">
				<form method="post" id="cadastroCliente" enctype="multipart/form-data" >
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Adicionar Cliente</h4>
						</div>
						<div class="modal-body">
							<label>Nome</label>
							<input type="text" name="cli_nome" id="cli_nome" class="form-control" />
							<br />
							<label>Sobrenome</label>
							<input type="text" name="cli_sobrenome" id="cli_sobrenome" class="form-control" />
							<br />
							<label>E-mail</label>
							<input type="email" name="cli_email" id="cli_email" class="form-control" />
							<br />
							<label>Telefone</label>							
							<input type="text" name="cli_contato" id="cli_contato" class="form-control phone-ddd-mask" placeholder="Ex.: (00) 0000-0000" />
							<br />
							<label>Selecione uma imagem</label>
							<input type="file" name="user_image" id="user_image" />
							<span id="user_uploaded_image"></span>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="cli_id" id="cli_id" />
							<input type="hidden" name="operation" id="operation" />
							<input type="submit" name="action" id="action" class="btn btn-success" value="Adicionar" />
							<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
	<script src="script/main.js"></script>
	<script type="text/javascript">
    	$("#cli_contato").mask("(00) 0000-0000");
    </script>
</html>




