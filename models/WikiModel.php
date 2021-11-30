<?php

namespace CMS\Model\Wiki ;

use CMS\Model\manager;

use PDO;
use stdClass;

/**
 * Class @wikiModel
 * @package Wiki
 * @author Teyir | CraftMySite <contact@craftmysite.fr>
 * @version 1.0
 */



class wikiModel extends manager {
    //Categories
    public string $nameCategorie;
    public string $descriptionCategorie;
    public string $iconCategorie;
    public string $slugCategorie;
    public int $positionCategorie;
    public int $idCategorie;

    //Articles
    public string $titleArticle;
    public string $categorieIdArticle;
    public string $iconeArticle;
    public string $contentArticle;
    public string $slugArticle;
    public string $authorArticle;
    public string $lastEditorArticle;
    public int $positionArticle;
    public int $idArticle;


    public function cleanString($string)
    {
        $search  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', '&', "'", '"', '%', '!', '?', '*', ' ');
        $replace = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'e', '_', '_', '_', '_', '_', '_', '-');

        $stringClean = str_replace($search, $replace, $string);

        return $stringClean;
    }



    public function categorieAdd(){

        $var = array(
            "name" => $this->nameCategorie,
            "description" => $this->descriptionCategorie,
            "icon" => $this->iconCategorie,
            "slug" => $this->slugCategorie
        );

        $sql = "INSERT INTO cms_wiki_categories (name,description,slug,icon) VALUES (:name, :description, :slug, :icon)";

        $db = manager::dbConnect();
        $req = $db->prepare($sql);
        $req->execute($var);
    }


    public function articleAdd(){

        $var = array(
            "title" => $this->titleArticle,
            "category_id" => $this->categorieIdArticle,
            "icon" => $this->iconeArticle,
            "content" => $this->contentArticle,
            "author" => $this->authorArticle,
            "slug" => $this->slugArticle
        );

        $sql = "INSERT INTO cms_wiki_articles (title, category_id, icon, content, author, slug) VALUES (:title, :category_id, :icon, :content, :author, :slug)";

        $db = manager::dbConnect();
        $req = $db->prepare($sql);
        $req->execute($var);

    }





    public function fetchAll(): array{
        $sql = "SELECT * FROM cms_wiki_categories";
        $db = manager::dbConnect();
        $req = $db->prepare($sql);
        $res = $req->execute();

        if ($res){
            return $req->fetchAll();
        }

        return [];
    }







}