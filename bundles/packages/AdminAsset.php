<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\bundles\packages;

use yii\web\AssetBundle;
/**
 * Main application asset bundle.
 *
 * @author Lanmor Yang <Lanmor.Yang@adgeek.com.tw>
 * @version 0.0.1
 */
class AdminAsset extends AssetBundle
{
    public $sourcePath = '@app/assets/packages/admin';
  
    public $js = [
        'share.js',
        'assignment/js/js.assignment.js',
        'permission/js/js.permission.js',
        'rolechild/js/js.rolechild.js',
        'role/js/js.role.js',
    ];

    public $depends = [
        'app\bundles\BaseAsset',      
    ];
 
}
