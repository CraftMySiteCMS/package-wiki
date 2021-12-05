<?php

use CMS\Controller\wiki\wikiController;
use CMS\Router\router;

require_once('Lang/'.getenv("LOCALE").'.php');

/** @var $router router Main router */

//Admin pages
$router->scope('/cms-admin/wiki', function($router) {
    $router->get('/list', "wiki#frontWikiListAdmin");

    $router->get('/add/categorie', "wiki#addCategorie");
    $router->post('/add/categorie', "wiki#addCategoriePost");

    $router->get('/add/article', "wiki#addArticle");
    $router->post('/add/article', "wiki#addArticlePost");

    $router->get('/edit/categorie/:id', function($id) {
        (new wikiController)->editCategorie($id);
    })->with('id', '[0-9]+');
    $router->post('/edit/categorie/:id', function($id) {
        (new wikiController)->editCategoriePost($id);
    })->with('id', '[0-9]+');

    $router->get('/edit/article/:id', function($id) {
        (new wikiController)->editArticle($id);
    })->with('id', '[0-9]+');
    $router->post('/edit/article/:id', function($id) {
        (new wikiController)->editArticlePost($id);
    })->with('id', '[0-9]+');

    $router->get('/delete/article/:id', function($id) {
        (new wikiController)->deleteArticle($id);
    })->with('id', '[0-9]+');
    $router->get('/delete/categorie/:id', function($id) {
        (new wikiController)->deleteCategorie($id);
    })->with('id', '[0-9]+');

    $router->get('/define/categorie/:id', function($id) {
        (new wikiController)->defineCategorie($id);
    })->with('id', '[0-9]+');
    $router->get('/define/article/:id', function($id) {
        (new wikiController)->defineArticle($id);
    })->with('id', '[0-9]+');

});


$router->scope('/cms-admin/wiki/list', function($router) {



//Public pages
$router->scope('/wiki', function ($router){
    //get all categories
    $router->get('/', "wiki#publicMain");


    $router->get('/:slug', function($slug) {
        (new wikiController)->publicShowArticle($slug);
    })->with('slug', '.*?');

});

});