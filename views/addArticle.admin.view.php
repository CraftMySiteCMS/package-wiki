<?php
$title = WIKI_DASHBOARD_TITLE_ADD_ARTICLE;
$description = WIKI_DASHBOARD_DESC;

$styles = '<link rel="stylesheet" href="'.getenv("PATH_SUBFOLDER").'app/package/wiki/views/ressources/css/main.css">';

ob_start();
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="" method="post">
                    <div class="card card-primary">

                        <div class="card-header">
                            <h3 class="card-title"><?=WIKI_DASHBOARD_TITLE_ADD_ARTICLE?> :</h3>
                        </div>

                        <div class="card-body">

                            <label for="title"><?=WIKI_DASHBOARD_ADD_ARTICLE_TITLE?></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                </div>
                                <input type="text" name="title" class="form-control" placeholder="<?=WIKI_DASHBOARD_ADD_ARTICLE_TITLE_PLACEHOLDER?>" required>

                            </div>

                            <label for="categorie"><?=WIKI_DASHBOARD_ADD_ARTICLE_CATEGORIE?></label>
                            <div class="input-group mb-3">

                                <select class="form-control" name="categorie" required>
                                    <?php
                                    /** @var WikiModel[] $categories */
                                    foreach ($categories as $category): ?>
                                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>


                            </div>

                            <label for="icon"><?=WIKI_DASHBOARD_ADD_CATEGORIE_ICON?></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-icons"></i></span>
                                </div>
                                <input type="text" name="icon" class="form-control" placeholder="<?=WIKI_DASHBOARD_ADD_CATEGORIE_ICON_PLACEHOLDER?>" required>
                            </div>
                            <small class="form-text">Retrouvez la liste des icones sur le site de <a href="https://fontawesome.com" target="_blank">FontAwesome.com</a></small>


                            <label for="content" class="mt-3"><?=WIKI_DASHBOARD_ADD_ARTICLE_CONTENT?></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-file-alt"></i></span>
                                </div>
                                <textarea name="content" class="form-control" placeholder="<?=WIKI_DASHBOARD_ADD_ARTICLE_CONTENT_PLACEHOLDER?>" required> </textarea>

                            </div>

                        </div>



                        <div class="card-footer">
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
