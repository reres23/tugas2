<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web'; //langsung dari folder web
    public $css = [
    //ambil resource css
        'themes/AdminLTE2/bootstrap/css/bootstrap.min.css',
        'font-awesome-4.5.0/css/font-awesome.min.css',
         'ionicons-2.0.1/css/ionicons.min.css',
         'themes/AdminLTE2/dist/css/AdminLTE.min.css',
         'themes/AdminLTE2/dist/css/skins/_all-skins.min.css',
         'css/site.css', //untuk memperkecil ukuran tanggal mengambil dari folder web

    ];
    public $js = [
    // 'themes/AdminLTE2/plugins/jQuery/jQuery-2.1.4.min.js',
    'themes/AdminLTE2/bootstrap/js/bootstrap.min.js',
    'themes/AdminLTE2/plugins/slimScroll/jquery.slimscroll.min.js',
    'themes/AdminLTE2/plugins/fastclick/fastclick.js',
    'themes/AdminLTE2/dist/js/app.min.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
