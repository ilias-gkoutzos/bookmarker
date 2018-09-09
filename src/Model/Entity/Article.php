<?php

namespace App\Model\Entity;
use Cake\ORM\Entity;
use Cake\Utility\Text;

class Article extends Entity
{
    /*There are often fields you do not want exported in JSON or array formats.
     *  For example it is often unwise to expose password hashes or account 
     * recovery questions. When defining an entity class, define which
     *  properties should be hidden:*/
    protected $_hidden = ['password']; 
    
    /*By default virtual fields are not exported when converting entities to arrays or JSON.
     *  In order to expose virtual properties you need to make them visible. 
     * When defining your entity class you can provide a list of 
     * virtual properties that should be exposed:*/
    protected $_virtual = ['RandomSlug'];
    
    
    protected $_accessible = [
        'id' => true,
        'title' => true,
        'body' => true,
        'created' => true
    ];
    /*The method _get is followed by CamelCased version of the table property. eg Title . 
     * It is used to return formatted data of the title when echo $articles->title; is used*/
    protected function _getTitle($title) {

        return ucwords($title);

    }
    /*The method _set is followed by CamelCased version of the table property. eg Title . 
     * It is used to SET formatted data of the title when $articles->set($array,$options) is used.
     * Handy when SAVING data! */
    protected function _setTitle($title) {
        $this->set('slug', Text::slug($title));
        return $title;

    }
    
    protected function _getRandomSlug()
    {
        return $this->_properties['title'] . 'asa8a7d ' .$this->_properties['slug'];
    }
    
}

