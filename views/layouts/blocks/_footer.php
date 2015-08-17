<?php
	use yii\Helpers\Html;
?>
<footer class="ui footer">
    <div class="ui container">
        <p class="pull-left">&copy; <?php echo HTML::a(Yii::$app->params['profile']['brand'], Yii::$app->params['profile']['url'], array('title'=>Yii::$app->params['profile']['brand']));?>&nbsp;<?php echo date('Y') ;?></p>

        <p class="pull-right"><?php echo Yii::powered(); ?></p>
    </div>
</footer>
