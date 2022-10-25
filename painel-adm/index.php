<?php 
@session_start();
require_once("../conexao.php");
require_once("verificar.php");
$id_usuario = $_SESSION['id_usuario'];
$niv_usuario = $_SESSION['nivel_usuario'];

if($niv_usuario != 'Administrador'){
	$ocultar_menu = 'd-none';
}else{
	$ocultar_menu = 'd-block';
}

//RECUPERAR DADOS DO USUÁRIO
$query = $pdo->query("SELECT * from usuarios where id = '$id_usuario' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$nome_usuario = $res[0]['nome'];
$email_usuario = $res[0]['email'];
$senha_usuario = $res[0]['senha'];
$nivel_usuario = $res[0]['nivel'];


//MENUS DO PAINEL
$menu1 = 'home';
$menu2 = 'indicadores';
$menu3 = 'niveis';
$menu4 = 'projetos';
$menu5 = 'plataformas';
$menu6 = 'usuarios';
$menu7 = 'distribuidores';
$menu8 = 'fornecedores';
$menu9 = 'acompanhar_projetos';
$menu10 = 'acompanhar_esg';
$menu11 = 'metas';
$menu12 = 'acompanhar_plataformas';
$menu13 = 'acompanhar_qualidade';




if(@$_GET['pag'] == ""){
	$pag = $menu1;
}else{
	$pag = $_GET['pag'];
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Hugo Vasconcelos">
	<title><?php echo $nome_sistema ?></title>

	<link href="../img/logo.ico" rel="shortcut icon" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/style.css"/>

	<script type="text/javascript" src="../DataTables/datatables.min.js"></script>

</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="#"><img src="../img/logo-grupo-equatorial-energia-padrao.png" width="60%"></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="index.php?pag=<?php echo $menu1 ?>">Dashboard</a>
					</li>
					
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Cadastrar
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">							
							
							<li><a class="dropdown-item <?php echo $ocultar_menu ?>" href="index.php?pag=<?php echo $menu7 ?>">Distribuidores</a></li>
							<li><a class="dropdown-item <?php echo $ocultar_menu ?>" href="index.php?pag=<?php echo $menu8 ?>">Fornecedores</a></li> 
							
							<li><a class="dropdown-item <?php echo $ocultar_menu ?>" href="index.php?pag=<?php echo $menu4 ?>">Projetos</a></li>
							<li><a class="dropdown-item <?php echo $ocultar_menu ?>" href="index.php?pag=<?php echo $menu5 ?>">Plataformas</a></li>
							<li><a class="dropdown-item <?php echo $ocultar_menu ?>" href="index.php?pag=<?php echo $menu2 ?>">Indicadores</a></li>
							<li><a class="dropdown-item <?php echo $ocultar_menu ?>" href="index.php?pag=<?php echo $menu11 ?>">Metas</a></li>
							<li><a class="dropdown-item <?php echo $ocultar_menu ?>" href="index.php?pag=<?php echo $menu3 ?>">Níveis de Usuários</a></li>
							<li><a class="dropdown-item <?php echo $ocultar_menu ?>" href="index.php?pag=<?php echo $menu6 ?>">Usuários</a></li>
						</ul>
					</li>
					

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="index.php?pag=<?php echo $menu9?>">
							Acompanhar
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="index.php?pag=<?php echo $menu10?>">Acumulado Analítico</a></li>
							<li><a class="dropdown-item" href="index.php?pag=<?php echo $menu13?>">Acumulado Qualidade</a></li>
							<li><a class="dropdown-item" href="index.php?pag=<?php echo $menu12?>">Plataformas</a></li>
							<li><a class="dropdown-item" href="index.php?pag=<?php echo $menu9?>">Projetos</a></li>	
						</ul>
					</li>


					<!--<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Reciclagem Avanço Meta
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="index.php?pag=<?php //echo $menu8?>">Vendas</a></li>
						</ul>
					</li>-->

					<!--<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Evidências
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="index.php?pag=<?php //echo $menu8?>">Vendas</a></li>
						</ul>
					</li>-->


				</ul>
				<div class="d-flex mr-2">
					<img class="img-profile rounded-circle" src="../img/user.jpg" width="40px" height="40px">
					
					<ul class="navbar-nav">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								<?php echo @$nome_usuario; ?>
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalPerfil">Editar Dados</a></li>

								<li><hr class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="../logout.php">Sair</a></li>
							</ul>
						</li>
					</ul>
					
				</div>
			</div>
		</div>
	</nav>







	<div class="container-fluid">
		<?php 		
		require_once($pag.'.php');
		?>
	</div>





</body>
</html>




<!-- Modal -->
<div class="modal fade" id="modalPerfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar Dados</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form-perfil" method="post">
				<div class="modal-body">

					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Nome</label>
						<input type="text" class="form-control" name="nome-usuario" placeholder="Nome" value="<?php echo $nome_usuario ?>">
					</div>

					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Email</label>
						<input type="email" class="form-control" name="email-usuario" placeholder="Email" value="<?php echo $email_usuario ?>">
					</div>

					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Senha</label>
						<input type="text" class="form-control" name="senha-usuario" placeholder="Senha" value="<?php echo $senha_usuario ?>">
					</div>

					<small><div id="mensagem-perfil" align="center"></div></small>

					<input type="hidden" class="form-control" name="id-usuario"  value="<?php echo $id_usuario ?>">


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar-perfil">Fechar</button>
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- Mascaras JS -->
<script type="text/javascript" src="../js/mascaras.js"></script>

<!-- Ajax para funcionar Mascaras JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script> 


<!-- Ajax para inserir ou editar dados -->
<script type="text/javascript">
	$("#form-perfil").submit(function () {
		event.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			url: "editar-perfil.php",
			type: 'POST',
			data: formData,

			success: function (mensagem) {
				$('#mensagem-perfil').removeClass()
				if (mensagem.trim() == "Salvo com Sucesso") {
                    //$('#nome').val('');
                    //$('#cpf').val('');
                    $('#btn-fechar-perfil').click();
                    window.location = "index.php";
                } else {
                	$('#mensagem-perfil').addClass('text-danger')
                }

                $('#mensagem-perfil').text(mensagem)
            },

            cache: false,
            contentType: false,
            processData: false,
            
        });

	});
</script>