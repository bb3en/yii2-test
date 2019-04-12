<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use app\assets\AppAsset;

/**
 * Main application asset bundle.
 *
 * @author Lanmor Yang <Lanmor.Yang@adgeek.com.tw>
 * @version 0.0.1
 */
class RbacAsset extends AppAsset
{

    public $css = [

    ];
    public $js = [
        'js/share.js',
        'js/rbac/assignment.js',
        'js/rbac/permission.js',
        'js/rbac/role-child.js',
        'js/rbac/role.js',
    ];

}
