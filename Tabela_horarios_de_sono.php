<table class='table table-bordered table-striped table-sm table-hover '>
	<thead><tr><th>Data</th><th>Acordei</th><th>Dormi</th><th>TSono</th></tr></thead>
	<?php
	//Converte a hora no formato Hora:Minuto em string
	function converte_hora($hora_total){
		$min = round(($hora_total-floor($hora_total))*60);
		$hora = $hora_total%24;
		return $hora.":".$min;
	}
	$p = 11;
	// Puxa os dados do banco de dados e printa a tabela com os ultimos 8 registros
	$resp = mysqli_query($link,"SELECT * FROM acordado ORDER BY id   ");  
	while($dado=$resp->fetch_array()){ $id=$dado['id']-7; } 
	
	$resp = mysqli_query($link,"SELECT * FROM acordado WHERE id>=$id ORDER BY id DESC  ");  
	while($dado=$resp->fetch_array()){ echo "
		<tr><td>".$dado['data']."</td><td>".converte_hora($dado['acordei'])."</td><td>".converte_hora($dado['dormi'])."</td><td>".converte_hora($dado['tempo_de_sono'])."</td></tr>
	";} 
	?>
</table>