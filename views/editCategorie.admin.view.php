<?php
$title = WIKI_DASHBOARD_TITLE_EDIT_CATEGORIE;
$description = WIKI_DASHBOARD_DESC;

$styles = '<link rel="stylesheet" href="'.getenv("PATH_SUBFOLDER").'app/package/wiki/views/ressources/css/main.css">';

ob_start();

/** @var wikiCategoriesModel[] $categories */
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="" method="post">
                    <div class="card card-primary">

                        <div class="card-header">
                            <h3 class="card-title"><?=WIKI_DASHBOARD_TITLE_EDIT_CATEGORIE?> :</h3>
                        </div>

                        <div class="card-body">

                            <label for="name"><?=WIKI_DASHBOARD_ADD_CATEGORIE_NAME?></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                </div>
                                <input type="text" name="name" value="<?= $categories->name ?>" class="form-control" placeholder="<?=WIKI_DASHBOARD_ADD_CATEGORIE_NAME_PLACEHOLDER?>" required>

                            </div>

                            <label for="description"><?=WIKI_DASHBOARD_ADD_CATEGORIE_DESCRIPTION?></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-paragraph"></i></span>
                                </div>
                                <input type="text" name="description" value="<?= $categories->description ?>" class="form-control" placeholder="<?=WIKI_DASHBOARD_ADD_CATEGORIE_DESCRIPTION_PLACEHOLDER?>" required>
                            </div>

                            <label for="icon"><?=WIKI_DASHBOARD_ADD_CATEGORIE_ICON?></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-icons"></i></span>
                                </div>
                                <input type="text" name="icon" value="<?= $categories->icon ?>" class="form-control" placeholder="<?=WIKI_DASHBOARD_ADD_CATEGORIE_ICON_PLACEHOLDER?>" required>
                            </div>
                            <small class="form-text">Retrouvez la liste des icones sur le site de <a href="https://fontawesome.com" target="_blank">FontAwesome.com</a></small>

                            <label class="mt-4" for="slug"><?=WIKI_DASHBOARD_ADD_CATEGORIE_SLUG?></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><?= "https://" . $_SERVER['SERVER_NAME'] . getenv("PATH_SUBFOLDER") . 'wiki/' ?></span>
                                </div>
                                <input type="text" name="slug" value="<?= $categories->slug ?>" class="form-control" placeholder="<?=WIKI_DASHBOARD_ADD_CATEGORIE_SLUG_PLACEHOLDER?>" required>
                            </div>

                        </div>


                        <div class="card-footer">

                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                                <input type="checkbox" name="isDefine" value="1" class="custom-control-input" id="customSwitch3" <?= ($categories->isDefine ? "checked" : "")  ?>>
                                <label class="custom-control-label" for="customSwitch3"><?=WIKI_DASHBOARD_EDIT_CATEGORIE_ACTIVE?></label>
                            </div>

                            <button type="submit" class="btn btn-primary float-right"><?=WIKI_DASHBOARD_BUTTON_SAVE?></button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php $content = ob_get_clean(); ?>

<?php require(getenv("PATH_ADMIN_VIEW") . 'template.php'); ?>
