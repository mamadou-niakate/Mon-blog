<?php
    use Core\HTML\BootstrapForm ;

    $postTable = App::getInstance()->getTable('post') ;
    $categoryTable= App::getInstance()->getTable('category') ;

    $result = false ;
    if(!empty($_POST))
    {
        if(isset($_POST['titre']) && isset($_POST['contenu']) && isset($_POST['category_id']))
        {
            $result = $postTable->update($_GET['id'],["titre" => $_POST['titre'], 
                                                      "contenu" => $_POST['contenu'],
                                                      "category_id" => $_POST['category_id']
                                                     ]
                                        );
        }
    }

    if($result)
    {
?>      <divs class="alert alert-success">
            L'article a bien été Sauvegarder
        </div><br/>
<?php
    }
    $post = $postTable->find($_GET['id']) ;
    $categories = $categoryTable->listRecords('id','titre') ;
    $form = new BootstrapForm($post) ;
?>
    
<form method="post">
    <?= $form->input('titre',"Titire de l'article") ;?>
    <?= $form->input('contenu',"contenu",['type' => 'textarea']) ;?>
    <?= $form->select('category_id','Catgégorie',$categories);?> ;
    <button class="btn btn-primary">Sauvegarder</button>
</form>