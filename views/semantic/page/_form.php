<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ui form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->errorSummary($model); ?>
    <div class="ui field">
        <div class="ui labeled input">
            <div class="ui label">
                <?= $model->getAttributeLabel('title') ?>
            </div>
            <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label(false) ?>
        </div>
    </div>

    <div class="ui field form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('page', 'Create') : Yii::t('page', 'Update'), ['class' => $model->isNewRecord ? 'ui green button' : 'ui blue button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
