<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\SlickAsset;
use app\assets\SemanticAsset;
use app\assets\CustomAsset;
use app\assets\HandlebarsAsset;
use app\assets\Html2JsonAsset;


AppAsset::register($this);
SlickAsset::register($this);
SemanticAsset::register($this);
HandlebarsAsset::register($this);
Html2JsonAsset::register($this);
CustomAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo Html::csrfMetaTags(); ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head(); ?>
</head>
<body>
<?php $this->beginBody(); ?>

<?= $this->render('/layouts/blocks/_menu', array()) ?>

    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
<div class="ui container main-content">
    <?= $content ?>
</div>

<?= $this->render('/layouts/blocks/_footer', array()) ?>



<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
