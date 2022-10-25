<?php 
require_once("../conexao.php");
require_once("verificar_adm_acesso.php");
$pagina = 'projetos';

require_once($pagina."/campos.php");

?>

<div class="row">

	<div class="col-md-11 my-3">
		
		<h4 class="lead">
			<b>
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M13.22 19.03a.75.75 0 001.06 0l6.25-6.25a.75.75 0 000-1.06l-6.25-6.25a.75.75 0 10-1.06 1.06l4.97 4.97H3.75a.75.75 0 000 1.5h14.44l-4.97 4.97a.75.75 0 000 1.06z"></path></svg>
		</a>Cadastrar Projetos</b> 
		</h4>

	</div>

</div>

<div class="col-md-12 my-3">
	<a href="#" onclick="inserir()" type="button" class="btn btn-dark btn-sm">Novo Projeto</a>
</div>

<small>
	<div class="tabela bg-light" id="listar"></div>
</small>



<!-- Modal: outros dados -->
<div class="modal fade" id="modalDados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Contrato: <span id="campo1"></span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			
				<div class="modal-body">
					<small>

						<span>
							<b><?php echo $campo8 ?>:</b> <span id="campo8"></span>
						</span>
						
						<span class="mx-4">
							<b><?php echo $campo9 ?>:</b> <span id="campo9" ></span>
						</span>	
						
						<br>
						<span class="mx-0"><b><?php echo $campo10 ?>:</b> <span id="campo10"></span></span>
						<hr style="margin:6px;">


					</small>

				</div>
				
		</div>
	</div>
</div>




<!-- Modal Editar -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><span id="tituloModal">Inserir Fornecedor</span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form" method="post">
				<div class="modal-body">

					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="dados" role="tabpanel" aria-labelledby="home-tab">

							<div class="row">


								<div class="col-md-3 col-sm-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label"><?php echo $campo4 ?> </label>
										<select class="form-select" aria-label="Default select example" name="<?php echo $campo4 ?>" id="id_tipo_projeto">
										<?php 
										$query = $pdo->query("SELECT * FROM projetos_tipo order by descricao asc");
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
											<label for="exampleFormControlInput1" class="form-label"><?php echo $campo1 ?></label>
											<input type="text" class="form-control" name="<?php echo $campo1 ?>" placeholder="<?php echo $campo1 ?>" id="<?php echo $campo1 ?>" >
									</div>
								</div>

								<div class="col-md-3 col-sm-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label"><?php echo $campo2 ?></label>
										<input type="text" class="form-control" name="<?php echo $campo2 ?>" placeholder="<?php echo $campo2 ?>" id="<?php echo $campo2 ?>" >
									</div>
								</div>

								<div class="col-md-3 col-sm-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label"><?php echo $campo3 ?></label>
										<input type="text" class="form-control" name="<?php echo $campo3 ?>" placeholder="<?php echo $campo3 ?>" id="<?php echo $campo3 ?>" >
									</div>
								</div>

								
							</div>

							<div class="row">


								<div class="col-md-3 col-sm-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label"><?php echo $campo13 ?> </label>
										<select class="form-select" aria-label="Default select example" name="<?php echo $campo13 ?>" id="id_fornecedor">
										<option value=""></option>
										<?php 
										$query = $pdo->query("SELECT * FROM fornecedores order by nome asc");
										$res = $query->fetchAll(PDO::FETCH_ASSOC);
										for($i=0; $i < @count($res); $i++){
										foreach ($res[$i] as $key => $value){	}
										$id_item = $res[$i]['id'];
										$nome_item = $res[$i]['nome'];
										?>
										<option value="<?php echo $id_item ?>"><?php echo $nome_item ?></option>

										<?php } ?>


										</select>
									</div>
								</div>


								<div class="col-md-3 col-sm-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label"><?php echo $campo5 ?> </label>
										<select class="form-select" aria-label="Default select example" name="<?php echo $campo5 ?>" id="<?php echo $campo5 ?>">
										<?php 
										$query = $pdo->query("SELECT * FROM distribuidores order by descricao asc");
										$res = $query->fetchAll(PDO::FETCH_ASSOC);
										for($i=0; $i < @count($res); $i++){
										foreach ($res[$i] as $key => $value){ }
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
										<label for="exampleFormControlInput1" class="form-label">Data Início</label>
										<input type="date" class="form-control" name="<?php echo $campo6 ?>" placeholder="<?php echo $campo6 ?>" id="<?php echo $campo6 ?>" >
									</div>
								</div>

								<div class="col-md-3 col-sm-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label">Data Final</label>
										<input type="date" class="form-control" name="<?php echo $campo7 ?>" placeholder="<?php echo $campo7 ?>" id="<?php echo $campo7 ?>">
									</div>
								</div>

								<!-- Aqui  -->
								<div class="col-md-3 col-sm-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label"><?php echo $campo11 ?> </label>
										<select class="form-select" aria-label="Default select example" name="<?php echo $campo11 ?>" id="id_plataforma">
										<option value=""></option>
										<?php 
										$query = $pdo->query("SELECT * FROM plataformas order by nome asc");
										$res = $query->fetchAll(PDO::FETCH_ASSOC);
										for($i=0; $i < @count($res); $i++){
										foreach ($res[$i] as $key => $value){ }
										$id_item = $res[$i]['id'];
										$nome_item = $res[$i]['nome'];
										?>
										<option value="<?php echo $id_item ?>"><?php echo $nome_item ?></option>

										<?php } ?>


										</select>
									</div>
								</div>


								<div class="col-md-3 col-sm-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label">Valor Total</label>
										<input type="text" class="form-control" name="<?php echo $campo8 ?>" placeholder="<?php echo $campo8 ?>" id="<?php echo $campo8 ?>" >
									</div>
								</div>

								<div class="col-md-3 col-sm-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label">Valor Utilizado</label>
										<input type="text" class="form-control" name="<?php echo $campo9 ?>" placeholder="<?php echo $campo9 ?>" id="<?php echo $campo9 ?>" >
									</div>
								</div>
								
								<div class="col-md-3 col-sm-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label">Status</label>
										<select class="form-select" aria-label="Default select example" name="<?php echo $campo12 ?>" id="id_status">
										<option value=""></option>
										<option value="1">Implantação</option>
										<option value="2">Execução</option>
										<option value="3">Finalização</option>
										<option value="4">Finalizado</option>

										</select>

									</div>
								</div>

							</div>

							<div class="row">
								<div class="col-md-12 col-sm-12">

									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label">Observação</label>
										<textarea maxlength="100" class="form-control" name="<?php echo $campo10 ?>" id="<?php echo $campo10 ?>"></textarea>
									</div>

								</div>
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

<script>
	$(document).ready(function() {

		$('#data-inicio').change(function(){
			var dataInicial = $('#data-inicial').val();
			var dataFinal = $('#data-final').val();
			var status = $('#status-busca').val();
			var alterou_data = 'Sim';
			listarBusca(dataInicial, dataFinal, status, alterou_data);
		});

		$('#data-final').change(function(){
			var dataInicial = $('#data-inicial').val();
			var dataFinal = $('#data-final').val();
			var status = $('#status-busca').val();
			var alterou_data = 'Sim';
			listarBusca(dataInicial, dataFinal, status, alterou_data);
		});



	});



</script>


