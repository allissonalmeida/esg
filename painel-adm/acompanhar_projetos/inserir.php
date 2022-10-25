<?php 
require_once("../../conexao.php");
require_once("campos.php");

//var_dump($_POST);
//exit();

$cp1 = $_POST['Contrato'];
$cp2 = $_POST['Chamado'];
$cp3 = $_POST['Descrição'];
$cp4 = @$_POST['Fornecedor'];
$cp5 = @$_POST['Distribuidor'];
$cp6 = $_POST['Início'];
$cp7 = $_POST['Final'];
$cp8 = $_POST['Total'];
$cp9 = $_POST['Utilizado'];
$cp10 = $_POST['Observação'];
$cp11 = $_POST['Tipo'];

$id = @$_POST['id'];

//VALIDAR CAMPO
$query = $pdo->query("SELECT * FROM $pagina WHERE contrato = '$cp1'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
$id_reg = @$res[0]['id'];
if($total_reg > 0 and $id_reg != $id){
	echo 'Este registro já está cadastrado!!';
	exit();
}

if($id == ""){

	$query = $pdo->prepare("INSERT INTO $pagina SET contrato = :campo1, chamado = :campo2, descricao = :campo3,fornecedor = :campo4, distribuidor = :campo5, data_inicio = :campo6, data_final = :campo7, valor_total = :campo8, valor_utilizado = :campo9, observacao = :campo10, tipo = :campo11");
	//echo $query->queryString;
}else{
	//var_dump($_POST);
	//exit();
	$query = $pdo->prepare("UPDATE $pagina SET contrato = :campo1, chamado = :campo2, descricao = :campo3, fornecedor = :campo4, distribuidor = :campo5, data_inicio = :campo6, data_final = :campo7, valor_total = :campo8, valor_utilizado = :campo9, observacao = :campo10, tipo = :campo11 WHERE id = '$id' ");

}

$query->bindValue(":campo1", "$cp1");
$query->bindValue(":campo2", "$cp2");
$query->bindValue(":campo3", "$cp3");
$query->bindValue(":campo4", "$cp4");
$query->bindValue(":campo5", "$cp5");
$query->bindValue(":campo6", "$cp6");
$query->bindValue(":campo7", "$cp7");
$query->bindValue(":campo8", "$cp8");
$query->bindValue(":campo9", "$cp9");
$query->bindValue(":campo10", "$cp10");
$query->bindValue(":campo11", "$cp11");

$query->execute();

echo 'Salvo com Sucesso';

 ?>