<?php
$title = WIKI_DASHBOARD_TITLE_ADD_ARTICLE;
$description = WIKI_DASHBOARD_DESC;

$styles = '<link rel="stylesheet" href="'.getenv("PATH_SUBFOLDER").'app/package/wiki/views/ressources/css/main.css">';
$styles .= "<link rel='stylesheet' href='" . getenv("PATH_SUBFOLDER") . "admin/resources/vendors/summernote/summernote-bs4.min.css'>";
$styles .= "<link rel='stylesheet' href='" . getenv("PATH_SUBFOLDER") . "admin/resources/vendors/summernote/summernote.min.css'>";

$scripts = '<script src="' . getenv("PATH_SUBFOLDER") . 'admin/resources/vendors/summernote/summernote.min.js" ></script>';
$scripts .= '<script src="' . getenv("PATH_SUBFOLDER") . 'admin/resources/vendors/summernote/summernote-bs4.min.js" ></script>';
$scripts .="
    <script>
        $(document).ready(function() {
          $('#summernote').summernote({
          height: 200,
          width: 200000,
          codeviewIframeFilter: true,
            toolbar: [
              ['style', ['style']],
              ['font', ['bold', 'underline', 'strikethrough', 'clear']],
              ['font', ['superscript', 'subscript']],
              ['fontname', ['fontname']],
              ['color', ['color']],
              ['division', ['hr']],
              ['para', ['ul', 'ol', 'paragraph']],
              ['table', ['table']],
              ['insert', ['link', 'picture', 'video']],
              ['view', ['fullscreen', 'codeview', 'help']],
              ['misc', ['undo', 'redo']]
            ],
          });
        });
    </script>
";

ob_start();

/** @var wikiArticlesModel[] $articles */
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
                                <input type="text" name="title" value="<?= $articles->title ?>" class="form-control" placeholder="<?=WIKI_DASHBOARD_ADD_ARTICLE_TITLE_PLACEHOLDER?>" required>

                            </div>

                            <label for="categorie"><?=WIKI_DASHBOARD_ADD_ARTICLE_CATEGORIE?></label>
                            <div class="input-group mb-3">

                                <select class="form-control" name="categorie" required>
                                    <?php
                                    /** @var WikiCategoriesModel[] $categories */
                                    foreach ($categories as $category): ?>
                                        <option value="<?= $category['id'] ?>" <?= ($articles->categoryId == $category['id'] ? "selected" : "") ?> ><?= $category['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>


                            </div>

                            <label for="icon"><?=WIKI_DASHBOARD_ADD_CATEGORIE_ICON?></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-icons"></i></span>
                                </div>
                                <input type="text" name="icon" value="<?= $articles->icon ?>" class="form-control" placeholder="<?=WIKI_DASHBOARD_ADD_CATEGORIE_ICON_PLACEHOLDER?>" required>
                            </div>
                            <small class="form-text">Retrouvez la liste des icones sur le site de <a href="https://fontawesome.com" target="_blank">FontAwesome.com</a></small>


                            <label for="content" class="mt-3"><?=WIKI_DASHBOARD_ADD_ARTICLE_CONTENT?></label>
                            <div class="input-group mb-3">
                                <textarea id="summernote" name="content" class="form-control" placeholder="<?=WIKI_DASHBOARD_ADD_ARTICLE_CONTENT_PLACEHOLDER?>" required><?= $articles->content ?> </textarea>

                            </div>

                        </div>



                        <div class="card-footer">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                                <input type="checkbox" name="isDefine" value="1" class="custom-control-input" id="customSwitch3" <?= ($articles->isDefine ? "checked" : "")  ?>>
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
