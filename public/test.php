<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
	<!-- Bootstrap -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../dist/jsonpath/jsonpath.min.js"></script>
	<!-- Optional theme 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	-->

	<?php
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods:GET, POST');

	function dameURL(){
		$url="http://".$_SERVER['HTTP_HOST'].'/';
		return $url;
	}

	// Consumiendo mi REST API
	//$data0 = file_get_contents("http://localhost:8080/miApp/public/empleados/getAll");
	//$data0 = file_get_contents(dameURL()."miApp/public/empleados/getAll");
	$url = 'http://rescaterdv.com/public/empleados/getAll';
	$data0 = file_get_contents($url);

	//echo dameURL()."miApp/public/empleados/getAll";

	$data = json_decode($data0, true);

	$emp = json_decode($data);
	?>

	<script type="text/javascript">
		function buscar(event){
			$.ajax({
			   //url: 'http://localhost:8080/miApp/public/empleados/getAll',
			   //url: window.location.protocol + "//" + window.location.host + "/"+'miApp/public/empleados/getAll',
			   url: 'http://rescaterdv.com/public/empleados/getAll',
			   dataType:'json',
			   success: function(data){
			   		correo = $('#txtCorreo').val();
	                obj = JSON.parse(data);

	                var obj2 = JSPath.apply('.id', obj); // Todos los ID
	                obj2 = JSPath.apply('.{.email *== "'+correo+'"}', obj); // Todos los email q contengan
	                //alert(obj2);


	                $('#myTable tbody tr').remove();

	                
	                $.each(obj2, function(i,item){
						//if(this.email.indexOf(correo) > -1){
							$('#myTable tbody').append('<tr><td>'+this.name+'</td><td>'+this.email+'</td><td>'+this.position+'</td><td>'+this.salary+'</td><td><a href="detalle.php?id='+this.id+'">detalle</a> </td></tr>');
						//}
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
    <script src="../dist/js/jquery.min.js"></script>
	<script src="../dist/js/tether.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../dist/js/bootstrap.min.js"></script>


</body>
</html>

