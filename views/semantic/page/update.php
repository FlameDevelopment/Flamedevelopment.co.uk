<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Page */

$this->title = Yii::t('page', 'Update {modelClass}: ', [
    'modelClass' => 'Page',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('page', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('page', 'Update');
?>
<div class="page-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    
    <?php
        $content = $this->render(
         Yii::$app->params['theme']['viewDirectory'].
         Yii::$app->params['theme']['snippetDirectory'].
         '/_column', [
            'model' => $model,
            'columnSize'=>'sixteen',
            'content'=>'test1'
        ]);
    ?>
    
     <?= $this->render(
         Yii::$app->params['theme']['viewDirectory'].
         Yii::$app->params['theme']['snippetDirectory'].
         '/_column', [
            'model' => $model,
            'columnSize'=>'sixteen',
            'content'=>$content
         ]) ?>

</div>
