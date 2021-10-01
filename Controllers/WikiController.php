<?php
namespace CMS\Controller\wiki;

use CMS\Controller\CoreController;
use CMS\Controller\users\UsersController;
use CMS\Model\wiki\WikiModel;
use CMS\Model\users\UsersModel;


/**
 * Class: @WikiController
 * @package wiki
 * @author Teyir | CraftMySite <contact@craftmysite.fr>
 * @version 1.0
 */

class WikiController extends CoreController
{

    public static string $theme_path;

    public function __construct($theme_path = null)
    {
        parent::__construct($theme_path);
    }

    public function frontWikiListAdmin() {
        UsersController::isAdminLogged();

        $wiki = new wikiModel();

        //List all catégories and articles



        require('app/package/wiki/Views/list.admin.view.php');
    }
}