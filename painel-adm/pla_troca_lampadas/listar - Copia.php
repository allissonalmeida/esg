<?php 
require_once("../../conexao.php");
require_once("campos.php");

echo <<<HTML
<table id="example" class="table table-striped table-light table-hover my-4">
<thead>
<tr>
<th>{$campo1}</th>
<th>{$campo2}</th>
<th>Contrato</th>		
<th>{$campo3}</th>			
<th>{$campo4}</th>			
<th>{$campo5}</th>		
<th>Ações</th>
</tr>
</thead>
<tbody>
HTML;


//$query = $pdo->query("SELECT * FROM indicadores_controle ORDER BY id ASC ");
//$res = $query->fetchAll(PDO::FETCH_ASSOC);
//for($i=0; $i < @count($res); $i++){
	//foreach ($res[$i] as $key => $value){} 

$query = $pdo->prepare("SELECT a.*, b.descricao as nome_indicador , c.descricao as nome_projeto, c.contrato as numero_contrato FROM indicadores_controle a LEFT JOIN indicadores b ON (b.id = a.id_indicador) LEFT JOIN projetos c ON (c.id = a.id_projeto)ORDER BY a.id_indicador ASC");
$query->execute();

while ($res = $query->fetch(PDO::FETCH_ASSOC)) { 

	$id = $res['id'];
	$cp1 = $res['id_indicador'];
	$cp2 = $res['id_projeto'];
	$cp3 = $res['mes'];
	$cp4 = $res['ano'];
	$cp5 = $res['valor'];
	$cp6 = $res['contrato'];

	$nome_indicador =  $res['nome_indicador'];
	$nome_projeto =  $res['nome_projeto'];
	$nome_mes = ucfirst($res['mes']);
	$numero_contrato = $res['numero_contrato'];

echo <<<HTML
	<tr>
	<td>{$nome_indicador}</td>	
	<td>{$nome_projeto}</td>
	<td>{$cp6}</td>	
	<td>{$nome_mes}</td>	
	<td>{$cp4}</td>	
	<td>{$cp5}</td>									
	<td>
	<a href="#" onclick="editar('{$id}', '{$cp1}', '{$cp2}', '{$cp3}', '{$cp4}', '{$cp5}','{$cp6}')" title="Editar Registro">	<i class="bi bi-pencil-square text-primary"></i> </a>
	<a href="#" onclick="excluir('{$id}')" title="Excluir Registro">	<i class="bi bi-trash text-danger"></i> </a>
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


function editar(id, cp1, cp2, cp3, cp4, cp5){
	$('#id').val(id);
	$('#<?=$campo1?>').val(cp1);
	$('#<?=$campo2?>').val(cp2);
	$('#<?=$campo3?>').val(cp3);
	$('#<?=$campo4?>').val(cp4);
	$('#<?=$campo5?>').val(cp5);
	
		
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
	$('#<?=$campo4?>').val('');
	$('#<?=$campo5?>').val('');

	$('#mensagem').text('');
	
}

</script>