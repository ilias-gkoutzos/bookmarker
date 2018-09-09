<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->Breadcrumbs->add(
        'Html Helper'
    );

echo $this->Html->link(
        $this->Html->image('cake.power.gif',['alt'=>'Cakephp power','title'=>'Cakephp power!']), 
        ['controller'=>'Pages','action'=>'home'], 
        ['target'=>'_blank','alt'=>'cakepow link!','escape'=>false]
    );

echo $this->Html->media('sample.mp4',[
        'text'=>'some random text for video',
        'fullBase'=>'true',
        'autoplay',
        ['src' => 'video.ogg', 'type' => "video/ogg; codecs='theora, vorbis'"]
    ]);

$list = [
    'Languages' => [
        'English' => [
            'American',
            'Canadian',
            'British',
        ],
        'Spanish',
        'German',
    ]
];
echo $this->Html->nestedList($list);

echo '<table>';
echo $this->Html->tableHeaders(
    ['Date','Title','Active'],
    ['class' => 'status'],
    ['class' => 'product_table']
);

echo $this->Html->tableCells(
    [
        ['Jul 7th, 2007', 'Best Brownies', 'Yes'],
        ['Jun 21st, 2007', 'Smart Cookies', 'Yes'],
        ['Aug 1st, 2006', 'Anti-Java Cake', 'No'],
    ],
    ['class'=>'darker'],//odd cells
    ['class'=>'lighter']//even cells
);

echo '</table>';

echo '<hr/> Currencies<br/>';

echo $this->Number->currency(1234.2255,'USD',
            ['before'=>'Currency helper','precision'=>5]
        );

echo '<hr/> Readable sizes<br/>';
echo $this->Number->toReadableSize(1894718414212);