<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/login', 'LoginController@signin');
$router->post('/login', 'LoginController@signinAction');
$router->get('/logout', 'LoginController@logout');

$router->get('/signup', 'LoginController@signup');
$router->post('/signup', 'LoginController@signupAction');

$router->get('/profile', 'HomeController@profile' );
// $router->get('/search');
$router->get('/photos', 'PhotoController@index');

$router->post('/post/new', 'PostController@store');