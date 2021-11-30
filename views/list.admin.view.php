<?php
$title = WIKI_DASHBOARD_TITLE;
$description = WIKI_DASHBOARD_DESC;

$styles = '<link rel="stylesheet" href="'.getenv("PATH_SUBFOLDER").'app/package/wiki/views/ressources/css/main.css">';

/** @var wikiModel[] $wiki */

ob_start();
?>


    <div class="container">
        <section class="card">
            <div class="row p-3">
                <div class="mx-auto">
                    <a href="add/categorie" class="btn btn-success"><?= WIKI_DASHBOARD_BUTTON_ADD_CATEGORY ?></a>
                </div>

                <div class="mx-auto">
                    <a href="add/article" class="btn btn-success"><?= WIKI_DASHBOARD_BUTTON_ADD_ARTICLE ?></a>
                </div>
            </div>
        </section>
        <div class="row">

            <section class="content pb-3">
                <div class="container h-100">
                    <div class="card card-row card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <?= WIKI_DASHBOARD_ARTICLES_UNDEFINED ?>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="card-title"><?= WIKI_DASHBOARD_ARTICLES ?></h5>
                                    <div class="card-tools">
                                        <span>(<strong><?= $wiki->getNumberOfUndefinedArticles() ?></strong>)</span>
                                    </div>
                                </div>
                                <div class="card-body" id="list-articles">
                                    <ul class="list-unstyled">
                                        <?php
                                        /** @var wikiModel[] $undefinedArticles */
                                        foreach ($undefinedArticles as $undefinedArticle):?>
                                            <li><?= $undefinedArticle['title'] ?><button class="btn icon-add"><i class="fas fa-plus-circle"></i></button></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>





            <!-- Section container, elle contient tous les articles et les catégories-->
            <div class="col-8">
                <div class="p-5" id="container">

                    <div class="card-body">
                        <ol class="list-unstyled">
                            <?php
                            /** @var wikiModel[] $getAllCategories */
                            foreach ($getAllCategories as $category):?>
                            <div class="categorie-container mt-4" id="categorie-<?= $category['id'] ?>">
                                <span class="ml-2"><?= $category['name'] ?></span>
                                <a href="#" class="float-right wiki-icons mr-2"><i class="fas fa-trash-alt"></i></a>
                                <a href="#" class="float-right wiki-icons mr-3"><i class="fas fa-edit"></i></a>
                            </div>
                                <?php $articles =  $wiki->getAllArticlesInCategory($category['id']);
                                    foreach ($articles as $article):?>
                                        <div class="ml-5 mt-1 article-container" id="article-<?= $article['id'] ?>">
                                            <span class="ml-2"><?= $article['title'] ?></span>
                                            <a href="#" class="float-right wiki-icons mr-2"><i class="fas fa-trash-alt"></i></a>
                                            <a href="#" class="float-right wiki-icons mr-3"><i class="fas fa-edit"></i></a>
                                        </div>
                                    <?php endforeach; ?>
                            <?php endforeach; ?>

                        </ol>



                    </div>


                </div>
            </div>

        </div>

    </div>



<?php $content = ob_get_clean(); ?>

<?php require(getenv("PATH_ADMIN_VIEW") . 'template.php'); ?>