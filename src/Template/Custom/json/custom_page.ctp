<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

printf("Variable data from controller 
        contains: color -> %s, type -> %s, price ->%d "
        ,$data['color'],$data['type'],$data['base_price']);
debug ($this->request);

$this->set('cakeDescription','Custom Page Title');

$this->fetch('sidebar');

?>

