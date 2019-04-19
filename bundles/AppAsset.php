<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\bundles;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Lanmor <lanmor.yang@adgeek.com.tw
 * @since 0.0.1
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $depends = [
        'yii\bootstrap4\BootstrapAsset',      
    ];
}
