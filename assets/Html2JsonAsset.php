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
class Html2JsonAsset extends AssetBundle
{
    public $sourcePath = '@app/vendor/bower/';
    
    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );
    public $css = [
    ];
    public $js = [
        'Pure-JavaScript-HTML5-Parser/htmlparser.js',
    		'html2json/lib/html2json.js'
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
