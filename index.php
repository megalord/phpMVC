<?php

/* 
 * ----------------------------------------------
 * A PHP MVC-like framework for web applications
 * 
 * author: Jordan Griege
 * revision: 2013/04/01
 * ----------------------------------------------
 */

/*
 * ----------------------------------------------
 * Define environment
 *  select either 'live' or 'test'
 *-----------------------------------------------
 */

define('environment', 'test');

/*
 * ----------------------------------------------
 * Set path constants
 * ----------------------------------------------
 */

define('rootPath', dirname(__FILE__));
define('applicationPath', dirname(__FILE__).'/application/');
define('corePath', dirname(__FILE__).'/application/core/');

/* ----------------------------------------------
 * Initialize application chain
 * ----------------------------------------------
 */

require_once(corePath.'app.php');

?>