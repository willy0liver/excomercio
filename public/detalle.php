<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
	<!-- Bootstrap -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../dist/jsonpath/jsonpath.min.js"></script>

	<?php

	// Consumiendo mi REST API
	//$data0 = file_get_contents("http://localhost:8080/miApp/public/empleados/getAll");
	//$data0 = file_get_contents(dameURL()."miApp/public/empleados/getAll");
	$url = 'http://rescaterdv.com/public/empleados/getAll';
	$data0 = file_get_contents($url);
	$data = json_decode($data0, true);

	$emp = json_decode($data);

	$name;
	$email;
	$phone;
	$address;
	$position;
	$salary;
	$skills;

	foreach ($emp as $valor) {
		if($valor->id == $_GET['id']){
			$name = $valor->name;
			$email = $valor->email;
			$phone = $valor->phone;
			$address = $valor->address;
			$position = $valor->position;
			$salary = $valor->salary;
			$band = 0;
			foreach ($valor->skills as $val) {
				if($band == 0){
					$skills = $val->skill;
				}else{
					$skills = $skills .', '. $val->skill;
				}
				$band = 1;
			}
		}
	}

	?>

</head>
<body>
	<div class="container">
		<div class="row">
		<a href="test.php">Regresar</a>
		</div>
		<div class="row">
			<h4>Datos del empleado</h4>
		</div>
		<div class="form-group row">
		  <label for="example-text-input" class="col-2 col-form-label"><strong>Name</strong></label>
		  <label for="example-text-input" class="col-10 col-form-label"><?php echo $name ?></label>
		</div>
		<div class="form-group row">
		  <label for="example-text-input" class="col-2 col-form-label"><strong>email</strong></label>
		  <label for="example-text-input" class="col-10 col-form-label"><?php echo $email ?></label>
		</div>
		<div class="form-group row">
		  <label for="example-text-input" class="col-2 col-form-label"><strong>phone</strong></label>
		  <label for="example-text-input" class="col-10 col-form-label"><?php echo $phone ?></label>
		</div>
		<div class="form-group row">
		  <label for="example-text-input" class="col-2 col-form-label"><strong>address</strong></label>
		  <label for="example-text-input" class="col-10 col-form-label"><?php echo $address ?></label>
		</div>
		<div class="form-group row">
		  <label for="example-text-input" class="col-2 col-form-label"><strong>salary</strong></label>
		  <label for="example-text-input" class="col-10 col-form-label"><?php echo $salary ?></label>
		</div>
		<div class="form-group row">
		  <label for="example-text-input" class="col-2 col-form-label"><strong>skills</strong></label>
		  <label for="example-text-input" class="col-10 col-form-label"><?php echo $skills ?></label>
		</div>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../dist/js/jquery.min.js"></script>
	<script src="../dist/js/tether.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../dist/js/bootstrap.min.js"></script>
</body>
</html>

