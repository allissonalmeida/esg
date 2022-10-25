<?php 
require_once("../conexao.php");
require_once("verificar_adm_acesso.php");
$pagina = 'acompanhar_plataformas';

require_once($pagina."/campos.php");

?>

<div class="row">

	<div class="col-md-12 my-3">
		
		<h4 class="lead">
			<b>
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M13.22 19.03a.75.75 0 001.06 0l6.25-6.25a.75.75 0 000-1.06l-6.25-6.25a.75.75 0 10-1.06 1.06l4.97 4.97H3.75a.75.75 0 000 1.5h14.44l-4.97 4.97a.75.75 0 000 1.06z"></path></svg>
		</a>Acompanhar Plataformas</b> 
		</h4>

	</div>

</div>


<div class="row">

    <div class="col">

        <ol class="list-group list-group-numbered">
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                <div class="fw-bold"><a  href="index.php?pag=pla_reciclagem">E+ Reciclagem</a></div>
                
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                <div class="fw-bold"><a  href="index.php?pag=pla_geladeira_nova">E+ Geladeira Nova</a></div>
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                <div class="fw-bold"><a  href="index.php?pag=pla_educacao">E+ Educação</a></div>
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                <div class="fw"><a  href="index.php?pag=pla_energia_do_bem">E+ Energia do Bem</a></div>
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                <div class="fw-bold"><a  href="index.php?pag=pla_profissional">E+ Profissional</a></div>
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                <div class="fw-bold"><a  href="index.php?pag=pla_luzes_na_cidade">E+ Luzas na Cidade</a></div>
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                <div class="fw-bold"><a  href="index.php?pag=pla_troca_de_lampadas">E+ Troca de Lâmpadas</a></div>
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
            </li>
        </ol>
        
    </div>
</div>

 
       
 
<script type="text/javascript">var pag = "<?=$pagina?>"</script>
<script src="../js/ajax.js"></script>




