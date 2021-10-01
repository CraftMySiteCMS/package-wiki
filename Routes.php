<?php

use CMS\Controller\wiki\wikiController;

require_once('Lang/'.getenv("LOCALE").'.php');

$router->scope('/cms-admin', function($router) {
    $router->get('/wiki', "wiki#frontWikiListAdmin");
});


$router->scope('/cms-admin/wiki', function($router) {



});