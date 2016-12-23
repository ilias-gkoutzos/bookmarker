<?php

$this->Breadcrumbs->add([
    ['title' => 'Articles!'],
    ['title' => $article->title]
]);

echo $article->body;