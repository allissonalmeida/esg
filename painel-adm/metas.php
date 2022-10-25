<?php 
require_once("../conexao.php");
require_once("verificar_adm_acesso.php");
$pagina = 'metas';

require_once($pagina."/campos.php");

?>
<div class="row">

<div class="col-md-4 my-3">

	<h1 class="lead">
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M13.22 19.03a.75.75 0 001.06 0l6.25-6.25a.75.75 0 000-1.06l-6.25-6.25a.75.75 0 10-1.06 1.06l4.97 4.97H3.75a.75.75 0 000 1.5h14.44l-4.97 4.97a.75.75 0 000 1.06z"></path></svg>
	<b>Cadastrar Metas</b>
	</h1>
</div>

<div class="col-md-12 my-3">
	<a href="#" onclick="inserir()" type="button" class="btn btn-dark btn-sm">Novo Indicador</a>
</div>

<small>
	<div class="tabela bg-light" id="listar">

	</div>
</small>



<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><span id="tituloModal">Inserir Meta</span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form" method="post">
				<div class="modal-body">

				

					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label"><?php echo $campo1 ?></label>
						<input type="text" class="form-control" name="<?php echo $campo1 ?>" placeholder="<?php echo $campo1 ?>" id="<?php echo $campo1 ?>" required>
					</div>

					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label"><?php echo $campo2 ?></label>
						<input type="text" class="form-control" name="<?php echo $campo2 ?>" placeholder="<?php echo $campo2 ?>" id="<?php echo $campo2 ?>" >
					</div>
					
					
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Plataforma</label>
						<select class="form-select" aria-label="Default select example" name="<?php echo $campo3 ?>" id="id_plataforma">
							<?php 
							$query = $pdo->query("SELECT * FROM plataformas ORDER BY nome ASC");
							$res = $query->fetchAll(PDO::FETCH_ASSOC);
							for($i=0; $i < @count($res); $i++){
								foreach ($res[$i] as $key => $value){	}
									$id_item = $res[$i]['id'];
									$nome_item = $res[$i]['nome'];
								?>
								<option value="<?php echo $id_item ?>" ><?php echo $nome_item ?></option>

							<?php } ?>
						</select>
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




<!-- Modal -->
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




