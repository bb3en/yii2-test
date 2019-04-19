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
class BaseAsset extends AssetBundle
{
    public $sourcePath = '@app/assets/plugins';
    public $css = [
        'css/dataTables.bootstrap4.min.css',
        'sb-admin/css/sb-admin-2.min.css',
        'sb-admin/vendor/fontawesome-free/css/all.min.css',
        'css/site.css',
    ];
    public $js = [
        'sb-admin/vendor/jquery/jquery.min.js',
        'sb-admin/vendor/bootstrap/js/bootstrap.bundle.js',
        'sb-admin/vendor/jquery-easing/jquery.easing.min.js',
        'sb-admin/js/sb-admin-2.min.js',
        'sb-admin/vendor/chart.js/Chart.min.js',
        'js/jquery.dataTables.min.js',
        'js/dataTables.bootstrap4.min.js',
        'js/moment-with-locales.js',
    ];

    public $depends = [
        'app\bundles\AppAsset',      
    ];
}
