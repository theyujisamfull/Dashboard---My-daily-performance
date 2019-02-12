<?php include("../../../conexao.php"); ?>
<?php date_default_timezone_set('America/Sao_Paulo');?>
 
 
 <?php include ("minhas_funcoes.php"); ?>
 
 <?php 
 include("pData.class.php");
 include("pDraw.class.php");
 include("pImage.class.php");

 $data = new pData();  
 $data -> addPoints(array(26.8,26.6,27.5,25,25.6,25.8,27.3),"Bernardo");

 
 $data -> addPoints( array("","","","","","",""),"Bimestre" );
 
 $data -> setAbscissa("Bimestre");
 
 $data -> setAxisName(0,"");
 $myPicture = new pImage(400,100, $data,TRUE);
 
 
 
 
 $myPicture->setFontProperties(array("FontName"=>"pchart/fonts/verdana.ttf","FontSize"=>12,"R"=>255,"G"=>255,"B"=>255));

 
 
 $myPicture->drawFilledRectangle(0,0,400,90,array("R"=>64,"G"=>64,"B"=>64,"Surrounding"=>-200,"Alpha"=>70));
 $myPicture->setGraphArea(0,30,390,85);
  
 
 $myPicture->drawText(5,18,"Horarios que dormi",array("R"=>255,"G"=>255,"B"=>255));
 
 $myPicture->drawScale( array("R"=>111,"G"=>111,"B"=>111) );
 $myPicture->drawLineChart();
 
 
 $myPicture->drawPlotChart(array("DisplayValues"=>TRUE , "PlotBorder"=>TRUE, "DisplayColor"=>DISPLAY_AUTO));

 
$myfilename = "temp_image.png";      // temp file name


// other image creation code....


$myPicture->Render($myfilename);     // generate image "temp_image.png"


 ?>
 
 
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<title> Dashboard - Desempenho acadêmico </title><meta charset="utf-8">
		<style> 
		
		
		table{font-size:9px;}
		
		
		body{background-image: url("/Piemos/Documentos/dashboard_background.png");  }

		
		</style>
	</head>
	<body>
		
		<div class='container-fluid'>
			<div class='row'>
				<div class='col-md-2'> <?php include('Tabela_datas_proximas.php');?>	</div>
				<div class='col-md-4'> </div>
				<div class='col-md-3'> <?php include('tabela_horarios_de_sono.php');?>  <?php echo "<img  src=".$myfilename."  class='img-fluid' alt='...' > ";  ?> <?php include('Tabela_skills.php');?>	</div>
				
				<div class='col-md-2'> <?php include('Tabela_rotina.php');?>	</div>
				<div class='col-md-1'> </div>
				
			</div>
			
			
			<div class='row'>
			<div class='col-md-6'> <?php include("Hora_em_porcentagem.php");  ?> </div>
			<div class='col-md-3'> <?php include("Tabela_organizacao.php");  ?> </div>
			<div class='col-md-3'> <?php include("Tabela_tarefas.php");  ?> </div>
			</div>
			<div class='row'>
				<div class='col-md-6'>  </div>
				<div class='col-md-6'> <?php include("Tabela_constancia.php");  ?> </div>
				
				
				
			</div>
		</div>
		
	
	</body>
	
</html>