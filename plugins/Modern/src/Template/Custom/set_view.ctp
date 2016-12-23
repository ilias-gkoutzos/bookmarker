<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->set('cakeDescription','Custom Page Title');

$this->extend('/Custom/calculate');

$this->start('side');
echo 'this is the sidebar from set_view.ctp !';
$this->end();



