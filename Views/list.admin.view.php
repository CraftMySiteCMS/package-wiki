<?php
$title = _Wiki_dashboard_TITLE;
$description = _Wiki_dashboard_DESC;
?>

<?php $styles = "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/dragula/3.6.6/dragula.min.css'>";
$scripts = "<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/dragula/3.6.6/dragula.min.js'> </script>";

$scripts .= "

<script>
    dragula([document.querySelector('#container'),document.querySelector('#choice-category'),document.querySelector('#choice-articles')],
      {
          removeOnSpill: false
      }
      );
</script>

";

ob_start();
?>

<style>
    .btn-article-section{
        margin-left: 20px;
    }

    .btn-article-section a{
        color: black;
    }

</style>


<pre>
    S'inspirer de ça pour faire la colonnes
    → <a href="https://codepen.io/aaroniker/pen/dOrXmY" target="_blank">https://codepen.io/aaroniker/pen/dOrXmY</a>
</pre>

    <div class="container">
        <div class="row">

            <section class="content pb-3">
                <div class="container-fluid h-100">
                    <div class="card card-row card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">
                                Catégories & choix disponibles:
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="card card-info card-outline">
                                <div class="card-header">
                                    <h5 class="card-title">Catégories disponibles</h5>
                                    <div class="card-tools">
                                        <span>(5)</span>
                                    </div>
                                </div>
                                <div class="card-body" id="choice-category">
                                    <div class="custom-control custom-checkbox">Catégorie coucou
                                        <a href="#"><i class="fas fa-edit"></i></a>
                                        <a href="#"><i class="fas fa-trash"></i></a>
                                    </div>
                                    <div class="custom-control custom-checkbox">Catégorie coucou
                                        <a href="#"><i class="fas fa-edit"></i></a>
                                        <a href="#"><i class="fas fa-trash"></i></a>
                                    </div>
                                    <div class="custom-control custom-checkbox">Catégorie coucou
                                        <a href="#"><i class="fas fa-edit"></i></a>
                                        <a href="#"><i class="fas fa-trash"></i></a>
                                    </div>

                                </div>
                            </div>
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="card-title">Articles disponibles</h5>
                                    <div class="card-tools">
                                        <span>(10)</span>
                                    </div>
                                </div>
                                <div class="card-body" id="choice-articles">
                                    <div class="custom-control custom-checkbox">Article coucou
                                        <a href="#"><i class="fas fa-edit"></i></a>
                                        <a href="#"><i class="fas fa-trash"></i></a>
                                    </div>
                                    <div class="custom-control custom-checkbox">Article coucou
                                        <a href="#"><i class="fas fa-edit"></i></a>
                                        <a href="#"><i class="fas fa-trash"></i></a>
                                    </div>
                                    <div class="custom-control custom-checkbox">Article coucou
                                        <a href="#"><i class="fas fa-edit"></i></a>
                                        <a href="#"><i class="fas fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>





            <!-- Section container, elle contient tous les articles et les catégories-->
            <div class="col-7">
                <div class="bg-primary p-5" id="container">


                </div>
            </div>

        </div>

    </div>



<?php $content = ob_get_clean(); ?>

<?php require(getenv("PATH_ADMIN_VIEW") . 'template.php'); ?>