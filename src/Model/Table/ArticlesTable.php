<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ArticlesTable extends Table
{
    public function initialize(array $config) {
        
        /*
         * The below are used when you dont want to use CONVENTIONS
         * 
         * $this->table('my_table'); (change the table where data is fetched from)
         * $this->entityClass('App\Model\Entity\PO'); Change the Entity class
         * $this->primaryKey('my_id'); change defauly primary key from 'id' 
         * to something you like.  */
        
        
        //$this->table('my_table'); 
        //$this->entityClass('App\Model\Entity\PO');
        //$this->primaryKey('my_id');
        
        parent::initialize($config);

        $this->table('articles');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
    }
}