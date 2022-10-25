<?php 
require_once("../../conexao.php");
require_once("campos.php");
$id = @$_POST['id-excluir'];

$pdo->query("DELETE from $tabela where id = '$id'");
echo 'Excluído com Sucesso';

 ?>