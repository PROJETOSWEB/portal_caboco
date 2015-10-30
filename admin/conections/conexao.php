<?php
error_reporting(0);

//COLOCANDO A VARIAVEL COMO VERDADEIRA - CAI NO PRIMEIRO IF. INFORMACOES DO SERVIDOR LOCAL.
$status = false;

if ($status) {    
    $conexao = mysql_connect("localhost", "root", "") or die("Erro na conexao!");
    $db = mysql_select_db("admin_caboco", $conexao) or die("Erro ao selecionar banco de dados!");
} else {
    $conexao = mysql_connect('admin-caboco.mysql.uhserver.com', 'caboco', 'maneschy25@') or die(mysql_error());
    $db = mysql_select_db('admin_caboco', $conexao);
}

mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

?>
