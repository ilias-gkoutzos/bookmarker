<?php

use Cake\ORM\TableRegistry;
//use Cake\Controller\Component\AuthComponent;

$bookmarks = TableRegistry::get('Bookmarks');
echo $count;
$query=$bookmarks->find()
        ->select(['title'])
        ->matching('Tags',function($q){
            return $q->where(['Tags.title LIKE'=>'%java%'])
                    ->orWhere(['Tags.title LIKE'=>'%php%'])
                   ;
        })
        ->distinct();

foreach ($query as $tag){
    echo $tag->title."<br/>";
}

?>

<hr/><h2>Bookmarks (innerJoinWith)</h2>
<?php


$query=$bookmarks->find()
        ->innerJoinWith('Tags',function($q){
            return $q->where(['Tags.title LIKE'=>'%java%'])
                    ->orWhere(['Tags.title LIKE'=>'%php%'])
                   ;
        })
        ->distinct();

foreach ($query as $tag){
    echo $tag->title."<br/>";
}

?>

<hr/><h2>Bookmarks (Tags) association:</h2>

<?php
echo $this->Flash->render('assoc');



foreach ($cquery as $tag){
    echo $tag->title."<br/>";
    echo "user ID: ".$tag->user_id."<br/>";
}

?>