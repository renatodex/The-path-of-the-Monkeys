<?php
//arquivo de configuração
	$host	= "localhost";
	$user	= "root";
	$pass	= ""; 
	$banco	= "703_db";    

// CONEXAO COM O BANCO DE DADOS
	mysql_connect("$host", "$user", "$pass");
	mysql_select_db("$banco");

?>
