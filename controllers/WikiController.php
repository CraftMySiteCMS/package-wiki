<?php
namespace CMS\Controller\Wiki;

use CMS\Controller\coreController;
use CMS\Controller\Menus\menusController;
use CMS\Controller\users\usersController;
use CMS\Model\wiki\wikiModel;
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
        $wiki = new wikiModel();

        //Get all undefined articles
        $undefinedArticles = $wiki->getUndefinedArticles();

        $numberOfUndefinedArticles = $wiki->getNumberOfUndefinedArticles();


        //Include the view file ("views/list.admin.view.php").
        view('wiki', 'list.admin', ["wiki" => $wiki, "undefinedArticles" => $undefinedArticles], 'admin');
    }

    public function wikiAddCategorie(){
        usersController::isAdminLogged();

        view('wiki', 'addCategorie.admin', [], 'admin');
    }


    public function wikiAddCategoriePost(){
        usersController::isAdminLogged();

        $wiki = new wikiModel();

        $wiki->nameCategorie = $_POST['name'];
        $wiki->descriptionCategorie = $_POST['description'];
        $wiki->iconCategorie = $_POST['icon'];

        $wiki->slugCategorie = $wiki->cleanString($_POST['slug']);;


        $wiki->categorieAdd();
        header("location: ../list");
    }

    public function wikiAddArticle(){
        usersController::isAdminLogged();

        $wiki = new wikiModel();
        $categories = $wiki->fetchAll();

        view('wiki', 'addArticle.admin', ["categories" => $categories], 'admin');
    }

    public function wikiAddArticlePost(){
        usersController::isAdminLogged();

        $wiki = new wikiModel();

        $wiki->titleArticle = $_POST['title'];
        $wiki->categorieIdArticle = $_POST['categorie'];
        $wiki->iconeArticle = $_POST['icon'];
        $wiki->contentArticle = $_POST['content'];

        $wiki->slugArticle = $wiki->cleanString($wiki->titleArticle);

        //Get the author pseudo
        $user = new usersModel();
        $user->fetch($_SESSION['cmsUserId']);
        $wiki->authorArticle = $user->userPseudo;

        $wiki->articleAdd();
        header("location: ../list");
    }





    /* //////////////////// FRONT PUBLIC //////////////////// */

    public function frontMainWikiPublic(){

        //Default controllers (important)
        $core = new coreController();
        $menu = new menusController();

        $wiki = new wikiModel();

        //Include the public view file ("public/themes/$themePath/views/wiki/main.view.php")
        view('wiki', 'main', ["wiki" => $wiki, "core" => $core, "menu" => $menu], 'public');
    }
}