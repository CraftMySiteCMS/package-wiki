<?php

use CMS\Controller\wiki\wikiController;
use CMS\Router\router;

require_once('Lang/'.getenv("LOCALE").'.php');

/** @var $router router Main router */

$router->scope('/cms-admin', function($router) {
    $router->get('/wiki', "wiki#frontWikiListAdmin");
});


$router->scope('/cms-admin/wiki', function($router) {



});