


<?php
	$resp = mysqli_query($link,"SELECT * FROM acordado ORDER BY id   ");  
	while($dado=$resp->fetch_array()){ $acordei=$dado['acordei']; $dormir=$dado['dormi']; } 

	$hora_que_durmo = 25.5;
	$quantas_horas_tem_o_dia = $hora_que_durmo - $acordei;
	$hora_atual = date('H')+date('i')/60;
	
	if( $dormi==0 && $hora_atual<10){ $hora_atual += 24; } 
	
	$hora_em_porcentagem = 1 - ($hora_que_durmo - $hora_atual)/$quantas_horas_tem_o_dia;
	
	$hora_em_porcentagem = round($hora_em_porcentagem*100,1);
	echo "<h1 class='text-white text-center'>".$hora_em_porcentagem."%</h1>";
	
	?>




