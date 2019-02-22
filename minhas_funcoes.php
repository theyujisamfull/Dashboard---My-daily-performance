


<?php 


function imprimir($x){

	foreach($x as $i){
		
		echo $i."<br>";
	}

}




function sql_array($string){
	
	//A string no bd vem na forma (1,2,3). Então percorro a string pego a posição das vírgulas 
	//Assim posso criar o array (1,2,3)
	$posicoes_das_virgulas = array(0);
	$tamanho_da_string = 0;
	$i=0;
	while (true) {
		$i+=1;
		if ( $string[$i] == ',' ){ array_push($posicoes_das_virgulas, $i); }
		if( $string[$i] == ')' ) { 
			array_push($posicoes_das_virgulas, $i);
			$tamanho_da_string = $i+1;		
			break; 
		}
	}
	
	$array = array();
	$aux=0;
	$quantidade_de_virgulas = count($posicoes_das_virgulas) - 2;
	while ($aux <= $quantidade_de_virgulas) {
			$comprimento_do_numero = $posicoes_das_virgulas[$aux + 1] - $posicoes_das_virgulas[$aux] -1 ;
			array_push( $array , substr( $string , $posicoes_das_virgulas[$aux]+1 , $comprimento_do_numero) );
		$aux += 1;
	}
	return ( $array ); 
	
	
}




?>