<?php

namespace App\Table ;
use \Core\Table\Table ;

class PostTable extends Table
{
    /**
     * retourner les derniers posts
     * @return array
     */
    public function last()
    {
        return $this->query("SELECT posts.id, posts.titre,posts.contenu,posts.date,categories.titre as categorie
        FROM posts LEFT JOIN categories ON category_id = categories.id
        ORDER BY posts.date DESC ") ;
    }

    public function findWithCategory($id)
    {
        return $this->query("SELECT posts.id, posts.titre,posts.contenu,posts.date,categories.titre as categorie, posts.category_id
                             FROM posts LEFT JOIN categories ON category_id = categories.id
                             WHERE posts.id=?",[$id],true) ;
    }

    public function lastByCategory($categoryId)
    {
        return $this->query("SELECT posts.id, posts.titre,posts.contenu,posts.date,categories.titre as categorie
                             FROM posts LEFT JOIN categories ON category_id = categories.id
                             WHERE categories.id = ?",
                             [$categoryId]) ;
    }
}