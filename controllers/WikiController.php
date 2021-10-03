<?php
namespace CMS\Controller\Wiki;

use CMS\Controller\coreController;
use CMS\Controller\users\usersController;
use CMS\Model\wiki\wikiModel;
use CMS\Model\users\usersModel;


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
}