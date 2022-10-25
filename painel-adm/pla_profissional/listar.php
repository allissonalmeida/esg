<?php 
require_once("../../conexao.php");
require_once("campos.php");

$query = $pdo->prepare("SELECT a.*, b.descricao as nome_indicador , b.id as id_indicador, c.descricao as nome_projeto, c.contrato as numero_contrato, d.descricao as nome_distribuidor FROM indicadores_controle a LEFT JOIN indicadores b ON (b.id = a.id_indicador) LEFT JOIN projetos c ON (c.id = a.id_projeto) LEFT JOIN distribuidores d ON ( d.id = a.id_distribuidor) WHERE a.id_plataforma = 2 ORDER BY a.id_indicador ASC");

$query->execute();

while ($res = $query->fetch(PDO::FETCH_ASSOC)) 
{ 

	$id = $res['id'];
	$cp1 = $res['id_indicador'];
	$cp2 = $res['id_projeto'];
	$cp3 = $res['id_distribuidor'];
	$cp4 = $res['ano'];

	$cp5 = @$res['jan_meta'];
	$cp6 = @$res['fev_meta'];
	$cp7 = @$res['mar_meta'];
	$cp8 = @$res['abr_meta'];
	$cp9 = @$res['mai_meta'];
	$cp10 = @$res['jun_meta'];
	$cp11 = @$res['jul_meta'];
	$cp12 = @$res['ago_meta'];
	$cp13 = @$res['set_meta'];
	$cp14 = @$res['out_meta'];
	$cp15 = @$res['nov_meta'];
	$cp16 = @$res['dez_meta'];

	$cp17 = @$res['jan_realizado'];
	$cp18 = @$res['fev_realizado'];
	$cp19 = @$res['mar_realizado'];
	$cp20 = @$res['abr_realizado'];
	$cp21 = @$res['mai_realizado'];
	$cp22 = @$res['jun_realizado'];
	$cp23 = @$res['jul_realizado'];
	$cp24 = @$res['ago_realizado'];
	$cp25 = @$res['set_realizado'];
	$cp26 = @$res['out_realizado'];
	$cp27 = @$res['nov_realizado'];
	$cp28 = @$res['dez_realizado'];

	$cp29 = @$id_plataforma;
	
	$nome_projeto = $res['nome_projeto'];
	$nome_distribuidor = $res['nome_distribuidor'];
	$nome_indicador =  $res['nome_indicador'];
	
	//total apuração
	$total_meta = $cp5 + $cp6 + $cp7 + $cp8 + $cp9 + $cp10 + $cp11 + $cp12 + $cp13 + $cp14 + $cp15 + $cp16;

	//total realizado
	$total_realizado = $cp17 + $cp18 + $cp19 + $cp20 + $cp21 + $cp22 + $cp23 + $cp24 + $cp25 + $cp26 + $cp27 + $cp28;


	//Calculo das diferenças
	$jan_dif = $cp17 - $cp5;
	$fev_dif = $cp18 - $cp6;
	$mar_dif = $cp19 - $cp7;
	$abr_dif = $cp20 - $cp8;
	$mai_dif = $cp21 - $cp9;
	$jun_dif = $cp22 - $cp10;
	$jul_dif = $cp23 - $cp11;
	$ago_dif = $cp24 - $cp12;
	$set_dif = $cp25 - $cp13;
	$out_dif = $cp26 - $cp14;
	$nov_dif = $cp27 - $cp15;
	$dez_dif = $cp28 - $cp16;


	//Diferença
	$jan_result =  0;
	if($cp5 > 0 and $cp17 == 0 or $cp17 == ''){
		$jan_result =  '';
	}elseif($cp5 > 0 and $cp17 > 0){
		if($jan_dif > 0){
			$jan_result = '<font color="blue">'.$jan_dif.'</font>';
		}else{
			$jan_result = '<font color="red">'.$jan_dif.'</font>';
		}
	}

	$fev_result =  0;
	if($cp6 > 0 and $cp18 == 0 or $cp18 == ''){
		$fev_result =  '';
	}elseif($cp6 > 0 and $cp18 > 0){
		if($fev_dif > 0){
			$fev_result = '<font color="blue">'.$fev_dif.'</font>';
		}else{
			$fev_result = '<font color="red">'.$fev_dif.'</font>';
		}
	}

	$mar_result =  0;
	if($cp7 > 0 and $cp19 == 0 or $cp19 == ''){
		$mar_result =  '';
	}elseif($cp7 > 0 and $cp19 > 0){
		if($mar_dif > 0){
			$mar_result = '<font color="blue">'.$mar_dif.'</font>';
		}else{
			$mar_result = '<font color="red">'.$mar_dif.'</font>';
		}
	}


	$abr_result =  0;
	if($cp8 > 0 and $cp20 == 0 or $cp20 == ''){
		$abr_result =  '';
	}elseif($cp8 > 0 and $cp20 > 0){
		if($abr_dif > 0){
			$abr_result = '<font color="blue">'.$abr_dif.'</font>';
		}else{
			$abr_result = '<font color="red">'.$abr_dif.'</font>';
		}
	}

	$mai_result =  0;
	if($cp9 > 0 and $cp21 == 0 or $cp21 == ''){
		$mai_result =  '';
	}elseif($cp9 > 0 and $cp21 > 0){
		if($mai_dif > 0){
			$mai_result = '<font color="blue">'.$mai_dif.'</font>';
		}else{
			$mai_result = '<font color="red">'.$mai_dif.'</font>';
		}
	}

	$jun_result =  0;
	if($cp10 > 0 and $cp22 == 0 or $cp22 == ''){
		$jun_result =  '';
	}elseif($cp10 > 0 and $cp22 > 0){
		if($jun_dif > 0){
			$jun_result = '<font color="blue">'.$jun_dif.'</font>';
		}else{
			$jun_result = '<font color="red">'.$jun_dif.'</font>';
		}
	}

	$jun_result =  0;
	if($cp11 > 0 and $cp23 == 0 or $cp23 == ''){
		$jun_result =  '';
	}elseif($cp11 > 0 and $cp23 > 0){
		if($jun_dif > 0){
			$jun_result = '<font color="blue">'.$jun_dif.'</font>';
		}else{
			$jun_result = '<font color="red">'.$jun_dif.'</font>';
		}
	}

	$jul_result =  0;
	if($cp12 > 0 and $cp24 == 0 or $cp24 == ''){
		$jul_result =  '';
	}elseif($cp12 > 0 and $cp24 > 0){
		if($jul_dif > 0){
			$jul_result = '<font color="blue">'.$jul_dif.'</font>';
		}else{
			$jul_result = '<font color="red">'.$jul_dif.'</font>';
		}
	}

	$ago_result =  0;
	if($cp13 > 0 and $cp25 == 0 or $cp25 == ''){
		$ago_result =  '';
	}elseif($cp13 > 0 and $cp25 > 0){
		if($ago_dif > 0){
			$ago_result = '<font color="blue">'.$ago_dif.'</font>';
		}else{
			$ago_result = '<font color="red">'.$ago_dif.'</font>';
		}
	}

	$set_result =  0;
	if($cp14 > 0 and $cp26 == 0 or $cp26 == ''){
		$set_result =  '';
	}elseif($cp14 > 0 and $cp26 > 0){
		if($set_dif > 0){
			$set_result = '<font color="blue">'.$set_dif.'</font>';
		}else{
			$set_result = '<font color="red">'.$set_dif.'</font>';
		}
	}

	$out_result =  0;
	if($cp15 > 0 and $cp27 == 0 or $cp27 == ''){
		$out_result =  '';
	}elseif($cp15 > 0 and $cp27 > 0){
		if($out_dif > 0){
			$out_result = '<font color="blue">'.$out_dif.'</font>';
		}else{
			$out_result = '<font color="red">'.$out_dif.'</font>';
		}
	}

	$nov_result =  0;
	if($cp16 > 0 and $cp28 == 0 or $cp28 == ''){
		$nov_result =  '';
	}elseif($cp16 > 0 and $cp28 > 0){
		if($nov_dif > 0){
			$nov_result = '<font color="blue">'.$nov_dif.'</font>';
		}else{
			$nov_result = '<font color="red">'.$nov_dif.'</font>';
		}
	}

	$dez_result =  0;
	if($cp17 > 0 and $cp29 == 0 or $cp29 == ''){
		$dez_result =  '';
	}elseif($cp17 > 0 and $cp29 > 0){
		if($dez_dif > 0){
			$dez_result = '<font color="blue">'.$dez_dif.'</font>';
		}else{
			$dez_result = '<font color="red">'.$dez_dif.'</font>';
		}
	}
	

echo <<<HTML
	<h6><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M6.22 3.22a.75.75 0 011.06 0l4.25 4.25a.75.75 0 010 1.06l-4.25 4.25a.75.75 0 01-1.06-1.06L9.94 8 6.22 4.28a.75.75 0 010-1.06z"></path></svg>{$nome_distribuidor}

	<button type="button" class="btn btn-primary btn-sm">{$nome_indicador}</button>

	</h6>
	
	<table id="example{$id}" class="table table-striped table-light table-hover my-4">
	<thead>
		<tr>
			<!--<th>Indicador</th>-->
			<th></th>
			<th>Jan</th>		
			<th>Fev</th>	
			<th>Mar</th>
			<th>Abr</th>
			<th>Mai</th>	
			<th>Jun</th>	
			<th>Jul</th>	
			<th>Ago</th>	
			<th>Set</th>
			<th>Out</th>
			<th>Nov</th>
			<th>Dez</th>				
			<th>Ações</th>
		</tr>
	</thead>

	<tbody>
	<tr>
	<!--<td><button type="button" class="btn btn-primary btn-sm">{$nome_indicador}</button></td>	-->
	<td align="center"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M1.5 1.75a.75.75 0 00-1.5 0v12.5c0 .414.336.75.75.75h14.5a.75.75 0 000-1.5H1.5V1.75zm14.28 2.53a.75.75 0 00-1.06-1.06L10 7.94 7.53 5.47a.75.75 0 00-1.06 0L3.22 8.72a.75.75 0 001.06 1.06L7 7.06l2.47 2.47a.75.75 0 001.06 0l5.25-5.25z"></path></svg>  Meta ({$total_meta})</td>
	<td align="center">{$cp5}</td>
	<td align="center">{$cp6}</td>
	<td align="center">{$cp7}</td>
	<td align="center">{$cp8}</td>
	<td align="center">{$cp9}</td>
	<td align="center">{$cp10}</td>
	<td align="center">{$cp11}</td>
	<td align="center">{$cp12}</td>
	<td align="center">{$cp13}</td>
	<td align="center">{$cp14}</td>
	<td align="center">{$cp15}</td>
	<td align="center">{$cp16}</td>
								
	<td align="center">
		<a href="#" onclick="editar('{$id}','{$cp1}','{$cp2}', '{$cp3}','{$cp4}','{$cp5}','{$cp6}','{$cp7}','{$cp8}', '{$cp9}','{$cp10}','{$cp11}','{$cp12}','{$cp13}','{$cp14}','{$cp15}','{$cp16}','{$cp17}','{$cp18}','{$cp19}','{$cp20}','{$cp21}','{$cp22}','{$cp23}','{$cp24}','{$cp25}','{$cp26}','{$cp27}','{$cp28}','{$cp29}')" title="Editar Registro">	
			<i class="bi bi-pencil-square text-primary"></i> 
		</a>
		<a href="#" onclick="excluir('{$id}')" title="Excluir Registro">	
			<i class="bi bi-trash text-danger"></i> 
		</a>
	</td>

	</tr>

	<!-- REAL -->
	<tr>

		<!-- <td></td> -->
		<td align="center"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M9.585.52a2.678 2.678 0 00-3.17 0l-.928.68a1.178 1.178 0 01-.518.215L3.83 1.59a2.678 2.678 0 00-2.24 2.24l-.175 1.14a1.178 1.178 0 01-.215.518l-.68.928a2.678 2.678 0 000 3.17l.68.928c.113.153.186.33.215.518l.175 1.138a2.678 2.678 0 002.24 2.24l1.138.175c.187.029.365.102.518.215l.928.68a2.678 2.678 0 003.17 0l.928-.68a1.17 1.17 0 01.518-.215l1.138-.175a2.678 2.678 0 002.241-2.241l.175-1.138c.029-.187.102-.365.215-.518l.68-.928a2.678 2.678 0 000-3.17l-.68-.928a1.179 1.179 0 01-.215-.518L14.41 3.83a2.678 2.678 0 00-2.24-2.24l-1.138-.175a1.179 1.179 0 01-.518-.215L9.585.52zM7.303 1.728c.415-.305.98-.305 1.394 0l.928.68c.348.256.752.423 1.18.489l1.136.174c.51.078.909.478.987.987l.174 1.137c.066.427.233.831.489 1.18l.68.927c.305.415.305.98 0 1.394l-.68.928a2.678 2.678 0 00-.489 1.18l-.174 1.136a1.178 1.178 0 01-.987.987l-1.137.174a2.678 2.678 0 00-1.18.489l-.927.68c-.415.305-.98.305-1.394 0l-.928-.68a2.678 2.678 0 00-1.18-.489l-1.136-.174a1.178 1.178 0 01-.987-.987l-.174-1.137a2.678 2.678 0 00-.489-1.18l-.68-.927a1.178 1.178 0 010-1.394l.68-.928c.256-.348.423-.752.489-1.18l.174-1.136c.078-.51.478-.909.987-.987l1.137-.174a2.678 2.678 0 001.18-.489l.927-.68zM11.28 6.78a.75.75 0 00-1.06-1.06L7 8.94 5.78 7.72a.75.75 0 00-1.06 1.06l1.75 1.75a.75.75 0 001.06 0l3.75-3.75z"></path></svg> Realizado ({$total_realizado})</td>
		<td align="center">{$cp17}</td>
		<td align="center">{$cp18}</td>
		<td align="center">{$cp19}</td>
		<td align="center">{$cp20}</td>
		<td align="center">{$cp21}</td>
		<td align="center">{$cp22}</td>
		<td align="center">{$cp23}</td>
		<td align="center">{$cp24}</td>
		<td align="center">{$cp25}</td>
		<td align="center">{$cp26}</td>
		<td align="center">{$cp27}</td>
		<td align="center">{$cp28}</td>		
		<td align="center"></td>

	</tr>

	<!-- DIFERENÇA -->
	<tr>

		<!-- <td></td>	 -->
		<td align="center"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M8.177.677l2.896 2.896a.25.25 0 01-.177.427H8.75v1.25a.75.75 0 01-1.5 0V4H5.104a.25.25 0 01-.177-.427L7.823.677a.25.25 0 01.354 0zM7.25 10.75a.75.75 0 011.5 0V12h2.146a.25.25 0 01.177.427l-2.896 2.896a.25.25 0 01-.354 0l-2.896-2.896A.25.25 0 015.104 12H7.25v-1.25zm-5-2a.75.75 0 000-1.5h-.5a.75.75 0 000 1.5h.5zM6 8a.75.75 0 01-.75.75h-.5a.75.75 0 010-1.5h.5A.75.75 0 016 8zm2.25.75a.75.75 0 000-1.5h-.5a.75.75 0 000 1.5h.5zM12 8a.75.75 0 01-.75.75h-.5a.75.75 0 010-1.5h.5A.75.75 0 0112 8zm2.25.75a.75.75 0 000-1.5h-.5a.75.75 0 000 1.5h.5z"></path></svg> Diferença</td>
		<td align="center">{$jan_result}</td>
		<td align="center">{$fev_result}</td>
		<td align="center">{$mar_result}</td>
		<td align="center">{$abr_result}</td>
		<td align="center">{$mai_result}</td>
		<td align="center">{$jun_result}</td>
		<td align="center">{$jul_result}</td>
		<td align="center">{$ago_result}</td>
		<td align="center">{$set_result}</td>
		<td align="center">{$out_result}</td>
		<td align="center">{$nov_result}</td>
		<td align="center">{$dez_result}</td>
		<td align="center"></td>

	</tr>

	</tbody>
</table>

HTML;
} 

