<?php 

require_once("../../conexao.php");
require_once("campos.php");


$id = @$_POST['id'];
$cp1 = @$_POST[$campo1];
$cp2 = @$_POST[$campo2];
//$cp3 = @$_POST[$campo3];
$cp4 = @$_POST[$campo4];

$cp5 = @$_POST[$campo5];
$cp6 = @$_POST[$campo6];
$cp7 = @$_POST[$campo7];
$cp8 = @$_POST[$campo8];
$cp9 = @$_POST[$campo9];
$cp10 = @$_POST[$campo10];
$cp11 = @$_POST[$campo11];
$cp12 = @$_POST[$campo12];
$cp13 = @$_POST[$campo13];
$cp14 = @$_POST[$campo14];
$cp15 = @$_POST[$campo15];
$cp16 = @$_POST[$campo16];

$cp17 = $_POST[$campo17];
$cp18 = $_POST[$campo18];
$cp19 = $_POST[$campo19];
$cp20 = $_POST[$campo20];
$cp21 = $_POST[$campo21];
$cp22 = $_POST[$campo22];
$cp23 = $_POST[$campo23];
$cp24 = $_POST[$campo24];
$cp25 = $_POST[$campo25];
$cp26 = $_POST[$campo26];
$cp27 = $_POST[$campo27];
$cp28 = $_POST[$campo28];


//VALIDAR CAMPO
$query = $pdo->query("SELECT * FROM $tabela WHERE id_projeto = '$cp2' and id_indicador = '$cp1' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
$id_reg = @$res[0]['id'];
$id_projeto = @$res[0]['id_projeto'];

if($total_reg > 0 and $id_reg != $id){
	echo 'Este registro já está cadastrado!!';
	exit();

}else{

	//Get data for table projects
	$query2 = $pdo->prepare("SELECT a.*,b.* FROM projetos a LEFT JOIN distribuidores b ON (a.id_distribuidor = b.id) WHERE a.id = $cp2 ");

	$query2->execute();

	while ($res2 = $query2->fetch(PDO::FETCH_ASSOC)) { 

		$id_proj = $res2['id'];
		$cp3 = $res2['id_distribuidor'];
		$cp29 = $res2['id_fornecedor'];
		$cp30 = $res2['id_plataforma'];
				
	}
	
}


if($id == ""){

	$query = $pdo->prepare("INSERT INTO $tabela SET id_indicador = :campo1,id_projeto = :campo2, id_distribuidor = :campo3, ano = :campo4, id_fornecedor = :campo29,  id_plataforma = :campo30, jan_meta = :campo5, fev_meta = :campo6, mar_meta = :campo7, abr_meta = :campo8, mai_meta = :campo9, jun_meta = :campo10, jul_meta = :campo11, ago_meta = :campo12, set_meta = :campo13, out_meta = :campo14, nov_meta = :campo15, dez_meta = :campo16, jan_realizado = :campo17, fev_realizado = :campo18, mar_realizado = :campo19, abr_realizado = :campo20, mai_realizado = :campo21, jun_realizado = :campo22, jul_realizado = :campo23, ago_realizado = :campo24, set_realizado = :campo25, out_realizado = :campo26, nov_realizado = :campo27, dez_realizado = :campo28");

}else{

	$query = $pdo->prepare("UPDATE $tabela SET id_indicador = :campo1,id_projeto = :campo2, id_distribuidor = :campo3, ano = :campo4, id_fornecedor = :campo29,  id_plataforma = :campo30, jan_meta = :campo5, fev_meta = :campo6, mar_meta = :campo7, abr_meta = :campo8, mai_meta = :campo9, jun_meta = :campo10, jul_meta = :campo11, ago_meta = :campo12, set_meta = :campo13, out_meta = :campo14, nov_meta = :campo15, dez_meta = :campo16, jan_realizado = :campo17, fev_realizado = :campo18, mar_realizado = :campo19, abr_realizado = :campo20, mai_realizado = :campo21, jun_realizado = :campo22, jul_realizado = :campo23, ago_realizado = :campo24, set_realizado = :campo25, out_realizado = :campo26, nov_realizado = :campo27, dez_realizado = :campo28 WHERE id = '$id'");
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
$query->bindValue(":campo12", "$cp12");
$query->bindValue(":campo13", "$cp13");
$query->bindValue(":campo14", "$cp14");
$query->bindValue(":campo15", "$cp15");
$query->bindValue(":campo16", "$cp16");

$query->bindValue(":campo17", "$cp17");
$query->bindValue(":campo18", "$cp18");
$query->bindValue(":campo19", "$cp19");
$query->bindValue(":campo20", "$cp20");
$query->bindValue(":campo21", "$cp21");
$query->bindValue(":campo22", "$cp22");
$query->bindValue(":campo23", "$cp23");
$query->bindValue(":campo24", "$cp24");
$query->bindValue(":campo25", "$cp25");
$query->bindValue(":campo26", "$cp26");
$query->bindValue(":campo27", "$cp27");
$query->bindValue(":campo28", "$cp28");


$query->bindValue(":campo29", "$cp29");
$query->bindValue(":campo30", "$cp30");


$query->execute();

echo 'Salvo com Sucesso';

?>