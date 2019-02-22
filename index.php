<?php include("../../../conexao.php"); ?>
<?php date_default_timezone_set('America/Sao_Paulo');?>
 
 
 <?php include ("minhas_funcoes.php"); ?>
 
 <?php include ("chart.php"); ?>
  
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<title> Dashboard - Desempenho acadêmico </title><meta charset="utf-8">
		<style> 
		
		
		table{font-size:10px;}
		
		
		body{background-image: url("/Piemos/Documentos/dashboard_background.png");  }

		
		</style>
	</head>
	<body>
		
		<div class='container-fluid'>
			<div class='row'>
				<div class='col-md-2'> <?php include('Tabela_datas_proximas.php');?>	</div>
				<div class='col-md-4'> </div>
				<div class='col-md-3'> 
					<?php include('Tabela_horarios_de_sono.php');?>  
					<?php echo "<img  src=".$myfilename."  class='img-fluid'  > ";  ?> 
					<?php include('Tabela_skills.php');?>	
					<?php include("Tabela_organizacao.php");  ?>
				</div>
				
				<div class='col-md-3'> <?php include('Tabela_rotina.php');?> <?php include("Tabela_tarefas.php");  ?> 	</div>
				
				
			</div>
			
			
			<div class='row'>
				<div class='col-md-6'> <?php include("Hora_em_porcentagem.php");  ?> </div>
				<div class='col-md-6'> <?php include("Tabela_constancia.php");  ?> </div>
				
				
				
			</div>
		</div>
		
	
	</body>
	
</html>