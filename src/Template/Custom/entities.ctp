<?php

use App\Model\Entity\Article;
use Cake\ORM\TableRegistry;

TableRegistry::clear();
$article=new Article;

$article->set([
     'title'=>'one more article with tags',
     'body'=>'Some Random body description',
]);
echo $article->title;
//echo $article->slug;
echo "<br/>";
echo$article->random_slug;

if (!$article->isNew()) {
    echo 'This article was saved already!';
}