?>




<script>
$(document).ready(function() {    
	$('#example').DataTable({
		"ordering": false
	});

} );


function editar(id, cp1, cp2, cp3, cp4, cp5, cp6, cp7, cp8, cp9, cp10, cp11, cp12, cp13, cp14, cp15, cp16, cp17, cp18, cp19, cp20, cp21, cp22, cp23, cp24, cp25, cp26, cp27, cp28, cp29){

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
	$('#<?=$campo11?>').val(cp11);
	$('#<?=$campo12?>').val(cp12);
	$('#<?=$campo13?>').val(cp13);
	$('#<?=$campo14?>').val(cp14);
	$('#<?=$campo15?>').val(cp15);
	$('#<?=$campo16?>').val(cp16);
	$('#<?=$campo17?>').val(cp17);
	$('#<?=$campo18?>').val(cp18);
	$('#<?=$campo19?>').val(cp19);
	$('#<?=$campo20?>').val(cp20);
	$('#<?=$campo21?>').val(cp21);
	$('#<?=$campo22?>').val(cp22);
	$('#<?=$campo23?>').val(cp23);
	$('#<?=$campo24?>').val(cp24);
	$('#<?=$campo25?>').val(cp25);
	$('#<?=$campo26?>').val(cp26);
	$('#<?=$campo27?>').val(cp27);
	$('#<?=$campo28?>').val(cp28);
	$('#<?=$campo29?>').val(cp29);

	
		
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
	$('#<?=$campo11?>').val('');
	$('#<?=$campo12?>').val('');
	$('#<?=$campo13?>').val('');
	$('#<?=$campo14?>').val('');
	$('#<?=$campo15?>').val('');
	$('#<?=$campo16?>').val('');
	$('#<?=$campo17?>').val('');
	$('#<?=$campo18?>').val('');
	$('#<?=$campo19?>').val('');
	$('#<?=$campo20?>').val('');
	$('#<?=$campo21?>').val('');
	$('#<?=$campo22?>').val('');
	$('#<?=$campo23?>').val('');
	$('#<?=$campo24?>').val('');
	$('#<?=$campo25?>').val('');
	$('#<?=$campo26?>').val('');
	$('#<?=$campo27?>').val('');
	$('#<?=$campo28?>').val('');
	$('#<?=$campo29?>').val('');



	$('#mensagem').text('');
	
}

</script>