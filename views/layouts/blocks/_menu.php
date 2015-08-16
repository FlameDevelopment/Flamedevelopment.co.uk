<div class="ui inverted stackable menu">
  <div class="ui container">
    <div class="header item" href="#">
      <img src="/images/logo-ico.png" class="logo">
      &nbsp;
      <?= Yii::$app->params['site']['name'] ?>
    </div>
    <?php foreach($this->params['menu']->items as $item):?>
	    <a class="item" href="<?= $item->url?>">
	    	<?php if(isset($item->icon) && $item->icon>""):?>
	    		<i class="large <?=$item->icon?> icon"></i>
	    	<?php endif;?>
	    	<?= $item->label ?>
	    </a>
    <?php endforeach;?>
    
    <div class="right menu">
    <div class="item">
      <div class="ui action left icon input">
        <i class="search icon"></i>
        <input type="text" placeholder="Search">
        <button class="ui button">Submit</button>
      </div>
    </div>
    <a class="item">Link</a>
  </div>
  </div>
</div>
