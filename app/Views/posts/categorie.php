<?php
    //trouver la categorie ayant id
    $app        = App::getInstance() ;
    $categorie  = $app->getTable("category")->find(htmlspecialchars($_GET["id"])) ;
    $posts      = $app->getTable("post")->lastByCategory($categorie->id) ;
    $categories = $app->getTable("category")->all() ;
?>

<?php
    /** si la categorie n'xiste pas on fait une rediraction 404 */
    if($categorie === false)
    {   
        $app->notFound();
    }
?>

<h1><?= $categorie->titre ;?></h1>

<div class="row">
    <div class="col-sm-8"
    <?php foreach ($posts as $post): ?>

        <h2><a href="<?= $post->url ;?>"><?= $post->titre ; ?></a></h2>

        <p><em><?= $post->categorie ; ?></em></p>

        <p><?= $post->extrait ; ?></p>
    <?php endforeach;?>
</div>
<div class="col-sm-4">
    <ul>
        <?php foreach(App::getInstance()->getTable("category")->all() as $category): ?>
            <li><a href="<?= $category->url ; ?>"><?= $category->titre ;?></a></li>
        <?php endforeach;?>
    </ul>
</div>
</div>
