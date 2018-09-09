<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//THIS IS WRONG!!!!!!!!!!!!!!!
$user = new \App\Controller\PagesController;
$data=$user->test();


$this->Flash->render();

echo "Company name: ".$data['name']."<br/>";
echo "Company intro: ".$data['intro']."<br/>";



?>

