<table class='table table-bordered table-striped table-sm table-hover '>
	<thead><tr><th>Disciplina</th><th>Ex</th><th>Last</th><th>HAulas</th><th>AEstu</th><th>Bruto</th><th>Tdia</th><th>DiaA</th><th>Hist</th></tr></thead>
	<?php

	
	//Apenda os nomes das colunas no vetor $colunas
	$resp = mysqli_query($link,"SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'id2368944_bmacao17' AND TABLE_NAME = 'quantas_horas_de_estudo_bruto_hoje'  "); 
	$colunas = array(); 
	$aux =0; 
	while($dado=$resp->fetch_array()){ 
		if ($aux >=2 && $aux <=6) { array_push($colunas, $dado['COLUMN_NAME']);} // Pega somente as 5 primeiras colunas, sem contar id e data
		$aux +=1;
	;} 

	
	//Constancia
	$contancia = array();
	$resp = mysqli_query($link,"SELECT * FROM quantas_horas_de_estudo_bruto_hoje WHERE id=2   ");  
	while($dado=$resp->fetch_array()){ 
		foreach ( $colunas as $i ){ 
			array_push($contancia , $dado[$i]);
		}
	}
	//Last
	$last = array();
	$resp = mysqli_query($link,"SELECT * FROM quantas_horas_de_estudo_bruto_hoje WHERE id=-2   ");  
	while($dado=$resp->fetch_array()){ 
		foreach ( $colunas as $i ){ 
			array_push($last , date('z')-$dado[$i]);
		}
	}	
	//Horas aulas
	$horas_aulas = array();
	$resp = mysqli_query($link,"SELECT * FROM quantas_horas_de_estudo_bruto_hoje WHERE id=1   ");  
	while($dado=$resp->fetch_array()){ 
		foreach ( $colunas as $i ){ 
			array_push($horas_aulas , $dado[$i]);
		}
	}	
	//Aula Estudada
	$aula_estudada = array();
	$resp = mysqli_query($link,"SELECT * FROM quantas_horas_de_estudo_bruto_hoje WHERE id=-1   ");  
	while($dado=$resp->fetch_array()){ 
		foreach ( $colunas as $i ){ 
			array_push($aula_estudada , $dado[$i]);
		}
	}
	
	
	//Bruto
	function soma_vetor($a,$b,$c){
		$n = count($a);
		$soma = array();
		for ($i=0;$i<$n;$i++){
			array_push($soma, $a[$i]+$b[$i]+$c[$i] );
		}
		return $soma;
	}
	$bruto = soma_vetor($contancia,$horas_aulas,$aula_estudada);
	
	// quantas_horas_de_estudo_bruto_hoje
	$resp = mysqli_query($link,"SELECT * FROM quantas_horas_de_estudo_bruto_hoje ORDER BY id   ");  
	while($dado=$resp->fetch_array()){ $id=$dado['id']; } 
	
	$resp = mysqli_query($link,"SELECT * FROM quantas_horas_de_estudo_bruto_hoje WHERE id=$id ORDER BY id   ");  
	$horas_brutas_hoje = array();

	while($dado=$resp->fetch_array()){ 
		for ($i=0; $i<=count($colunas) ; $i++ ){ 
			$horas_brutas_hoje[$i] = $dado[$colunas[$i]];		
		}
	;} 
	
	// historico das horas totais estudadas em cada um dos ultimos 7 dias
	$id = $id -7;
	$resp = mysqli_query($link,"SELECT * FROM quantas_horas_de_estudo_bruto_hoje WHERE id>=$id ORDER BY id  DESC ");  
	$historico = array();
	
	$aux=0;
	while($dado=$resp->fetch_array()){ 
		for ($i=0; $i<=count($colunas) ; $i++ ){ 
			$historico[$aux] += $dado[ $colunas[$i] ];
		}
		$aux+=1;
	;} 
	
	
	//Imprimi tabela
	function gera_linha( $colunas ,$contancia ,$last ,$horas_aulas, $aula_estudada ,$bruto , $horas_brutas_hoje , $historico){
		$linha = "";
		for ($i=0 ; $i<count($colunas) ; $i++){
			$linha .= "
			<tr>
				<td class='text-uppercase'>".$colunas[$i]."</td>
				<td>".$contancia[$i]." h</td>
				<td>".$last[$i]." h</td>
				<td>".$horas_aulas[$i]." h</td>
				<td>".$aula_estudada[$i]." h</td>
				<td>".$bruto[$i]." h</td>
				<td>".$horas_brutas_hoje[$i]." h</td>
				<td></td>
				<td>".$historico[$i]." h</td>
			
			";
		}
		
		return $linha;
	}
	
	echo gera_linha( $colunas ,$contancia ,$last ,$horas_aulas , $aula_estudada , $bruto , $horas_brutas_hoje , $historico);
		
	
		
	echo "<tr><td></td><td>".array_sum($contancia)." h</td><td></td><td>".array_sum($horas_aulas)." h</td><td>".array_sum($aula_estudada)." h</td><td>".array_sum($bruto)." h</td><td>".array_sum($horas_brutas_hoje)." h</td><td></td><td></td></tr>";
	
	?>
	
	
	
	
	
	
</table>	


















