<?php  

require __DIR__ . '/vendor/autoload.php';
date_default_timezone_set('America/Chicago');

// $log = new Monolog\Logger('name');
// $log->pushHandler(new Monolog\Handler\StreamHandler('app.txt', Monolog\Logger::WARNING));
// $log->addWarning('Foo');

$app = new \Slim\Slim(array(
	//This line includes slimviews
	'view' => new \Slim\Views\Twig()
));

//Twig
$view = $app->view();
$view->parserOptions = array(
    'debug' => true
    //'cache' => dirname(__FILE__) . '/cache'
);
//This adds the parser helpers
$view->parserExtensions = array(
    new \Slim\Views\TwigExtension(),
);

//Basic Route
// $app->get('/hello/:name', function ($name) {
//     echo "Hello, " . $name;
// });

//get root, use the app object, render about.twig 
$app->get('/', function() use($app){
	$app->render('about.twig');
   //name route for site links, remember to add {{ special }}
})->name('home');

$app->get('/contact', function() use($app){
	$app->render('contact.twig');
})->name('contact');

$app->get('/login', function() use($app){
	$app->render('login.twig');
})->name('login');

$app->get('/register', function() use($app){
	$app->render('register.twig');
})->name('register');

//Run the application
$app->run();
