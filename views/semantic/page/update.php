<?php

use app\controllers\BaseController;
use yii\helpers\Html;
use yii\helpers\Url;


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
    <div id="handlebars"></div>
    <div id="preview" style="display:none;"></div>
   <?php
    
 //BaseController::displayElements($existingElements);
   echo '<hr>';
   ?>

</div>

<div>
    <pre id="layout-debug">
    </pre>
</div>
<script>
    
        var layout = <?php echo json_encode($existingElements, JSON_PRETTY_PRINT);?>;
        var ids = {};
        var highestId = 0;
        function getObjects(obj, key, val) {
            var objects = [];
            for (var i in obj) {
                if (!obj.hasOwnProperty(i)) continue;
                if (typeof obj[i] == 'object') {
                    objects = objects.concat(getObjects(obj[i], key, val));
                } else if (i == key && obj[key] == val) {
                    return obj;
                }
            }
            return objects;
        }
        
        function getObjectValues(obj, key, valueStorage){
            for (var i in obj) {
                if (!obj.hasOwnProperty(i)) continue;
                if (typeof obj[i] == 'object') {
                   getObjectValues(obj[i], key, valueStorage);
                } else if (i == key) {
                    valueStorage[obj[i]] = obj[i];
                }
            }
            //return ids;
        }
        
        function getHighestId(){
            getObjectValues(layout, 'identifier', ids);
            highestId = Object.keys(ids).reduce(function(a, b){ return ids[a] > ids[b] ? a : b });
            return highestId;
        }
        
            var chooseElement = function(selectElement){
                   var element = $(selectElement);
                   var choice = element.val();
                   if(choice>""){
                       $.ajax({
                           type: 'post',
                           url: "<?php echo Url::to('/page/ajaxy');?>",
                           cache:false,
                           data:{
                                'element':choice,
                                'highestId':getHighestId()

                            },
                            success:function(ret){
                                var retArr = JSON.parse(ret);
                                
                                //element.parent().find('.element-children').last().append(html);
                                var ele = getObjects(layout, 'identifier', element.attr('data-id'));
                                if(ele){
                                    ele[0].child.push(retArr['element']);
                                }
                                window.renderHandlebars(layout, 'handlebars', true);
                                $("#preview").html(json2html(layout[0]));
                                $("#layout-debug").html(JSON.stringify(layout, undefined, 2));
                            }
                        });
                   }
            };
   $(document).ready(function(){
            
            window.renderHandlebars(layout, 'handlebars');
            $("#preview").html(json2html(layout[0]));
            $("#layout-debug").html(JSON.stringify(layout, undefined, 2));   
    });
    
    getObjectValues(layout, 'identifier', ids);
  
</script>


<script>

</script>
