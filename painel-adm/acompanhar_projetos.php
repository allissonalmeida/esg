<?php 
require_once("../conexao.php");
require_once("verificar_adm_acesso.php");
$pagina = 'acompanhar_projetos';

require_once($pagina."/campos.php");

//Totalizador de status
$query = $pdo->prepare("SELECT id_status FROM projetos");
$query->execute();

$count_implantacao = 0;
$count_execucao = 0;
$count_finalizacao = 0;
$count_finalizado = 0;

while ($res = $query->fetch(PDO::FETCH_ASSOC)) {

    if($res['id_status'] == 1){
        $status =  'Implantação';
        $count_implantacao++;
    }elseif($res['id_status'] == 2){
        $status =  'Execução';
        $count_execucao++;
    }elseif($res['id_status'] == 3){
        $status =  'Finalização';
        $count_finalizacao++;
    }elseif($res['id_status'] == 4){
        $status =  'Finalizado';
        $count_finalizado++;
    }
}

?>


<!-- Titulo -->
<div class="row">

    <div class="col-md-12 my-3">
		<h4 class="lead">
			<b>
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M13.22 19.03a.75.75 0 001.06 0l6.25-6.25a.75.75 0 000-1.06l-6.25-6.25a.75.75 0 10-1.06 1.06l4.97 4.97H3.75a.75.75 0 000 1.5h14.44l-4.97 4.97a.75.75 0 000 1.06z"></path></svg>
			</a>Acompanhar Projetos</b> 
		</h4>
	</div>

</div>
<!-- Fim: Titulo -->



<!-- Totalizadores -->

