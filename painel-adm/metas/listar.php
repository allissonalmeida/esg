<?php 
require_once("../../conexao.php");
require_once("campos.php");

echo <<<HTML
<table id="example" class="table table-striped table-light table-hover my-4">
<thead>
<tr>
	<th>{$campo1}</th>
	<th>{$campo2}</th>
	<th>{$campo3}</th>									
	<th>Ações</th>
</tr>
</thead>
<tbody>
HTML;

$query = $pdo->prepare("SELECT a.*, b.nome as nome_plataforma FROM metas a LEFT JOIN plataformas b ON (b.id = a.id_plataforma) ORDER BY a.descricao ASC");

$query->execute();

while ($res = $query->fetch(PDO::FETCH_ASSOC)) 
{ 


	$id = $res['id'];
	$cp1 = $res['descricao'];
	$cp2 = $res['valor'];
	$cp3 = $res['nome_plataforma'];
	$cp4 = $res['id_plataforma'];
	
echo <<<HTML
	<tr>
		<td>{$cp1}</td>		
		<td>{$cp2}</td>	
		<td>{$cp3}</td>									
		<td width="5%">
			<a href="#" onclick="editar('{$id}', '{$cp1}', '{$cp2}', '{$cp3}', '{$cp4}')" title="Editar Registro">
				<i class="bi bi-pencil-square text-primary"></i> 
			</a>
			<a href="#" onclick="excluir('{$id}')" title="Excluir Registro">	
				<i class="bi bi-trash text-danger"></i> 
			</a>
		</td>
	</tr>
HTML;
} 
echo <<<HTML
</tbody>
</table>
HTML;

?>

<script>
$(document).ready(function() {    
	$('#example').DataTable({
		"ordering": false
	});

} );


function editar(id, cp1, cp2, cp3, cp4){
	$('#id').val(id);
	$('#<?=$campo1?>').val(cp1);
	$('#<?=$campo2?>').val(cp2);
	$('#<?=$campo3?>').val(cp3);
	$('#id_plataforma').val(cp4);
		
	$('#tituloModal').text('Editar Registro');
	var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {		});
	myModal.show();
	$('#mensagem').text('');
}



function limparCampos(){
	$('#id').val('');
	$('#<?=$campo1?>').val('');
	$('#<?=$campo2?>').val('');
	$('#<?=$campo3?>').val('');

	$('#mensagem').text('');
	
}

</script>