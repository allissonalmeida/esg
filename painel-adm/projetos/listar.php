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
<th>{$campo13}</th>
<th>{$campo5}</th>
<th>{$campo6}</th>
<th>{$campo7}</th>
<!--<th>Valor Total</th>
<th>Valor Utilizado</th>-->
<th>Ações</th>
</tr>
</thead>
<tbody>
HTML;


$query = $pdo->prepare("SELECT a.*, b.nome as nome_fornecedor, b.id as id_fornecedor, c.descricao as nome_distribuidor, c.id as id_distribuidor FROM projetos a LEFT JOIN fornecedores b ON (b.id = a.id_fornecedor) LEFT JOIN distribuidores c ON (c.id = a.id_distribuidor)");
$query->execute();


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
		$cp11 = $res['id_fornecedor'];
		$cp12 = $res['id_plataforma'];
		$cp13 = $res['id_status'];
		$cp14 = $res['id_tipo_projeto'];

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
		

echo <<<HTML
	<tr>
	<td>{$cp1}</td>
	<td>{$cp2}</td>
	<td>{$cp3}</td>
	<td>{$nome_fornecedor}</td>
	<td>{$nome_distribuidor}</td>
	<td>{$data_inicio_formato_br}</td>
	<td>{$data_final_formato_br}</td>
	<!--<td>{$valor_total_formatado}</td>
	<td>{$valor_atualizado_formatado}</td> --> 
	<td>
	<a href="#" onclick="editar('{$id}', '{$cp1}', '{$cp2}', '{$cp3}', '{$cp4}', '{$cp5}', '{$cp6}', '{$cp7}', '{$cp8}', '{$cp9}', '{$cp10}', '{$cp11}', '{$cp12}', '{$cp13}', '{$cp14}')" title="Editar Registro"><i class="bi bi-pencil-square text-primary"></i> </a>
	<a href="#" onclick="excluir('{$id}')" title="Excluir Registro">	<i class="bi bi-trash text-danger"></i> </a>

	<a class="mx-1" href="#" onclick="mostrarDados('{$id}', '{$cp1}', '{$cp2}', '{$cp3}', '{$cp4}', '{$cp5}', '{$cp6}', '{$cp7}', '{$cp8}', '{$cp9}', '{$cp10}')" title="Visualizar dados do projeto">
	<i class="bi bi-exclamation-square"></i></a>

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


function editar(id,cp1,cp2,cp3,cp4,cp5,cp6,cp7,cp8,cp9,cp10,cp11,cp12,cp13,cp14){
	

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
	$('#id_fornecedor').val(cp11);
	$('#id_plataforma').val(cp12);
	$('#id_status').val(cp13);
	$('#id_tipo_projeto').val(cp14);


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


function mostrarDados(id, cp1, cp2, cp3, cp4, cp5, cp6, cp7, cp8, cp9, cp10, cp11, cp12){
	
	$('#campo1').text(cp1);
	$('#campo2').text(cp2);
	$('#campo3').text(cp3);
	$('#campo4').text(cp4);
	$('#campo5').text(cp5);
	$('#campo6').text(cp6);
	$('#campo7').text(cp7);
	$('#campo8').text(cp8);
	$('#campo9').text(cp9);
	$('#campo10').text(cp10);
	$('#campo11').text(cp11);
	$('#campo11').text(cp12);
	
	
	var myModal = new bootstrap.Modal(document.getElementById('modalDados'), {		});
	myModal.show();
	
}

</script>