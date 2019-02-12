<table class='table table-striped table-hover table-sm table-dark'>
	
	<?php
	
	
	//Apenda os nomes das colunas no vetor $colunas
	$resp = mysqli_query($link,"SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'id2368944_bmacao17' AND TABLE_NAME = 'organization'  "); 
	$colunas = array(); 
	$aux =0; 
	while($dado=$resp->fetch_array()){ 
		if($aux>=1 && $aux<=7){array_push($colunas, $dado['COLUMN_NAME']);}
		$aux +=1;
	;} 

	
	
	// Puxa os dados do banco de dados e printa a tabela
	$resp = mysqli_query($link,"SELECT * FROM organization "); 
	
	function gera_linha_vetor($vetor , $text){
		
		$linha = "<tr>";
		foreach($vetor as $i){
			$linha .=   "<td class='".$text."'>".$i."</td>"  ;
		} 
		$linha .=  "</tr>" ;
		
		echo $linha;
	}
	
	gera_linha_vetor($colunas , 'text-capitalize');
	while($dado=$resp->fetch_array()){ 
		$last = array();
		foreach($colunas as $i){
			array_push($last , (date('z')-$dado[$i]) );
		} 
		gera_linha_vetor($last , 'text-capitalize');
	}
		
		
		
	
	
	
	
	?>
</table>