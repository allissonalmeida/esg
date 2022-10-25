<?php 
require_once("../conexao.php");
require_once("verificar_adm_acesso.php");
$pagina = 'acompanhar_esg';

require_once($pagina."/campos.php");

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"> </script>

<div class="row">

	<div class="col-md-11 my-3">
		
		<h4 class="lead">
			<b>
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M13.22 19.03a.75.75 0 001.06 0l6.25-6.25a.75.75 0 000-1.06l-6.25-6.25a.75.75 0 10-1.06 1.06l4.97 4.97H3.75a.75.75 0 000 1.5h14.44l-4.97 4.97a.75.75 0 000 1.06z"></path></svg>
		</a>Acumulado</b> 
		</h4>

	</div>

	<div class="col-md-1">
		
	</div>

</div>








<!-- Lista Acumulado por Indicador-->
<div class="row">


	<div class="col-md-12">
		<small>
			<div class="tabela bg-light" id="listar"></div>
		</small>
	</div>
	
</div>
<!-- Fim Lista-->

<div class="row">
	<!-- Gráfico -->
	<div class="row">
		<div class="col-md-10">
			<canvas id="myChartt" width="10%" height="2%"></canvas>
		</div>
	</div>
	<!-- Fim Gráfico -->
</div>

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Janeiro', 'Feveiro', 'Março', 'Abril', 'Maio', 'Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        datasets: [{
            label: '2022',
            data: [12, 19, 3, 5, 16, 3, 10, 7, 5, 7, 3, 17],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>


<!-- Fim Gráfico -->



<!-- Modal Editar -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><span id="tituloModal">Inserir Fornecedor</span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form" method="post">
				<div class="modal-body">

					<div class="row">

						


						<div class="col-md-3 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Projeto </label>
								<select class="form-select" aria-label="Default select example" name="<?php echo $campo2 ?>" id="<?php echo $campo2 ?>">
									<?php 
									$query = $pdo->query("SELECT * FROM projetos order by descricao asc");
									$res = $query->fetchAll(PDO::FETCH_ASSOC);
									for($i=0; $i < @count($res); $i++){
										foreach ($res[$i] as $key => $value){	}
											$id_item = $res[$i]['id'];
											$nome_item = $res[$i]['descricao'];
											$contrato = $res[$i]['contrato'];
										?>
										<option value="<?php echo $id_item ?>"><?php echo $nome_item .' - ' . $contrato ?></option>

									<?php } ?>
								</select>
							</div>
						</div>

						<div class="col-md-3 col-sm-12">
							<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Indicador </label>
							<select class="form-select" aria-label="Default select example" name="<?php echo $campo1 ?>" id="<?php echo $campo1 ?>">
								<?php 
								$query = $pdo->query("SELECT * FROM indicadores order by descricao asc");
								$res = $query->fetchAll(PDO::FETCH_ASSOC);
								for($i=0; $i < @count($res); $i++){
									foreach ($res[$i] as $key => $value){	}
										$id_item = $res[$i]['id'];
										$nome_item = $res[$i]['descricao'];
									?>
									<option value="<?php echo $id_item ?>"><?php echo $nome_item ?></option>

								<?php } ?>
							</select>
							</div>
						</div>
						

						<div class="col-md-3 col-sm-12">
							<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Distribuidor </label>
								<select class="form-select" aria-label="Default select example" name="<?php echo $campo3 ?>" id="<?php echo $campo3 ?>">
								<option value=""></option>
									<?php 
									$query = $pdo->query("SELECT * FROM distribuidores order by descricao asc");
									$res = $query->fetchAll(PDO::FETCH_ASSOC);
									for($i=0; $i < @count($res); $i++){
										foreach ($res[$i] as $key => $value){	}
											$id_item = $res[$i]['id'];
											$nome_item = $res[$i]['descricao'];
										?>
										<option value="<?php echo $id_item ?>"><?php echo $nome_item ?></option>

									<?php } ?>
								</select>
							</div>
						</div>

						<div class="col-md-3 col-sm-12">
							<div class="mb-3">

							<label for="exampleFormControlInput1" class="form-label"><?php echo $campo4 ?> </label>
							<select class="form-select" aria-label="Default select example" name="<?php echo $campo4 ?>" id="<?php echo $campo4 ?>">

								<option value="2019">2019</option>
								<option value="2020">2020</option>
								<option value="2021">2021</option>
								<option value="2022">2022</option>

							</select>
							</div>
						</div>

					</div>

					<!-- META -->

					<div class="alert alert-primary d-flex align-items-center" role="alert">
					<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
					<div>
					Meta
					</div>
					</div>

					<!-- <div class="row">
						<div class="alert alert-primary" role="alert">
						Meta
						</div>
					</div> -->


					<div class="row">


						<div class="col-md-1 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Jan</label>
								<input type="text" class="form-control" name="<?php echo $campo5 ?>" placeholder="" id="<?php echo $campo5 ?>" >
							</div>
						</div>

						<div class="col-md-1 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Fev</label>
								<input type="text" class="form-control" name="<?php echo $campo6 ?>" placeholder="" id="<?php echo $campo6 ?>" >
							</div>
						</div>
						<div class="col-md-1 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Mar</label>
								<input type="text" class="form-control" name="<?php echo $campo7 ?>" placeholder="" id="<?php echo $campo7 ?>" >
							</div>
						</div>
						
						<div class="col-md-1 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Abr</label>
								<input type="text" class="form-control" name="<?php echo $campo8 ?>" placeholder="" id="<?php echo $campo8 ?>" >
							</div>
						</div>
						<div class="col-md-1 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Mai</label>
								<input type="text" class="form-control" name="<?php echo $campo9 ?>" placeholder="" id="<?php echo $campo9 ?>" >
							</div>
						</div>
						
						<div class="col-md-1 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Jun</label>
								<input type="text" class="form-control" name="<?php echo $campo10 ?>" placeholder="" id="<?php echo $campo10 ?>" >
							</div>
						</div>
						<div class="col-md-1 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Jul</label>
								<input type="text" class="form-control" name="<?php echo $campo11 ?>" placeholder="" id="<?php echo $campo11 ?>" >
							</div>
						</div>
						
						<div class="col-md-1 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Ago</label>
								<input type="text" class="form-control" name="<?php echo $campo12 ?>" placeholder="" id="<?php echo $campo12 ?>" >
							</div>
						</div>
						<div class="col-md-1 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Set</label>
								<input type="text" class="form-control" name="<?php echo $campo13 ?>" placeholder="" id="<?php echo $campo13 ?>" >
							</div>
						</div>
						
						<div class="col-md-1 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Out</label>
								<input type="text" class="form-control" name="<?php echo $campo14 ?>" placeholder="" id="<?php echo $campo14 ?>" >
							</div>
						</div>

						<div class="col-md-1 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Nov</label>
								<input type="text" class="form-control" name="<?php echo $campo15 ?>" placeholder="" id="<?php echo $campo15 ?>" >
							</div>
						</div>
						
						<div class="col-md-1 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Dez</label>
								<input type="text" class="form-control" name="<?php echo $campo16 ?>" placeholder="" id="<?php echo $campo16 ?>" >
							</div>
						</div>
						
					
					</div>




					<!-- REALIZADO -->

					<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
					<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
					<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
					</symbol>
					<symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
					<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
					</symbol>
					<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
					<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
					</symbol>
					</svg>

					<div class="alert alert-success d-flex align-items-center" role="alert">
					<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
					<div>
					Realizado
					</div>
					</div>

					<!--<div class="row">
						<div class="alert alert-primary" role="alert">
						Realizado
						</div>
					</div>-->


					<div class="row">


						<div class="col-md-1 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Jan</label>
								<input type="text" class="form-control" name="<?php echo $campo17 ?>" placeholder="" id="<?php echo $campo17 ?>" >
							</div>
						</div>

						<div class="col-md-1 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Fev</label>
								<input type="text" class="form-control" name="<?php echo $campo18 ?>" placeholder="" id="<?php echo $campo18 ?>" >
							</div>
						</div>
						<div class="col-md-1 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Mar</label>
								<input type="text" class="form-control" name="<?php echo $campo19 ?>" placeholder="" id="<?php echo $campo19 ?>" >
							</div>
						</div>
						
						<div class="col-md-1 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Abr</label>
								<input type="text" class="form-control" name="<?php echo $campo20 ?>" placeholder="" id="<?php echo $camp20 ?>" >
							</div>
						</div>

						<div class="col-md-1 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Mai</label>
								<input type="text" class="form-control" name="<?php echo $campo21 ?>" placeholder="" id="<?php echo $campo21 ?>" >
							</div>
						</div>
						
						<div class="col-md-1 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Jun</label>
								<input type="text" class="form-control" name="<?php echo $campo22 ?>" placeholder="" id="<?php echo $campo22 ?>" >
							</div>
						</div>
						<div class="col-md-1 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Jul</label>
								<input type="text" class="form-control" name="<?php echo $campo23 ?>" placeholder="" id="<?php echo $campo23 ?>" >
							</div>
						</div>
						
						<div class="col-md-1 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Ago</label>
								<input type="text" class="form-control" name="<?php echo $campo24 ?>" placeholder="" id="<?php echo $campo24 ?>" >
							</div>
						</div>
						<div class="col-md-1 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Set</label>
								<input type="text" class="form-control" name="<?php echo $campo25 ?>" placeholder="" id="<?php echo $campo25 ?>" >
							</div>
						</div>
						
						<div class="col-md-1 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Out</label>
								<input type="text" class="form-control" name="<?php echo $campo26 ?>" placeholder="" id="<?php echo $campo26 ?>" >
							</div>
						</div>

						<div class="col-md-1 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Nov</label>
								<input type="text" class="form-control" name="<?php echo $campo27 ?>" placeholder="" id="<?php echo $campo27 ?>" >
							</div>
						</div>
						
						<div class="col-md-1 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Dez</label>
								<input type="text" class="form-control" name="<?php echo $campo28 ?>" placeholder="" id="<?php echo $campo28 ?>" >
							</div>
						</div>
						
					
					</div>


					<small><div id="mensagem" align="center"></div></small>

					<input type="hidden" class="form-control" name="id"  id="id">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar">Fechar</button>
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</form>
		</div>
	</div>
</div>




<!-- Modal Excluir -->
<div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><span id="tituloModal">Excluir Registro</span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form-excluir" method="post">
				<div class="modal-body">

					Deseja Realmente excluir este Registro: <span id="nome-excluido"></span>?

					<small><div id="mensagem-excluir" align="center"></div></small>

					<input type="hidden" class="form-control" name="id-excluir"  id="id-excluir">


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar-excluir">Fechar</button>
					<button type="submit" class="btn btn-danger">Excluir</button>
				</div>
			</form>
		</div>
	</div>
</div>


<script type="text/javascript">var pag = "<?=$pagina?>"</script>
<script src="../js/ajax.js"></script>





