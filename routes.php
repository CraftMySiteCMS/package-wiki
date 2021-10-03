<?php

use CMS\Controller\wiki\wikiController;
use CMS\Router\router;

require_once('Lang/'.getenv("LOCALE").'.php');

/** @var $router router Main router */

//Admin pages
$router->scope('/cms-admin', function($router) {
    $router->get('/wiki', "wiki#frontWikiListAdmin");
});


$router->scope('/cms-admin/wiki', function($router) {



//Public pages
$router->scope('/wiki', function ($router){
    $router->get('/', "wiki#frontMainWikiPublic");
});

});