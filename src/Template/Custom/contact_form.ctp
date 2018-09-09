<?php

$this->assign('title', 'Contact Form');

$this->Breadcrumbs->add(
        __('Contact us!')
    );


echo $this->Form->create(null, ['url'=>['controller'=>'custom','action'=>'contactForm'],'enctype'=>'multipart/form-data']);

echo $this->Form->input('field', ['type' => 'file']);
echo $this->Form->input('email');

echo $this->Form->input('birth_dt', [
    'label' => 'Date of birth',
    'minYear' => date('Y') - 70,
    'maxYear' => date('Y') - 18,
]);
$options=['1'=>1,'2'=>2,'3'=>3,'4'=>4];
echo $this->Form->select('rooms', $options, [
    'multiple' => true,
    // options with values 1 and 3 will be selected as default
    'default' => [1, 3]
]);

echo $this->Form->time('close_time', [
    'value' => '13:30:00'
]);

echo $this->Form->input('time', [
    'type' => 'time',
    'interval' => 15,
    'timeFormat'=>12
]);

echo $this->Form->textarea('textarea', ['rows' => '5', 'cols' => '5']);

echo $this->Form->checkbox('done');

echo $this->Form->radio(
    'favorite_color',
    [ 
        ['value' => 'r', 'disabled'=>true, 'text' => 'Red', 'style' => 'color:red;'],
        ['value' => 'u', 'text' => 'Blue', 'style' => 'color:blue;'],
        ['value' => 'g', 'text' => 'Green', 'style' => 'color:green;'],
    ]
);

$options = ['M' => 'Male', 'F' => 'Female'];
echo $this->Form->select('gender', $options);

$groups=[
    'Ethnicity'=>[
        'caucasian'=>'Caucasian',
        'musli'=>'Muslim'
    ],
    'Gender'=>[
        'M'=>'Male',
        'F'=>'Female'
    ]
];
echo $this->Form->label('gender2',__('Your Gender'));
echo $this->Form->select('gender2', $groups,['multiple' => false]);
echo $this->Form->select('gender2', $groups,['multiple' => 'checkbox']);

echo $this->Form->select('gender2', $groups,['multiple' => true]);

echo $this->Form->datetime('released', [
    'year' => [
        'class' => 'year-classname',
    ],
    'month' => [
        'class' => 'month-class',
        'data-type' => 'month',
    ]
]);
echo '<hr/>Time:';
echo $this->Form->time('released', [
    'interval' => 15,
    'hour' => [
        'class' => 'foo-class',
        ],
    'minute' => [
        'class' => 'bar-class',
        ],
]);

echo '<hr/>Year:';

echo $this->Form->year('purchased', [
    'minYear' => 2000,
    'maxYear' => date('Y')
]);

echo '<hr/>Month:';
echo $this->Form->month('mob');

echo '<hr/>Meridian:';
echo $this->Form->meridian('time');

echo '<hr/>Entire Form:';
echo $this->Form->inputs([
    'name' => ['label' => 'Your name here'],
    'email'
],['legend' => 'Update news post']);

echo $this->Form->button('Another Button', ['type' => 'button']);
echo $this->Form->button('Reset the Form', ['type' => 'reset']);
echo $this->Form->button('<em>Submit Form</em>', ['type' => 'submit','escape'=>true]);
echo $this->Form->end();
