<?php
return [
    
    '<controller:\w+>/<id:\d+>'=>'<controller>/view',
    '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
    
    //預設
    /*   
    '<controller:\w+>/<id:\d+>'=>'<controller>/view',
    '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>', 
    */
    
    //RESTful 
    'PUT,PATCH /users/<id>' => '/user/update',
    'DELETE /users/<id>' => '/user/delete',
    'GET,HEAD /users/<id>' => '/user/view',
    'POST /users' => '/user/create',
    'GET,HEAD /users' => '/user/index',

     //RESTful with module
 	'PUT,PATCH api/<module>/posts/<id>' => '<module>/posts/update',
    'DELETE api/<module>/posts/<id>' => '<module>/posts/delete',
    'GET,HEAD api/<module>/posts/<id>' => '<module>/posts/view',
    'POST api/<module>/posts' => '<module>/posts/create',
    'GET,HEAD api/<module>/posts' => '<module>/posts/index',
    
];