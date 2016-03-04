<?php
	require_once __DIR__.'/../vendor/autoload.php';
	require_once __DIR__."/../src/Brand.php";
	require_once __DIR__."/../src/Store.php";

	$app = new Silex\Application();

	// $app['debug'] = true;

	$app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

	// Setup server for database
	$server = 'mysql:host=localhost;dbname=library';
	$username = 'root';
	$password = 'root';
	$DB = new PDO($server, $username, $password);

	// Allow patch and delete request to be handled by browser
	use Symfony\Component\HttpFoundation\Request;
	Request::enableHttpMethodParameterOverride();

	// Gets homepage
	$app->get('/', function() use ($app) {
		return $app['twig']->render('index.html.twig');
	});

	return $app;
?>
