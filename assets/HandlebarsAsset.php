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
class HandlebarsAsset extends AssetBundle
{
    public $sourcePath = '@app/node_modules/handlebars/';
    
    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );
    public $css = [
    ];
    public $js = [
    		'dist/handlebars.min.js',
        '/js/handlebars-config.js',
        'lib/handlebars.runtime.js',
      
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
