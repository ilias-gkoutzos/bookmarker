<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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

$connection->transactional(function ($conn){
    $conn->execute('UPDATE articles SET title=? WHERE id=?',['The title!',1],['string','integer']);
});


$results=$connection
    ->execute(
        'SELECT * FROM articles'
    )
    ->fetchAll('assoc');

print_r($results);

//$connection->logQueries(false);