$(document).ready(function(){
	$("#cli_contato").mask("(00) 0000-0000");
	
	$('#add_button').click(function(){
		$('#cadastroCliente')[0].reset();
		$('.modal-title').text("Adicionar Cliente");
		$('#action').val("Adicionar");
		$('#operation').val("Add");
		$('#user_uploaded_image').html('');
	});
	
	var dataTable = $('#dadosCliente').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetch.php",
			type:"POST"
		},
		"columnDefs":[{	"targets":[0, 3, 4],"orderable":false,},
		],

	});

	$(document).on('submit', '#cadastroCliente', function(event){
		event.preventDefault();
		let nome 		= $('#cli_nome').val();
		let sobrenome 	= $('#cli_sobrenome').val();
		let email 	 	= $('#cli_email').val();
		var telefone 	= $('#cli_contato').val();
		var extension 	= $('#user_image').val().split('.').pop().toLowerCase();
		if(extension != '') {
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1) {
				alert("Formato inválido ! Formatos aceitos (gif,png,jpg,jpeg)");
				$('#user_image').val('');
				return false;
			}
		}	
		if((nome != '' && sobrenome != '') && (email != '' && telefone != '')) {
			$.ajax({
				url:"insert.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#cadastroCliente')[0].reset();
					$('#clienteModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		} else {
			alert("Por favor preencha todos os campos!");
		}
	});
	
	$(document).on('click', '.update', function(){		
		var cli_id = $(this).attr("id");		
		$.ajax({
			url:"fetch_single.php",
			method:"POST",
			data:{cli_id:cli_id},
			dataType:"json",
			success:function(data) {
				$('#clienteModal').modal('show');
				$('#cli_nome').val(data.cli_nome);
				$('#cli_sobrenome').val(data.cli_sobrenome);
				$('#cli_email').val(data.cli_email);
				$('#cli_contato').val(data.cli_contato);
				$('.modal-title').text("Editar Cliente");
				$('#cli_id').val(cli_id);
				$('#user_uploaded_image').html(data.user_image);
				$('#action').val("Editar");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var cli_id = $(this).attr("id");
		
		if(confirm("Você tem certeza que deseja remover?")){
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{cli_id:cli_id},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		} else	{
			return false;	
		}
	});	
});