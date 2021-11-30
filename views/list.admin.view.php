<?php
$title = WIKI_DASHBOARD_TITLE;
$description = WIKI_DASHBOARD_DESC;

$styles = '<link rel="stylesheet" href="'.getenv("PATH_SUBFOLDER").'app/package/wiki/views/ressources/css/main.css">';

ob_start();
?>


    <div class="container">
        <section class="card">
            <div class="row p-3">
                <div class="mx-auto">
                    <a href="add/categorie" class="btn btn-success">Ajouter une catégorie</a>
                </div>

                <div class="mx-auto">
                    <a href="add/article" class="btn btn-success">Ajouter un article</a>
                </div>
            </div>
        </section>
        <div class="row">

            <section class="content pb-3">
                <div class="container h-100">
                    <div class="card card-row card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">
                                Articles disponibles:
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="card-title">Articles</h5>
                                    <div class="card-tools">
                                        <span>(10)</span>
                                    </div>
                                </div>
                                <div class="card-body" id="list-articles">
                                    <ul class="list-unstyled">
                                        <li>Article 1 <button class="btn icon-add"><i class="fas fa-plus-circle"></i></button></li>
                                        <li>Article 2 <button class="btn icon-add"><i class="fas fa-plus-circle"></i></button></li>
                                        <li>Article 3 <button class="btn icon-add"><i class="fas fa-plus-circle"></i></button></li>
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

                            <div class="categorie-container mt-4" id="categorie-">
                                <span class="ml-2">Catégorie n° 1</span>
                                <a href="#" class="float-right wiki-icons mr-2"><i class="fas fa-trash-alt"></i></a>
                                <a href="#" class="float-right wiki-icons mr-3"><i class="fas fa-edit"></i></a>
                            </div>


                            <div class="ml-5 mt-1 article-container" id="article-">
                                <span class="ml-2">Article n° 1</span>
                                <a href="#" class="float-right wiki-icons mr-2"><i class="fas fa-trash-alt"></i></a>
                                <a href="#" class="float-right wiki-icons mr-3"><i class="fas fa-edit"></i></a>
                            </div>









                        </ol>



                    </div>


                </div>
            </div>

        </div>

    </div>



<?php $content = ob_get_clean(); ?>

<?php require(getenv("PATH_ADMIN_VIEW") . 'template.php'); ?>