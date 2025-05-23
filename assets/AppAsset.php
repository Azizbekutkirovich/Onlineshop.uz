<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
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
        "css/core-style.css",
        "css/style.css"
    ];
    public $js = [
        "js/jquery/jquery-2.2.4.min.js",
        "js/popper.min.js",
        "js/bootstrap.min.js",
        "js/plugins.js",
        "js/active.js",
        'js/app.js'
    ];
    public $depends = [
        // 'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}
