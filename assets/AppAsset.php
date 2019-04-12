<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'adminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css',
        // 'adminLTE/bower_components/font-awesome/css/font-awesome.min.css',
        // 'adminLTE/bower_components/Ionicons/css/ionicons.min.css',
        // 'adminLTE/dist/css/AdminLTE.min.css',
        // 'adminLTE/dist/css/skins/_all-skins.min.css',
        // 'adminLTE/bower_components/morris.js/morris.css',
        // 'adminLTE/bower_components/jvectormap/jquery-jvectormap.css',
        // 'adminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
        // 'adminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css',
        // 'adminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
        'css/dataTables.bootstrap4.min.css',
        'css/site.css',
    ];
    public $js = [
        // 'adminLTE/bower_components/jquery/dist/jquery.min.js',
        // 'adminLTE/bower_components/jquery-ui/jquery-ui.min.js',
        // 'adminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js',
        
        // 'adminLTE/bower_components/raphael/raphael.min.js',
        // 'adminLTE/bower_components/morris.js/morris.min.js',
        // 'adminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js',
        // 'adminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        // 'adminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        // 'adminLTE/bower_components/jquery-knob/dist/jquery.knob.min.js',
        // 'adminLTE/bower_components/moment/min/moment.min.js',
        // 'adminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js',
        // 'adminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
        // 'adminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        // 'adminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js',  
        // 'adminLTE/bower_components/fastclick/lib/fastclick.js',  
        // 'adminLTE/dist/js/adminlte.min.js',
        // 'adminLTE/dist/js/pages/dashboard.js', 
        'js/jquery.dataTables.min.js',
        'js/dataTables.bootstrap4.min.js',
        'js/share.js',
        'js/user.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
       
    ];
}
