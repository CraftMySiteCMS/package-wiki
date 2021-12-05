<?php
namespace CMS\Model\Wiki ;

use CMS\Model\manager;

use PDO;
use stdClass;

/**
 * Class @wikiCategorieModel
 * @package Wiki
 * @author Teyir | CraftMySite <contact@craftmysite.fr>
 * @version 1.0
 */

class wikiCategoriesModel extends manager
{
    public ?int $id;
    public string $name;
    public string $description;
    public string $icon;
    public string $slug;
    public ?int $position;
    public ?int $isDefine;
    public ?string $dateUpdate;


    public function cleanString($string)
    {
        $search  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', '&', "'", '"', '%', '!', '?', '*', ' ');
        $replace = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'e', '_', '_', '_', '_', '_', '_', '-');

        $stringClean = str_replace($search, $replace, $string);

        return $stringClean;
    }

    public function create(){

        $var = array(
            "name" => $this->name,
            "description" => $this->description,
            "icon" => $this->icon,
            "slug" => $this->slug
        );

        $sql = "INSERT INTO cms_wiki_categories (name,description,slug,icon) VALUES (:name, :description, :slug, :icon)";

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

    public function getUndefinedCategories(): array{
        $sql = "SELECT * FROM cms_wiki_categories WHERE is_define = 0";
        $db = manager::dbConnect();
        $req = $db->prepare($sql);
        $res = $req->execute();

        if ($res){
            return $req->fetchAll();
        }

        return [];
    }

    public function getNumberOfUndefinedCategories(){
        $sql = "SELECT * FROM cms_wiki_categories WHERE is_define = 0";
        $db = manager::dbConnect();
        $req = $db->prepare($sql);
        $res = $req->execute();

        if ($res){
            $lines = $req->fetchAll();

            return count($lines);
        }

        return [];
    }

    public function getAllCategories(): array{
        $sql = "SELECT * FROM cms_wiki_categories WHERE is_define = 1";
        $db = manager::dbConnect();
        $req = $db->prepare($sql);
        $res = $req->execute();

        if ($res){
            return $req->fetchAll();
        }

        return [];
    }

    public function fetch($id): void{
        $var = array(
            "id" => $id
        );

        $sql = "SELECT * FROM cms_wiki_categories WHERE id =:id";

        $db = manager::dbConnect();
        $req = $db->prepare($sql);

        if($req->execute($var)) {
            $result = $req->fetch();
            foreach ($result as $key => $property) {

                //to camel case all keys
                $key = explode('_', $key);
                $firstElement = array_shift($key);
                $key = array_map('ucfirst', $key);
                array_unshift($key, $firstElement);
                $key = implode('', $key);

                if (property_exists(wikiCategoriesModel::class, $key)) {
                    $this->$key = $property;
                }
            }
        }
    }


    public function update(): void{
        $var = array(
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "slug" => $this->slug,
            "icon" => $this->icon,
            "is_define" => $this->isDefine
        );

        $sql = "UPDATE cms_wiki_categories SET name=:name, description=:description, slug=:slug, icon=:icon, date_update=now(), is_define=:is_define WHERE id=:id";



        $db = manager::dbConnect();
        $req = $db->prepare($sql);
        $req->execute($var);
    }

    public function define(): void{
        $var = array(
            "id" => $this->id
        );

        $sql = "UPDATE cms_wiki_categories SET is_define=1 WHERE id=:id";

        $db = manager::dbConnect();
        $req = $db->prepare($sql);
        $req->execute($var);
    }

    public function delete(): void{
        $var = array(
            "id" => $this->id
        );

        $sql = "DELETE FROM cms_wiki_categories WHERE id=:id";

        $db = manager::dbConnect();
        $req = $db->prepare($sql);
        $req->execute($var);
    }

}