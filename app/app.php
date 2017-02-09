<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Hangman.php";

    session_start();
    define('JOB_SESSION_KEY', 'hangman_game');
    if (empty($_SESSION[JOB_SESSION_KEY])) {
        $_SESSION[JOB_SESSION_KEY] = array();
    }

    $app = new Silex\Application();

    $app['debug'] = true;

    $app->register(
        new Silex\Provider\TwigServiceProvider(),
        array('twig.path' => __DIR__.'/../views')
    );

    $app->get('/', function() use ($app) {


        return "Welcome to hangman!";
    });

    $app->post('/', function() use ($app) {


        return $app['twig']->render('view_all.html.twig');
    });

    return $app;

?>