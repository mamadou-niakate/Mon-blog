<?php
    $categories = App::getInstance()->getTable('category')->all() ;
?>

 <h1>Administrer les catégories</h1>
 <p><a href="?page=category.add" class="btn btn-success">Ajouter</a></p>
<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Titre</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category):?>
            <tr>
                <td><?= $category->id?></td>
                <td><?= $category->titre?></td>
                <td>                    
                    <a class="btn btn-primary" href="?page=category.edit&id=<?= $category->id ;?>">Edit</a>
                    <form action="?page=category.delete" method="post" style="display:inline-block">
                        <input type="hidden" name="id" value="<?= $category->id ;?>">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ;?>
    </tbody>
</table>
