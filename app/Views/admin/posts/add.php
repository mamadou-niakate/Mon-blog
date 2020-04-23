<?php
    use Core\HTML\BootstrapForm ;

    $postTable = App::getInstance()->getTable('post') ;
    $categoryTable= App::getInstance()->getTable('category') ;

    $result = false ;
    if(!empty($_POST))
    {
        if(isset($_POST['titre']) && isset($_POST['contenu']) && isset($_POST['category_id']))
        {
            $result = $postTable->create(
                                        ["titre" => $_POST['titre'], 
                                        "contenu" => $_POST['contenu'],
                                        "category_id" => $_POST['category_id']
                                        ]
                                );
        }
    }

    if($result)
    {
        header('Location: admin.php?page=post.edit&id=' . App::getInstance()->getDB()->lastInsertId());       
    }
    $categories = $categoryTable->listRecords('id','titre') ;
    $form = new BootstrapForm($_POST) ;
?>
    
<form method="post">
    <?= $form->input('titre',"Titire de l'article") ;?>
    <?= $form->input('contenu',"contenu",['type' => 'textarea']) ;?>
    <?= $form->select('category_id','Catgégorie',$categories);?> ;
    <button class="btn btn-primary">Sauvegarder</button>
</form>