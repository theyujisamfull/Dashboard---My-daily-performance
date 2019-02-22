<table class='table table-striped table-hover table-dark'>
	<thead><tr><th>Prof</th><th>Timer</th><th>Evento</th><th>Data</th><th>Sem</th></tr></thead>
	<?php
	// Puxa os dados do banco de dados e printa a tabela
	$resp = mysqli_query($link,"SELECT * FROM datasproximas ORDER BY timer DESC"); 
	while($dado=$resp->fetch_array()){ echo "
		<tr><td>".$dado['prof']."</td><td>".$dado['timer']."</td><td>".$dado['evento']."</td><td>".$dado['data']."</td><td>".$dado['semana']."</td></tr>
	";} 
	?>
</table>