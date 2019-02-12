<table class='table table-striped table-hover table-sm table-dark'>
	<thead><tr><th>Disciplina</th><th>TDed</th><th>Done</th></tr></thead>
	<?php
	// Puxa os dados do banco de dados e printa a tabela
	$resp = mysqli_query($link,"SELECT * FROM tarefas "); 
	while($dado=$resp->fetch_array()){ echo "
		<tr><td>".$dado['disciplina']."</td><td>".$dado['tempo_dedicado']." h</td><td>".$dado['done']." %</td></tr>	
		";} 
		
	
	
	?>
</table>