<?php
    $posts = App::getInstance()->getTable('post')->all() ;
?>

 <h1>Administrer les articles</h1>
 <p><a href="?page=post.add" class="btn btn-success">Ajouter</a></p>
<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Titre</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($posts as $post):?>
            <tr>
                <td><?= $post->id?></td>
                <td><?= $post->titre?></td>
                <td>                    
                    <a class="btn btn-primary" href="?page=post.edit&id=<?= $post->id ;?>">Edit</a>

                    <form action="?page=post.delete" method="post" style="display:inline-block">
                        <input type="hidden" name="id" value="<?= $post->id ;?>">
                        <button type="submit" class="btn btn-danger" href="?page=?post.delete&id=<?= $post->id ;?>">Supprimer</button>
                    </form>

                </td>
            </tr>
        <?php endforeach ;?>
    </tbody>
</table>
