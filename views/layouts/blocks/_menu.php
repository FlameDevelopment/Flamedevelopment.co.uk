<nav class="ui inverted stackable menu">
  <div class="ui container">
    <div class="header item">
      <img src="/images/logo-ico.png" class="logo" />
      &nbsp;
      <?= Yii::$app->params['profile']['brand'] ?>
    </div>
    <?php foreach($this->params['menu']->items as $item):?>
    	<?php if($item->items):?>
        <div class="ui dropdown item<?=(($item->active)?' active':'')?>">
			  	<?php if(isset($item->icon) && $item->icon>""):?>
			  		<i class="large <?=$item->icon?> icon"></i>
			  	<?php endif;?>
			  	<?= $item->label ?>
			  	<i class="dropdown icon"></i>
		  		<div class="menu ui transition hidden">
		  			<?php foreach($item->items as $subItem):?>
		  				<a class="item<?=(($subItem->active)?' active':'')?>" href="<?= Yii::$app->urlManager->createUrl($subItem->url)?>" title="<?= $subItem->label?>">
								<?php if(isset($subItem->icon) && $subItem->icon>""):?>
									<i class="large <?=$subItem->icon?> icon"></i>
								<?php endif;?>
								<?= $subItem->label; ?>
							</a>
		  			<?php endforeach;?>
		  		</div>
			  </div>
    	<?php else:?>
			  <a class="item<?=(($item->active)?' active':'')?>" href="<?= Yii::$app->urlManager->createUrl($item->url)?>" title="<?= $item->label ?>">
			  	<?php if(isset($item->icon) && $item->icon>""):?>
			  		<i class="large <?=$item->icon?> icon"></i>
			  	<?php endif;?>
			  	<?= $item->label ?>
			  </a>
			<?php endif;?>
    <?php endforeach;?>
    
    <div class="right menu">
		  <div class="item">
		    <div class="ui action left icon input">
		      <i class="search icon"></i>
		      <input type="text" placeholder="Search">
		      <button class="ui red button">Submit</button>
		    </div>
		  </div>
		  
		  <div class="item">
		  	<div class="ui grid">
		  		<div class="row">
						<i class="phone icon"></i>
						<?= Yii::$app->params['contact']['telephone']['general'] ?>
						<div class="row">
							<i class="envelope icon"></i>
						<?= Yii::$app->params['contact']['email']['general'] ?>
						</div>
					</div>
				</div>
		  </div>
		  
		</div>
  </div>
</nav>
