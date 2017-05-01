<?php
// Routes

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods:GET, POST');

$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    //throw new Exception("Error Processing Request", 1);
    

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

/*
// http://localhost:8080/miApp/public/empleados/getAll
$app->get('/empleados/getAll', function ($request, $response, $args) {
    return 'Obteniendo todos los usuarios';
});

// http://localhost:8080/miApp/public/empleados/get/1
$app->get('/empleados/get/{id}', function ($request, $response, $args) {
    return 'Obteniendo los datos del usuario '.$args['id'];
});

// Se testean usando la extensión: Advanced REST client
// http://localhost:8080/miApp/public/empleados/insert
$app->post('/empleados/insert', function ($request, $response, $args) {
    return 'Se registro usuario';
});

// http://localhost:8080/miApp/public/empleados/update
$app->put('/empleados/update', function ($request, $response, $args) {
    return 'Se actualizó usuario';
});

// http://localhost:8080/miApp/public/empleados/delete/1
$app->delete('/empleados/delete/{id}',  function ($request, $response, $args) {
    return 'Borrando los datos del usuario '.$args['id'];
});

// http://localhost:8080/miApp/public/empleados/full
$app->any('/empleados/full',  function ($request, $response, $args) {
    return 'Acceso total ';
});
*/


// GRUPOS
$app->group('/empleados/', function () {
	// http://localhost:8080/miApp/public/empleados/getAll
    $this->get('getAll', function ($request, $response, $args) {
	    /*
	    $usuarios = [
	    				['Nombre'=>'Willy','Apellido'=>'Morales'],
	    				['Nombre'=>'Leydi','Apellido'=>'Altamirano']
	    		];
	    	*/	
	    $usuarios = file_get_contents(__DIR__ . '/../public/employees.json');
	    $url = 'http://rescaterdv.com/public/empleados/getAll';
	    //$usuarios = file_get_contents($url);

	    //$usuarios = json_decode(file_get_contents($url), true);
	    

	    return $response
	    	->withHeader('Content-type', 'application/json')
	    	->write(json_encode($usuarios)
	    		);
	});

	// http://localhost:8080/miApp/public/empleados/get/574daa379545e9af101c2731
	// Usando expresiones regulares
	$this->get('get/{id}', function ($request, $response, $args) {
		$usuarios = file_get_contents(__DIR__ . '/../public/employees.json');
		//$id = $request->getAttribute('id');
		//return $args['id'];

	    return $response
	    	->withHeader('Content-type', 'application/json')
	    	->write(json_encode($usuarios))
	    	->withJSON(
		        ['id' => $args['id']]
		    );
	});

	// Se testean usando la extensión: Advanced REST client
	// http://localhost:8080/miApp/public/empleados/insert
	$this->post('insert', function ($request, $response, $args) {
	    return 'Se registro usuario';
	});

	// http://localhost:8080/miApp/public/empleados/update
	$this->put('update', function ($request, $response, $args) {
	    return 'Se actualizó usuario';
	});

	// http://localhost:8080/miApp/public/empleados/delete/1
	$this->delete('delete/{id}',  function ($request, $response, $args) {
	    return 'Borrando los datos del usuario '.$args['id'];
	});

	// this://localhost:8080/miApp/public/empleados/full
	$this->any('full',  function ($request, $response, $args) {
	    return 'Acceso total ';
	});
})->add( new AutorizacionMiddleware() );;

