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

    //RESTful with module (Rbac-assignment)
 	//'PUT,PATCH api/<module>/rbac/assignment/<id>' => '<module>/rbac-assignment/update',
    'DELETE api/<module>/rbac/assignment/<id>' => '<module>/rbac-assignment/delete',
    //'GET,HEAD api/<module>/rbac/assignment/<id>' => '<module>/rbac-assignment/view',
    'POST api/<module>/rbac/assignment' => '<module>/rbac-assignment/create',
    'GET,HEAD api/<module>/rbac/assignment' => '<module>/rbac-assignment/index',

    //RESTful with module (Rbac-permission)
 	'PUT,PATCH api/<module>/rbac/permission/<name>' => '<module>/rbac-permission/update',
    'DELETE api/<module>/rbac/permission/<name>' => '<module>/rbac-permission/delete',
    'GET,HEAD api/<module>/rbac/permission/<name>' => '<module>/rbac-permission/view',
    'POST api/<module>/rbac/permission' => '<module>/rbac-permission/create',
    'GET,HEAD api/<module>/rbac/permission' => '<module>/rbac-permission/index',

    //RESTful with module (Rbac-role)
 	'PUT,PATCH api/<module>/rbac/role/<name>' => '<module>/rbac-role/update',
    'DELETE api/<module>/rbac/role/<name>' => '<module>/rbac-role/delete',
    'GET,HEAD api/<module>/rbac/role/<name>' => '<module>/rbac-role/view',
    'POST api/<module>/rbac/role' => '<module>/rbac-role/create',
    'GET,HEAD api/<module>/rbac/role' => '<module>/rbac-role/index',

    //RESTful with module (Rbac-item)
    'GET,HEAD api/<module>/rbac/item' => '<module>/rbac-item/index',

    //RESTful with module (Rbac-role-child)
 	// 'PUT,PATCH api/<module>/rbac/role-child/<name>' => '<module>/rbac-role-child/update',
    'DELETE api/<module>/rbac/role-child/<parent>' => '<module>/rbac-role-child/delete',
    'GET,HEAD api/<module>/rbac/role-child/<parent>' => '<module>/rbac-role-child/view',
    'POST api/<module>/rbac/role-child' => '<module>/rbac-role-child/create',
    'GET,HEAD api/<module>/rbac/role-child' => '<module>/rbac-role-child/index',


];