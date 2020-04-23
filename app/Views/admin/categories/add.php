<?php
    use Core\HTML\BootstrapForm ;

    $categoryTable= App::getInstance()->getTable('category') ;

    $result = false ;
    if(!empty($_POST))
    {
        if(isset($_POST['titre']))
        {
            $result = $categoryTable->create(["titre" => $_POST['titre']]);
        }
    }

    if($result)
    {
        header('Location: admin.php?page=category.index');       
    }
    $form = new BootstrapForm($_POST) ;
?>
    
<form method="post">
    <?= $form->input('titre',"Titire de la catégorie") ;?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>