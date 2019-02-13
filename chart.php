 <?php 
 include("pchart/class/pData.class.php");
 include("pchart/class/pDraw.class.php");
 include("pchart/class/pImage.class.php");


$resp = mysqli_query($link,"SELECT * FROM acordado ORDER BY id   ");  
while($dado=$resp->fetch_array()){ $id=$dado['id']; } 

function modulo_float($dividendo,$divisor){
	$int = floor($dividendo);
	$dec = $dividendo - $int;
	return (($dividendo-$dec)%$divisor) + $dec ; 
}

$lista_horarios_que_dormi = array();
$resp = mysqli_query($link,"SELECT * FROM acordado WHERE id >= ($id-7) && id<$id  ORDER BY id ");  
while($dado=$resp->fetch_array()){ 
	array_push( $lista_horarios_que_dormi , modulo_float($dado['dormi'],24) );
}  
 
 $data = new pData();  
 $data -> addPoints( $lista_horarios_que_dormi ,"Bernardo");

 
 $data -> addPoints( array("","","","","","",""),"Bimestre" );
 
 $data -> setAbscissa("Bimestre");
 
 $data -> setAxisName(0,"");
 $myPicture = new pImage(400,130, $data,TRUE);
 
 
 
 
 $myPicture->setFontProperties(array("FontName"=>"pchart/fonts/verdana.ttf","FontSize"=>12,"R"=>255,"G"=>255,"B"=>255));

 
 
 $myPicture->drawFilledRectangle(0,0,400,120,array("R"=>64,"G"=>64,"B"=>64,"Surrounding"=>-200,"Alpha"=>70));
 $myPicture->setGraphArea(0,30,390,115);
  
 
 $myPicture->drawText(5,18,"Horarios que dormi",array("R"=>255,"G"=>255,"B"=>255));
 
 $myPicture->drawScale( array("R"=>111,"G"=>111,"B"=>111) );
 $myPicture->drawLineChart();
 
 
 $myPicture->drawPlotChart(array("DisplayValues"=>TRUE , "PlotBorder"=>TRUE, "DisplayColor"=>DISPLAY_AUTO));

 
$myfilename = "temp_image.png";      // temp file name


// other image creation code....


$myPicture->Render($myfilename);     // generate image "temp_image.png"


 ?>
 