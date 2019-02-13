

<?php 

$resp = mysqli_query($link,"SELECT * FROM datasproximas ORDER BY timer"); 
$professores = array();
$eventos = array();
while($dado=$resp->fetch_array()){ 

	array_push($professores , $dado['prof']);
	array_push($eventos , $dado['evento']);

}	 


function gera_input_select($vetor){
	
	$linha = "<select type='text' class='form-control'>";	
	foreach($vetor as $i){
		$linha .= "<option>".$i."</option>";
	}		
	$linha .= "</select>";
	echo $linha;
}


?>

<table id='form_comp'>




<h6> Adicionar compromisso </h6>
<form  >	
	<tr>
		<td> <?php gera_input_select($professores);  ?> </td>
	
		<td><input type='date' class='form-control' ></td>
	
		<td><input type='text' class='form-control' value='Evento'></td>
		
		<td><button class='btn  btn-primary'> Add </button></td>
	</tr>
	
	<tr>
	<td colspan='3'><?php gera_input_select($eventos);  ?></td>
	<td><button class='btn btn-danger'> Delete </button></td>
	</tr>	

</form>


</table>





