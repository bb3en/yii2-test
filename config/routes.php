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

     //RESTful with module (Posts)
 	'PUT,PATCH api/<module>/posts/<id>' => '<module>/posts/update',
    'DELETE api/<module>/posts/<id>' => '<module>/posts/delete',
    'GET,HEAD api/<module>/posts/<id>' => '<module>/posts/view',
    'POST api/<module>/posts' => '<module>/posts/create',
    'GET,HEAD api/<module>/posts' => '<module>/posts/index',

    //RESTful with module (Users)
 	'PUT,PATCH api/<module>/users/<id>' => '<module>/users/update',
     'DELETE api/<module>/users/<id>' => '<module>/users/delete',
     'GET,HEAD api/<module>/users/<id>' => '<module>/users/view',
     'POST api/<module>/users' => '<module>/users/create',
     'GET,HEAD api/<module>/users' => '<module>/users/index',
    
];