<div class="row">

	

    <div class="col-md-3 my-3">
        <!--<a href="#" onclick="inserir()" type="button" class="btn btn-dark btn-sm">Novo Projeto</a>-->
		
		<center>
			<button type="button" class="btn btn-secondary position-relative"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M16 12a4 4 0 11-8 0 4 4 0 018 0zm-1.5 0a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path><path fill-rule="evenodd" d="M12 1c-.268 0-.534.01-.797.028-.763.055-1.345.617-1.512 1.304l-.352 1.45c-.02.078-.09.172-.225.22a8.45 8.45 0 00-.728.303c-.13.06-.246.044-.315.002l-1.274-.776c-.604-.368-1.412-.354-1.99.147-.403.348-.78.726-1.129 1.128-.5.579-.515 1.387-.147 1.99l.776 1.275c.042.069.059.185-.002.315-.112.237-.213.48-.302.728-.05.135-.143.206-.221.225l-1.45.352c-.687.167-1.249.749-1.304 1.512a11.149 11.149 0 000 1.594c.055.763.617 1.345 1.304 1.512l1.45.352c.078.02.172.09.22.225.09.248.191.491.303.729.06.129.044.245.002.314l-.776 1.274c-.368.604-.354 1.412.147 1.99.348.403.726.78 1.128 1.129.579.5 1.387.515 1.99.147l1.275-.776c.069-.042.185-.059.315.002.237.112.48.213.728.302.135.05.206.143.225.221l.352 1.45c.167.687.749 1.249 1.512 1.303a11.125 11.125 0 001.594 0c.763-.054 1.345-.616 1.512-1.303l.352-1.45c.02-.078.09-.172.225-.22.248-.09.491-.191.729-.303.129-.06.245-.044.314-.002l1.274.776c.604.368 1.412.354 1.99-.147.403-.348.78-.726 1.129-1.128.5-.579.515-1.387.147-1.99l-.776-1.275c-.042-.069-.059-.185.002-.315.112-.237.213-.48.302-.728.05-.135.143-.206.221-.225l1.45-.352c.687-.167 1.249-.749 1.303-1.512a11.125 11.125 0 000-1.594c-.054-.763-.616-1.345-1.303-1.512l-1.45-.352c-.078-.02-.172-.09-.22-.225a8.469 8.469 0 00-.303-.728c-.06-.13-.044-.246-.002-.315l.776-1.274c.368-.604.354-1.412-.147-1.99-.348-.403-.726-.78-1.128-1.129-.579-.5-1.387-.515-1.99-.147l-1.275.776c-.069.042-.185.059-.315-.002a8.465 8.465 0 00-.728-.302c-.135-.05-.206-.143-.225-.221l-.352-1.45c-.167-.687-.749-1.249-1.512-1.304A11.149 11.149 0 0012 1zm-.69 1.525a9.648 9.648 0 011.38 0c.055.004.135.05.162.16l.351 1.45c.153.628.626 1.08 1.173 1.278.205.074.405.157.6.249a1.832 1.832 0 001.733-.074l1.275-.776c.097-.06.186-.036.228 0 .348.302.674.628.976.976.036.042.06.13 0 .228l-.776 1.274a1.832 1.832 0 00-.074 1.734c.092.195.175.395.248.6.198.547.652 1.02 1.278 1.172l1.45.353c.111.026.157.106.161.161a9.653 9.653 0 010 1.38c-.004.055-.05.135-.16.162l-1.45.351a1.833 1.833 0 00-1.278 1.173 6.926 6.926 0 01-.25.6 1.832 1.832 0 00.075 1.733l.776 1.275c.06.097.036.186 0 .228a9.555 9.555 0 01-.976.976c-.042.036-.13.06-.228 0l-1.275-.776a1.832 1.832 0 00-1.733-.074 6.926 6.926 0 01-.6.248 1.833 1.833 0 00-1.172 1.278l-.353 1.45c-.026.111-.106.157-.161.161a9.653 9.653 0 01-1.38 0c-.055-.004-.135-.05-.162-.16l-.351-1.45a1.833 1.833 0 00-1.173-1.278 6.928 6.928 0 01-.6-.25 1.832 1.832 0 00-1.734.075l-1.274.776c-.097.06-.186.036-.228 0a9.56 9.56 0 01-.976-.976c-.036-.042-.06-.13 0-.228l.776-1.275a1.832 1.832 0 00.074-1.733 6.948 6.948 0 01-.249-.6 1.833 1.833 0 00-1.277-1.172l-1.45-.353c-.111-.026-.157-.106-.161-.161a9.648 9.648 0 010-1.38c.004-.055.05-.135.16-.162l1.45-.351a1.833 1.833 0 001.278-1.173 6.95 6.95 0 01.249-.6 1.832 1.832 0 00-.074-1.734l-.776-1.274c-.06-.097-.036-.186 0-.228.302-.348.628-.674.976-.976.042-.036.13-.06.228 0l1.274.776a1.832 1.832 0 001.734.074 6.95 6.95 0 01.6-.249 1.833 1.833 0 001.172-1.277l.353-1.45c.026-.111.106-.157.161-.161z"></path></svg> Implantação
				<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?php echo $count_implantacao; ?>
				<span class="visually-hidden">unread messages</span>
				</span>
				</button>

		</center>
	

        <!--<button type="button" class="btn btn-secondary">
        Implantação <span class="badge bg-secondary"><?php echo $count_implantacao; ?></span>
        </button>-->
    </div>

	<!-- <div class="col-md-1 my-3">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M13.22 19.03a.75.75 0 001.06 0l6.25-6.25a.75.75 0 000-1.06l-6.25-6.25a.75.75 0 10-1.06 1.06l4.97 4.97H3.75a.75.75 0 000 1.5h14.44l-4.97 4.97a.75.75 0 000 1.06z"></path></svg>
	</div> -->

    <div class="col-md-3 my-3">

		<center>
		<button type="button" class="btn btn-success position-relative"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M20.322.75a10.75 10.75 0 00-7.373 2.926l-1.304 1.23A23.743 23.743 0 0010.103 6.5H5.066a1.75 1.75 0 00-1.5.85l-2.71 4.514a.75.75 0 00.49 1.12l4.571.963c.039.049.082.096.129.14L8.04 15.96l1.872 1.994c.044.047.091.09.14.129l.963 4.572a.75.75 0 001.12.488l4.514-2.709a1.75 1.75 0 00.85-1.5v-5.038a23.741 23.741 0 001.596-1.542l1.228-1.304a10.75 10.75 0 002.925-7.374V2.499A1.75 1.75 0 0021.498.75h-1.177zM16 15.112c-.333.248-.672.487-1.018.718l-3.393 2.262.678 3.223 3.612-2.167a.25.25 0 00.121-.214v-3.822zm-10.092-2.7L8.17 9.017c.23-.346.47-.685.717-1.017H5.066a.25.25 0 00-.214.121l-2.167 3.612 3.223.679zm8.07-7.644a9.25 9.25 0 016.344-2.518h1.177a.25.25 0 01.25.25v1.176a9.25 9.25 0 01-2.517 6.346l-1.228 1.303a22.248 22.248 0 01-3.854 3.257l-3.288 2.192-1.743-1.858a.764.764 0 00-.034-.034l-1.859-1.744 2.193-3.29a22.248 22.248 0 013.255-3.851l1.304-1.23zM17.5 8a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm-11 13c.9-.9.9-2.6 0-3.5-.9-.9-2.6-.9-3.5 0-1.209 1.209-1.445 3.901-1.49 4.743a.232.232 0 00.247.247c.842-.045 3.534-.281 4.743-1.49z"></path></svg> Execução
		<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?php echo $count_execucao; ?>
		<span class="visually-hidden">unread messages</span>
		</span>
		</button>
		</center>
		

        <!--<button type="button" class="btn btn-success">
        Execução <span class="badge bg-secondary"><?php echo $count_execucao; ?></span>
        </button>-->
    </div>

	<!--<div class="col-md-1 my-3">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M13.22 19.03a.75.75 0 001.06 0l6.25-6.25a.75.75 0 000-1.06l-6.25-6.25a.75.75 0 10-1.06 1.06l4.97 4.97H3.75a.75.75 0 000 1.5h14.44l-4.97 4.97a.75.75 0 000 1.06z"></path></svg>
	</div>-->

    <div class="col-md-3 my-3">

		<center>
		<button type="button" class="btn btn-warning position-relative"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M2.828 4.328C5.26 1.896 9.5 1.881 11.935 4.317c.024.024.046.05.067.076 1.391-1.078 2.993-1.886 4.777-1.89a6.216 6.216 0 014.424 1.825c.559.56 1.023 1.165 1.34 1.922.318.756.47 1.617.468 2.663 0 2.972-2.047 5.808-4.269 8.074-2.098 2.14-4.507 3.924-5.974 5.009l-.311.23a.752.752 0 01-.897 0l-.312-.23c-1.466-1.085-3.875-2.869-5.973-5.009-2.22-2.263-4.264-5.095-4.27-8.063v.012-.024.012a6.217 6.217 0 011.823-4.596zm8.033 1.042c-1.846-1.834-5.124-1.823-6.969.022a4.713 4.713 0 00-1.382 3.52c0 2.332 1.65 4.79 3.839 7.022 1.947 1.986 4.184 3.66 5.66 4.752a79.983 79.983 0 002.159-1.645l-2.14-1.974a.752.752 0 011.02-1.106l2.295 2.118c.616-.52 1.242-1.08 1.85-1.672l-2.16-1.992a.752.752 0 011.021-1.106l2.188 2.02a18.992 18.992 0 001.528-1.877l-.585-.586-1.651-1.652c-1.078-1.074-2.837-1.055-3.935.043-.379.38-.76.758-1.132 1.126-1.14 1.124-2.96 1.077-4.07-.043-.489-.495-.98-.988-1.475-1.482a.752.752 0 01-.04-1.019c.234-.276.483-.576.745-.893.928-1.12 2.023-2.442 3.234-3.576zm9.725 6.77c.579-1.08.92-2.167.92-3.228.002-.899-.128-1.552-.35-2.08-.22-.526-.551-.974-1.017-1.44a4.71 4.71 0 00-3.356-1.384c-1.66.004-3.25.951-4.77 2.346-1.18 1.084-2.233 2.353-3.188 3.506l-.351.423c.331.332.663.664.993.998a1.375 1.375 0 001.943.03c.37-.365.748-.74 1.125-1.118 1.662-1.663 4.373-1.726 6.06-.045.56.558 1.12 1.12 1.658 1.658l.333.334z"></path></svg> Finalização
		<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?php echo $count_finalizacao; ?>
		<span class="visually-hidden">unread messages</span>
		</span>
		</button>
		</center>
		

        <!--<button type="button" class="btn btn-warning">
        Finalização <span class="badge bg-secondary"><?php echo $count_finalizacao; ?></span>
        </button> -->
    </div>

	<!--<div class="col-md-2 my-3">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M13.22 19.03a.75.75 0 001.06 0l6.25-6.25a.75.75 0 000-1.06l-6.25-6.25a.75.75 0 10-1.06 1.06l4.97 4.97H3.75a.75.75 0 000 1.5h14.44l-4.97 4.97a.75.75 0 000 1.06z"></path></svg>
	</div>-->
    
    <div class="col-md-3 my-3">

	<center>
	<button type="button" class="btn btn-danger position-relative"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M5.09 10.121A5.252 5.252 0 011 5V3.75C1 2.784 1.784 2 2.75 2h2.364c.236-.586.81-1 1.48-1h10.812c.67 0 1.244.414 1.48 1h2.489c.966 0 1.75.784 1.75 1.75V5a5.252 5.252 0 01-4.219 5.149 7.01 7.01 0 01-4.644 5.478l.231 3.003a.326.326 0 00.034.031c.079.065.303.203.836.282.838.124 1.637.81 1.637 1.807v.75h2.25a.75.75 0 010 1.5H4.75a.75.75 0 010-1.5H7v-.75c0-.996.8-1.683 1.637-1.807.533-.08.757-.217.836-.282a.334.334 0 00.034-.031l.231-3.003A7.01 7.01 0 015.09 10.12zM5 3.5H2.75a.25.25 0 00-.25.25V5A3.752 3.752 0 005 8.537V3.5zm6.217 12.457l-.215 2.793-.001.021-.003.043a1.203 1.203 0 01-.022.147c-.05.237-.194.567-.553.86-.348.286-.853.5-1.566.605a.482.482 0 00-.274.136.265.265 0 00-.083.188v.75h7v-.75a.265.265 0 00-.083-.188.483.483 0 00-.274-.136c-.713-.105-1.218-.32-1.567-.604-.358-.294-.502-.624-.552-.86a1.203 1.203 0 01-.025-.19l-.001-.022-.215-2.793a7.076 7.076 0 01-1.566 0zM19 8.578V3.5h2.375a.25.25 0 01.25.25V5c0 1.68-1.104 3.1-2.625 3.578zM6.5 2.594c0-.052.042-.094.094-.094h10.812c.052 0 .094.042.094.094V9a5.5 5.5 0 11-11 0V2.594z"></path></svg> Finalizado
		<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?php echo $count_finalizado; ?>
		<span class="visually-hidden">unread messages</span>
		</span>
		</button>

	</center>
		
        <!-- <button type="button" class="btn btn-danger">
        Finalizado <span class="badge bg-secondary"><?php echo $count_finalizado; ?></span>
        </button> -->
    </div>

