<?php

use Cake\ORM\TableRegistry;

$articles= TableRegistry::get('Articles');

$query=$articles->find();
$query->hydrate(false);

$slug=$query->func()->concat(['title'=>'identifier','-','id'=>'identifier']);    

$query->select(['title','id','slug'=>$slug]);

$result=$query->toList();

foreach ($result as $article){
    echo $article['slug']."<br/>";
}
