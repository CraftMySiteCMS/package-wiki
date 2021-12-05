<?php
namespace CMS\Controller\Wiki;

use CMS\Controller\coreController;
use CMS\Controller\Menus\menusController;
use CMS\Controller\users\usersController;
use CMS\Model\wiki\wikiCategoriesModel;
use CMS\Model\wiki\wikiArticlesModel;
use CMS\Model\users\usersModel;
use CMS\Model\Menus\menusModel;


/**
 * Class: @wikiController
 * @package wiki
 * @author Teyir | CraftMySite <contact@craftmysite.fr>
 * @version 1.0
 */

class wikiController extends coreController
{

    public static string $themePath;

    public function __construct($themePath = null)
    {
        parent::__construct($themePath);
    }

    public function frontWikiListAdmin() {
        $articles = new wikiArticlesModel();

        $categories = new wikiCategoriesModel();

        //Get all undefined articles
        $undefinedArticles = $articles->getUndefinedArticles();

        $undefinedCategories = $categories->getUndefinedCategories();

        $getAllCategories = $categories->getAllCategories();

        //Include the view file ("views/list.admin.view.php").
        view('wiki', 'list.admin', ["articles" => $articles, "categories" => $categories ,
                                    "undefinedArticles" => $undefinedArticles, "undefinedCategories" => $undefinedCategories,
                                    "getAllCategories" => $getAllCategories], 'admin');
    }

    public function addCategorie(){
        usersController::isAdminLogged();

        view('wiki', 'addCategorie.admin', [], 'admin');
    }


    public function addCategoriePost(){
        usersController::isAdminLogged();

        $categories = new wikiCategoriesModel();

        $categories->name = filter_input(INPUT_POST, "name");
        $categories->description = filter_input(INPUT_POST, "description");
        $categories->icon = filter_input(INPUT_POST, "icon");

        $categories->slug = $categories->cleanString(filter_input(INPUT_POST, "slug"));;


        $categories->create();
        header("location: ../list");
    }

    public function addArticle(){
        usersController::isAdminLogged();

        $articles = new wikiArticlesModel();

        $categories = new wikiCategoriesModel();
        $categories = $categories->fetchAll();

        view('wiki', 'addArticle.admin', ["articles" => $articles,"categories" => $categories], 'admin');
    }

    public function addArticlePost(){
        usersController::isAdminLogged();

        $articles = new wikiArticlesModel();

        $articles->title = filter_input(INPUT_POST, "title");
        $articles->categoryId = filter_input(INPUT_POST, "categorie");
        $articles->icon= filter_input(INPUT_POST, "icon");
        $articles->content = filter_input(INPUT_POST, "content");

        $articles->slug = $articles->cleanString($articles->title);

        //Get the author pseudo
        $user = new usersModel();
        $user->fetch($_SESSION['cmsUserId']);
        $articles->author = $user->userPseudo;

        $articles->create();
        header("location: ../list");
    }

    public function editCategorie($id){
        usersController::isAdminLogged();

        $categories = new wikiCategoriesModel();
        $categories->id = $id;

        $categories->fetch($id);


        view('wiki', 'editCategorie.admin', ["categories" => $categories], 'admin');
    }

    public function editCategoriePost($id){
        usersController::isAdminLogged();

        $categories = new wikiCategoriesModel();
        $categories->id = $id;
        $categories->name = filter_input(INPUT_POST, "name");
        $categories->description = filter_input(INPUT_POST, "description");
        $categories->icon = filter_input(INPUT_POST, "icon");
        $categories->slug = filter_input(INPUT_POST, "slug");
        if (filter_input(INPUT_POST, "isDefine") == null){
            $categories->isDefine = 0;
        }else{
            $categories->isDefine = filter_input(INPUT_POST, "isDefine");
        }

        $categories->update();

        header("location: ../../list");
        die();

    }

    public function deleteCategorie($id){
        usersController::isAdminLogged();

        $categorie = new wikiCategoriesModel();
        $categorie->id = $id;
        $categorie->delete();

        header("location: ../../list");

    }

    public function editArticle($id){
        usersController::isAdminLogged();

        $articles = new wikiArticlesModel();
        $articles->id = $id;

        $categories = new wikiCategoriesModel();
        $categories = $categories->fetchAll();

        $articles->fetch($id);


        view('wiki', 'editArticle.admin', ["articles" => $articles, "categories" => $categories], 'admin');
    }

    public function editArticlePost($id){
        usersController::isAdminLogged();

        //Get the author pseudo
        $user = new usersModel();
        $user->fetch($_SESSION['cmsUserId']);

        $articles = new wikiArticlesModel();

        $articles->id = $id;
        $articles->title = filter_input(INPUT_POST, "title");
        $articles->content = filter_input(INPUT_POST, "content");
        $articles->icon = filter_input(INPUT_POST, "icon");
        $articles->lastEditor = $user->userPseudo;
        if (filter_input(INPUT_POST, "isDefine") == null){
            $articles->isDefine = 0;
        }else{
            $articles->isDefine = filter_input(INPUT_POST, "isDefine");
        }

        $articles->update();

        header("location: ../../list");
        die();

    }

    public function deleteArticle($id){
        usersController::isAdminLogged();

        $article = new wikiArticlesModel();
        $article->id = $id;
        $article->delete();

        header("location: ../../list");

    }

    public function defineCategorie($id){
        usersController::isAdminLogged();

        $categorie = new wikiCategoriesModel();
        $categorie->id = $id;
        $categorie->define();

        header("location: ../../list");
    }

    public function defineArticle($id){
        usersController::isAdminLogged();

        $article = new wikiArticlesModel();
        $article->id = $id;
        $article->define();

        header("location: ../../list");
    }



    /* //////////////////// FRONT PUBLIC //////////////////// */

    //List all the categories & articles in the main page
    public function publicMain(){

        //Default controllers (important)
        $core = new coreController();
        $menu = new menusController();

        $categorie = new wikiCategoriesModel();
        $getAllCategories = $categorie->getAllCategories();

        $articles = new wikiArticlesModel();


        //Include the public view file ("public/themes/$themePath/views/wiki/main.view.php")
        view('wiki', 'main', ["categorie" => $categorie,"getAllCategories" => $getAllCategories ,
                                "articles" => $articles, "core" => $core, "menu" => $menu], 'public');
    }

    public function publicShowArticle($slug){

        //get the current url (slug)
        $url = $slug;

        //Default controllers (important)
        $core = new coreController();
        $menu = new menusController();

        $categorie = new wikiCategoriesModel();
        $getAllCategories = $categorie->getAllCategories();

        $articles = new wikiArticlesModel();

        $articles->getContent($slug);


        //Include the public view file ("public/themes/$themePath/views/wiki/main.view.php")
        view('wiki', 'main', ["categorie" => $categorie,"getAllCategories" => $getAllCategories ,
            "articles" => $articles, "url" => $url , "core" => $core, "menu" => $menu], 'public');
    }
}