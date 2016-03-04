<?php
	require_once __DIR__.'/../vendor/autoload.php';
	require_once __DIR__."/../src/Brand.php";
	require_once __DIR__."/../src/Store.php";

	$app = new Silex\Application();

	// $app['debug'] = true;

	$app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

	// Setup server for database
	$server = 'mysql:host=localhost;dbname=shoes';
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

	// Gets shoe_store homepage with list of shoe shoe_stores
	$app->get('/shoe_stores', function() use ($app) {
		return $app['twig']->render('shoe_stores.html.twig', array('shoe_stores' => Store::getAll()
	  ));
	});

	// Add store to shoe_stores page
	$app->post("/add_store", function() use ($app) {
		$new_store = new Store($id = null, $_POST['name']);
		$new_store->save();
		return $app['twig']->render('shoe_stores.html.twig', array('shoe_stores' => Store::getAll()
	  ));
	});

	// Get specific store page with brands listed
	$app->get('/store/{id}', function($id) use ($app) {
		$store = Store::find($id);
		return $app['twig']->render('store.html.twig', array('shoe_stores' => $store, 'brands' => $store->getBrands()
	  ));
	});

	$app->post('/store/{id}/add_brand', function($id) use ($app) {
		$store = Store::find($id);
		$new_brand = new Brand($id = null, $_POST['name']);
		$new_brand->save();
		$store->addBrand($new_brand);
		return $app['twig']->render('store.html.twig', array('shoe_stores' => $store, 'brands' => $store->getBrands()
	  ));
	});

	// Delete all stores
	$app->post('/delete_all_stores', function() use ($app) {
		Store::deleteAll();
		return $app['twig']->render('shoe_stores.html.twig', array('shoe_stores' => Store::getAll()
	  ));
	});

	$app->patch("/store/{id}/edit", function($id) use ($app) {
		$store = Store::find($id);
		$store->update($_POST['name']);
		return $app['twig']->render('store.html.twig', array('shoe_stores' => $store, 'brands' => $store->getBrands()
	  ));
    });

	$app->delete("/store/{id}/delete", function($id) use ($app) {
		$store = Store::find($id);
		$store->deleteStore();
		return $app['twig']->render('shoe_stores.html.twig', array('shoe_stores' => Store::getAll()
	  ));
    });

	return $app;
?>
