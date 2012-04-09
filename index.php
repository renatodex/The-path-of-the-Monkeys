<?php

//require_once "config.php";
require_once "config-local.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>703 - The path of the Monkeys</title>
<link href="703.css" rel="stylesheet" type="text/css" />
<link href='img/favicon.ico' rel='shortcut icon'/>
<link href='img/favicon.png' rel='shortcut icon'/>
<link href='img/favicon.png' rel='apple-touch-icon'/>
<link href='img/favicon.png' rel='shortcut icon' type='image/x-icon'/>
<!-- jquery-->
<script src="js/jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.scrollTo.js"></script>
<script type="text/javascript" src="js/jquery.scrollTo-min.js"></script>		
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>

<script language="Javascript">
    if(navigator.appName.indexOf('Internet Explorer')>0){
  	alert("Atualize-se!\nEsse site pode n&atilde;o funcionar corretamente no Internet Explorer 6 e 7 INTENCIONALMENTE!");
    }
</script>

</head>
<body>
<div id="main">
    <div class="contend" id="intro">
   		<div id="contend-intro">
            <img src="img/703-logo.png" width="333" height="188" alt="703 - the path of the monkeys" />
            <a href="#primeiro-grupo" title="Play" class="play">Play</a>
        </div>
    </div>
    
    <?
	
	$query_nome = "SELECT `nome` FROM `chrono` ORDER by `id` ASC";
	$teste = mysql_query( $query_nome );
	
	$id_arr = array();
	
	while ($colun = mysql_fetch_array($teste)) {
	 
	 $id_arr[] = $colun["nome"];
	 
	}
		
	$query = "SELECT * FROM `chrono` ORDER by `id` ASC";
	$test = mysql_query( $query );
	
	while ($coluna = mysql_fetch_array($test)) { 
	 
	 $conteudo = '<div class="contend" id="'.$coluna["nome"].'">';
	 $conteudo .= '<ul><li style="width:'.$coluna["wl"].'px; background:url(img/step'.$coluna["id"].'/'.$coluna["left"].'.jpg) no-repeat center right;"></li>';
	 $conteudo .= '<li class="main" style="width:'.$coluna["wm"].'px; background:url(img/step'.$coluna["id"].'/703-'.$coluna["main"].'.jpg) no-repeat center center;">'.$coluna["titulo"].'</li>';
	 
	 $conteudo .= '<li style="width:'.$coluna["wr"].'px; background:url(img/step'.$coluna["id"].'/'.$coluna["right"].'.jpg) no-repeat left center;"></li></ul>';
	 
	 $conteudo .= '<div class="desc">
            <h1>'.$coluna["titulo"].'</h1>
            <span>---------------------------</span>
            <p>'.$coluna["desc"].'</p>
        	<a href="#'.$id_arr[$coluna["id"]].'" title="Continue" class="play">Continue...</a>
        </div>
	</div>';
	
	echo $conteudo;
	 
	} ?>

    <div id="rodape">
    	<p id="copy">© Copyright 2012 - <strong>703 - The path of the Monkeys</strong></p>
    	<p id="credito"><span>WEB </span>• Pipo Bizelli • Renatodex<strong>  | </strong><span>Desenhos </span>• LoboX</p>
    </div>
</div>
<script>
$(document).ready(function(){
	//LARGURA-------------------------->
	$largura = $(window).width()/2;
	
	$largTotal = 0;
	$("div.contend").each(function(){
		$largTotal += $(this).width();
    });
	
	$("#main").css("width", $largTotal);
	$("#main").css("margin-left", $largura - 477);
	
	//ALTURA--------------------------->
	$altura = $(window).height();
	
	$("#main").css("height", $altura);
	$("#main div.contend").css("height", $("#main").height() - 45);
	$("#main div.contend ul li").css("height", $("div.contend").height());
	$("#rodape").css("margin-top", $("#main").height() - 45);
});

$(window).resize(function(){
	$largura = $(window).width()/2;
	$("#main").css("margin-left", $largura - 477);
	
	$altura = $(window).height();
	$("#main").css("height", $altura);
	$("#main div.contend").css("height", $("#main").height() - 45);
	$("#main div.contend ul li").css("height", $(".contend").height());
	$("#rodape").css("margin-top", $altura-45);
});

$(function() {
	$('a.play').bind('click',function(event){
		var $anchor = $(this);

		var $elemento = $($anchor.attr('href')+' ul li.main');
		var $v1 = $(window).width()/2;
		var $v2 = ($elemento.width()/2);
		var $desconto = $v1 - $v2 - 100;
		
		$(window).scrollTo($elemento, 1500, {offset:-$desconto});
		
	});
});
</script>
</body>
</html>