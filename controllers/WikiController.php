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

        //List all catégories and articles


        //Include the view file ("views/list.admin.view.php").
        view('wiki', 'list.admin', ["wiki" => $wiki], 'admin');
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