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
<th>{$campo4}</th>
<th>{$campo5}</th>
<th>{$campo6}</th>
<th>{$campo7}</th>
<th>Valor Total</th>
<th>Valor Utilizado</th>
<th>Status</th>
</tr>
</thead>
<tbody>
HTML;

//$query = $pdo->query("SELECT * FROM $pagina ORDER BY id DESC ");
//$res = $query->fetchAll(PDO::FETCH_ASSOC);

$query = $pdo->prepare("SELECT a.*, b.nome as nome_fornecedor, c.descricao as nome_distribuidor FROM projetos a LEFT JOIN fornecedores b ON (b.id = a.id_fornecedor) LEFT JOIN distribuidores c ON (c.id = a.id_distribuidor)");
$query->execute();


//for($i=0; $i < @count($res); $i++){
	//foreach ($res[$i] as $key => $value){} 
    while ($res = $query->fetch(PDO::FETCH_ASSOC)) { 

		$id = $res['id'];
		$cp1 = $res['contrato'];
		$cp2 = $res['chamado'];
		$cp3 = $res['descricao'];
		$cp4 = $res['id_fornecedor'];
		$cp5 = $res['id_distribuidor'];
		$cp6 = $res['data_inicio'];
		$cp7 = $res['data_final'];
		$cp8 = $res['valor_total'];
		$cp9 = $res['valor_utilizado'];
		$cp10 = $res['observacao'];

		if($cp6 == '0000-00-00'){
			$data_inicio_formato_br = '';
		}else{
			$data_inicio_formato_br = date('d/m/Y', strtotime($cp6));
		}

		if($cp7 == '0000-00-00'){
			$data_final_formato_br = '';
		}else{
			$data_final_formato_br = date('d/m/Y', strtotime($cp7));
		}

		$valor_total_formatado = number_format($cp8,2,",",".");
		$valor_atualizado_formatado = number_format($cp9,2,",",".");

		$nome_fornecedor = $res['nome_fornecedor'];
		$nome_distribuidor = $res['nome_distribuidor'];

		$cp11 = $res['id_status'];
		$count_implantacao = 0;
		$count_execucao = 0;
		$count_finalizacao = 0;
		$count_finalizado = 0;

		if($cp11 == 1){
			$status =  'Implantação';
			$count_implantacao++;
		}elseif($cp11 == 2){
			$status =  'Execução';
			$count_execucao++;
		}elseif($cp11 == 3){
			$status =  'Finalização';
			$count_finalizacao++;
		}elseif($cp11 == 4){
			$status =  'Finalizado';
			$count_finalizado++;
		}
		

echo <<<HTML
	<tr>
	<td>{$cp1}</td>
	<td>{$cp2}</td>
	<td>{$cp3}</td>
	<td>{$nome_fornecedor}</td>
	<td>{$nome_distribuidor}</td>
	<td>{$data_inicio_formato_br}</td>
	<td>{$data_final_formato_br}</td>
	<td>{$valor_total_formatado}</td>
	<td>{$valor_atualizado_formatado}</td>						
	<td>{$status}</td>
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


function editar(id,cp1,cp2,cp3,cp4,cp5,cp6,cp7,cp8,cp9,cp10){
	

	$('#id').val(id);
	$('#<?=$campo1?>').val(cp1);
	$('#<?=$campo2?>').val(cp2);
	$('#<?=$campo3?>').val(cp3);
	$('#<?=$campo4?>').val(cp4);
	$('#<?=$campo5?>').val(cp5);
	$('#<?=$campo6?>').val(cp6);
	$('#<?=$campo7?>').val(cp7);
	$('#<?=$campo8?>').val(cp8);
	$('#<?=$campo9?>').val(cp9);
	$('#<?=$campo10?>').val(cp10);
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
	$('#<?=$campo6?>').val('');
	$('#<?=$campo7?>').val('');
	$('#<?=$campo8?>').val('');
	$('#<?=$campo9?>').val('');
	$('#<?=$campo10?>').val('');
	$('#mensagem').text('');
	
}

</script>