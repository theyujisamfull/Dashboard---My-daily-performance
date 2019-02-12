<style> body{background-color:black;} </style>

<body>

<?php   
 /* CAT:Line chart */

 /* pChart library inclusions */
 include("../class/pData.class.php");
 include("../class/pDraw.class.php");
 include("../class/pImage.class.php");

 $data = new pData();  
 $data -> addPoints(array(26.8,26.6,27.5,28,25.6,25.8,28.3),"Bernardo");

 
 $data -> addPoints( array(""),"Bimestre" );
 
 $data -> setAbscissa("Bimestre");
 
 $data -> setAxisName(0,"");
 $myPicture = new pImage(700,230, $data);
 
 
 $myPicture->setFontProperties(array("FontName"=>"../fonts/verdana.ttf", "FontSize"=>9));
 
 
 
 $myPicture->setGraphArea(100,100,200,200);
 $myPicture->drawScale();
 $myPicture->drawLineChart();
 $myPicture->drawPlotChart(array("DisplayValues"=>TRUE , "PlotBorder"=>TRUE));

 
$myfilename = "temp_image.png";      // temp file name


// other image creation code....


$myPicture->Render($myfilename);     // generate image "temp_image.png"
echo "<img src=".$myfilename."> ";   //generate the link

 
 

 
?>



</body>