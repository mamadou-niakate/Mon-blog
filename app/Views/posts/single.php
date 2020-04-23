
<!-- affichage d'un article (un seul) donnée en fonction de son id-->

<?php
    $app = App::getInstance() ;
    
	$article = $app->getTable("post")->findWithCategory($_GET['id']) ;

    if($article === false)
    {
        App::notFound() ;
    }

	$app->title = $article->titre ;
?>


<h2><?= $article->titre ; ?></h2>

<p><em><?= $article->categorie ; ?></em></p>

<p><?= $article->contenu ; ?></p>

