<table border='1'>
	<tr><th>Data</th><th>Acordei</th><th>Dormi</th><th>TSono</th></tr>
	<?php
	//Converte a hora no formato Hora:Minuto em string
	function converte_hora($hora_total){
		$min = round(($hora_total-floor($hora_total))*60);
		$hora = $hora_total%24;
		return $hora.":".$min;
	}
	// Puxa os dados do banco de dados e printa a tabela
	$resp = mysqli_query($link,"SELECT * FROM acordado ORDER BY id DESC");  
	while($dado=$resp->fetch_array()){ echo "
		<tr><td>".$dado['data']."</td><td>".converte_hora($dado['acordei'])."</td><td>".converte_hora($dado['dormi'])."</td><td>".converte_hora($dado['tempo_de_sono'])."</td></tr>
	";} 
	?>
</table>