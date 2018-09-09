<?php

use Cake\ORM\TableRegistry;

$articles = TableRegistry::get('Articles');
$query = $articles->find();

if ($articles instanceof ArticlesTable){
    echo "Instance of Articles!";
}
var_dump($articles instanceof ArticlesTable);
foreach ($query as $row) {
    echo $row->title;
}
