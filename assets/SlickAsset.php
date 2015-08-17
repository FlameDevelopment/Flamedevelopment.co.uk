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
class SlickAsset extends AssetBundle
{
    public $sourcePath = '@app/vendor/soerenkroell/composer-slick/slick/';
    public $css = [
    		'slick.css',
    		'slick-theme.css',
    ];
    public $js = [
    		'slick.min.js'
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
