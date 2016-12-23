<?php

use Cake\ORM\TableRegistry;
use Cake\Log\Log;

Log::config('queries', 
        [
            'className' => 'File',
            'path' => LOGS,
            'file' => 'queries.log',
            'scopes' => ['queriesLog']
        ]
    );

$this->Breadcrumbs->add(
       'Connection manager examples'
    );

use Cake\Datasource\ConnectionManager;



$connection= ConnectionManager::get('default');
$connection->logQueries(true);

$data= TableRegistry::get('Articles');
$articlesTable= TableRegistry::get('Articles');

$articles=$data->find()
        ->where(['title LIKE'=>'%!%']);
        

foreach($articles as $article){
  echo $article->title."<br/>";
}

?>

<hr/><h2>Concatenated slug</h2>
<?php

$concs= $data->find();
$slug=$concs->func()->concat(['title'=>'identifier', '-', 'id'=>'identifier']);
$concs
->select(['slug' => $slug])
->select(['title','id']);

foreach($concs as $article){
  echo $article."<br/>";
}
?>

<!--<hr/><h2>Sum of articles containing title:</h2>-->
<?php

/*$count=$data->find()
        ->where(function ($exp,$q){
            return $exp->addCase(
                [
                    $q->newExp()->where(['title LIKE'=>'%!%']),
                ],
                ['TITLED','UNTITLED'],
                ['string','string']
            );
        });*/
?>

<hr/><h2>Articles containing title or !:</h2>

<?php

$result=$data->find()
        ->where(['title LIKE'=>'%!%','OR'=>[['title LIKE'=>'%title%'],['title LIKE'=>'%another%']]]);
//SELECT * FROM articles WHERE title LIKE %!% AND (title LIKE %title% OR title LIKE %another%  )
        

foreach($result as $article){
  echo $article->title."<br/>";
}
?>
<hr/><h2>Articles containing title or once:</h2>
<?php

$result=$data->find()
        ->where(['title LIKE'=>'%!%'])
        ->orWhere(['title LIKE'=>'%once%']);
        

foreach($result as $article){
  echo $article->title."<br/>";
}
?>

<!-------->
<?php

$result=$data->find()
        ->where(function ($exp){
            $like1=$exp->or_(function ($or){
                    return $or->like('title','%!%')
                       ->like('title','%once%');
                });
            //$like2=$exp->like('title','%!%');
            return $like1;
        });
        
$count=$result->count();
?>
<hr/><h2>Articles containing title or once: <?= $count; ?> (function method)</h2>

<?php     
foreach($result as $article){
  echo $article->title."<br/>";
}




?>

