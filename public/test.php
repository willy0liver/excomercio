<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
	<!-- Bootstrap -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<?php


	// Consumiendo mi REST API
	$data0 = file_get_contents("http://localhost:8080/miApp/public/empleados/getAll");
	$data = json_decode($data0, true);

	$emp = json_decode($data);
	?>

	<script type="text/javascript">
		function buscar(event){
			$.ajax({
			   url: 'http://localhost:8080/miApp/public/empleados/getAll',
			   dataType:'json',
			   success: function(data){
	                obj = JSON.parse(data);
	                $('#myTable tbody tr').remove();

	                correo = $('#txtCorreo').val();
	                $.each(obj, function(i,item){
						if(this.email.indexOf(correo) > -1){
							$('#myTable tbody').append('<tr><td>'+this.name+'</td><td>'+this.email+'</td><td>'+this.position+'</td><td>'+this.salary+'</td><td><a href="detalle.php?id='+this.id+'">detalle</a> </td></tr>');
						}
					})
	                return false;

			   },
	            error: function (xhr, status, error) {
                   var err = eval("(" + xhr.responseText + ")");
                   alert(err.Message);
                }
			});	
		}
	</script>

</head>
<body>
	<div class="container">
		<div class="row">
		<h1>Lista de empleados</h1>	
		<input type="text" id='txtCorreo' class="form-control" placeholder="Buscar por email" onkeypress="return buscar(event);">
		<table id='myTable' class='table'>
			<thead>
				<td>Name</td><td>email</td><td>position</td><td>salary</td><td>Detalle</td>
			</thead>
			<tbody>

			<?php

				foreach ($emp as $valor) {
					echo '<tr><td>'.$valor->name.'</td><td>'.$valor->email.'</td><td>'.$valor->position.'</td><td>'.$valor->salary.'</td><td><a href="detalle.php?id='.$valor->id.'">detalle</a> </td></tr>';
				}
			?>
			</tbody>
		</table>
		</div>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../dist/js/bootstrap.min.js"></script>
</body>
</html>

