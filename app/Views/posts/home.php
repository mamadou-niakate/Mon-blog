
<!-- AFFICHAGE DE TOUS LES ARTICLES ET LEURS CATEGORIES-->


<div class="row">
    <div class="col-sm-8"
        <?php foreach (App::getInstance()->getTable('post')->last() as $post): ?>

            <h2><a href="<?= $post->url ;?>"><?= $post->titre ; ?></a></h2>

            <p><em><?= $post->categorie ; ?></em></p>

            <p><?= $post->extrait ; ?></p>
        <?php endforeach;?>
    </div>
    <div class="col-sm-4">
        <ul>
            <?php foreach(App::getInstance()->getTable('category')->all() as $category): ?>
                <li><a href="<?= $category->url ;?>"><?= $category->titre ;?></a></li>
            <?php endforeach;?>
        </ul>
    </div>
</div>

