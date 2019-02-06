<?php include("../../conexao.php"); ?>
<?php date_default_timezone_set('America/Sao_Paulo');?>
 
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<title> Dashboard - Desempenho acadêmico </title><meta charset="utf-8">
		<style> 
	  
		</style>
	</head>
	<body>
		
		<div class='container'>
			<div class='row'>
				<div class='col-md-9'> <?php include('tabela_horarios_de_sono.php');?>	</div>
				<div class='col-md-3'>
				
				</div>
			</div>
		</div>
		
	
	</body>
	
</html>