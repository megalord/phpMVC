<?php

/*
 * ---------------------------------------------------
 * Initialize application and load configuration
 * ---------------------------------------------------
 */

require_once(corePath.'config.php');

/*
 * ---------------------------------------------------
 * Get routing data from url
 * ---------------------------------------------------
 */

require_once(corePath.'router.php');
$router = new router;
$router->parseUrl();
$controller = $router->controller;
$method = $router->method;
$parameters = $router->parameters;

/*
 * ---------------------------------------------------
 * Check for controller and method
 * Run if successful
 * ---------------------------------------------------
 */

require_once(corePath.'controller.php');
if($router->lookup($controller, $method)){      // valid route
    // controller file is required by lookup function
    $controller = new $controller;
    $controller->$method($parameters);
}else{                                          // invalid (or empty) route
    $view = empty($controller) ? 'home.php' : '404.html';
    $controller = new baseController;
    $controller->loadView($view);
};

?>