</div>

<!-- Fim: Totalizadores -->

<small>
	<div class="tabela bg-light" id="listar"></div>
</small>



<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><span id="tituloModal">Inserir Fornecedor</span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form" method="post">
				<div class="modal-body">

					<!--<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#dados" type="button" role="tab" aria-controls="home" aria-selected="true">Dados Pessoais</a>
						</li>
						<li class="nav-item" role="presentation">
							<a class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#contas" type="button" role="tab" aria-controls="profile" aria-selected="false">Dados Bancários</a>
						</li>
						
					</ul>
					
					<hr>-->

					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="dados" role="tabpanel" aria-labelledby="home-tab">

							<div class="row">


								<div class="col-md-3 col-sm-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label"><?php echo $campo11 ?> </label>
										<select class="form-select" aria-label="Default select example" name="<?php echo $campo11 ?>" id="<?php echo $campo11 ?>" required>
										<option value=""></option>
										<option value="P&D">P&D</option>
										<option value="PEE">PEE</option>
										<option value="TD">TD</option>
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
										<label for="exampleFormControlInput1" class="form-label"><?php echo $campo4 ?> </label>
										<select class="form-select" aria-label="Default select example" name="<?php echo $campo4 ?>" id="<?php echo $campo4 ?>">
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

								<div class="col-md-6 col-sm-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label">Valor Total</label>
										<input type="text" class="form-control" name="<?php echo $campo8 ?>" placeholder="<?php echo $campo8 ?>" id="<?php echo $campo8 ?>" >
									</div>
								</div>

								<div class="col-md-6 col-sm-12">
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label">Valor Utilizado</label>
										<input type="text" class="form-control" name="<?php echo $campo9 ?>" placeholder="<?php echo $campo9 ?>" id="<?php echo $campo9 ?>" >
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


