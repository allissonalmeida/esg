<?php 
require_once("../../conexao.php");
require_once("campos.php");

$query = $pdo->prepare("SELECT a.id_indicador, i.descricao as nome_indicador , a.ano as ano, sum(a.jan_realizado) as jan_realizado,sum(a.fev_realizado) as fev_realizado,sum(a.mar_realizado) as mar_realizado,sum(a.abr_realizado) as abr_realizado,sum(a.mai_realizado) as mai_realizado,sum(a.jun_realizado) as jun_realizado,sum(a.jul_realizado) as jul_realizado,sum(a.ago_realizado) as ago_realizado,sum(a.set_realizado) as set_realizado, sum(a.out_realizado) as out_realizado, sum(a.nov_realizado) as nov_realizado,sum(a.dez_realizado) as dez_realizado, count(*) as total FROM indicadores_controle a INNER JOIN indicadores i on (i.id = a.id_indicador) group by i.descricao;");

$query->execute();

$acumulado = 0;

while ($res = $query->fetch(PDO::FETCH_ASSOC)) 
{ 
	$acumulado = $res['jan_realizado'] + $res['fev_realizado'] + $res['mar_realizado'] + $res['abr_realizado'] + $res['mai_realizado'] + $res['jun_realizado'] + $res['jul_realizado'] + $res['ago_realizado'] + $res['set_realizado'] + $res['out_realizado'] + $res['nov_realizado'] + $res['dez_realizado'];


echo <<<HTML

<!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M6.22 3.22a.75.75 0 011.06 0l4.25 4.25a.75.75 0 010 1.06l-4.25 4.25a.75.75 0 01-1.06-1.06L9.94 8 6.22 4.28a.75.75 0 010-1.06z"></path></svg> -->

<button type="button" class="btn btn-primary position-relative"> $res[nome_indicador]
  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">$acumulado
    <span class="visually-hidden">unread messages</span>
  </span>
</button>


<table id="example" class="table table-striped table-light table-hover my-4">
	<thead>
		<tr>
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
		</tr>
	</thead>

	<tbody>
        <tr>
            <td>{$res['jan_realizado']}</td>
            <td>{$res['fev_realizado']}</td>
            <td>{$res['mar_realizado']}</td>
            <td>{$res['abr_realizado']}</td>
            <td>{$res['mai_realizado']}</td>
            <td>{$res['jun_realizado']}</td>
            <td>{$res['jul_realizado']}</td>
            <td>{$res['ago_realizado']}</td>
            <td>{$res['set_realizado']}</td>
            <td>{$res['out_realizado']}</td>
            <td>{$res['nov_realizado']}</td>
            <td>{$res['dez_realizado']}</td>
        </tr>
	</tbody>
</table>

HTML;

$acumulado = 0;
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