<?php

use CMS\Controller\wiki\wikiController;
use CMS\Router\router;

require_once('Lang/'.getenv("LOCALE").'.php');

/** @var $router router Main router */

//Admin pages
$router->scope('/cms-admin', function($router) {
    $router->get('/wiki/list', "wiki#frontWikiListAdmin");

    $router->get('/wiki/add/categorie', "wiki#wikiAddCategorie");
    $router->post('/wiki/add/categorie', "wiki#wikiAddCategoriePost");

    $router->get('/wiki/add/article', "wiki#wikiAddArticle");
    $router->post('/wiki/add/article', "wiki#wikiAddArticlePost");




});


$router->scope('/cms-admin/wiki/list', function($router) {



//Public pages
$router->scope('/wiki', function ($router){
    $router->get('/', "wiki#frontMainWikiPublic");
});

});