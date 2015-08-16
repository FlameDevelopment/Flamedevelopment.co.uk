<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use FlameDevelopment\Menu\MenuService;

class BaseController extends Controller
{
	public $menu = array();

  public function init()
  {
  	$this->getMenu();
    parent::init();
  }
  
  public function getMenu()
  {
  	$items = [
  		[
  			'url'=>'/',
  			'label'=>'Home',
  			'icon'=>'home',
  			'active'=>(Yii::$app->request->url=="/")?true:false
  		],
  		
  		[
  			'url'=>'/services',
  			'label'=>'Services',
  			'icon'=>'plug',
  			'active'=>((strpos(Yii::$app->request->url, '/services')!==false)?true:false),
  			'items'=>[
						[
							'url'=>'/portfolio',
							'label'=>'Portfolio',
							'icon'=>'paint brush',
							'active'=>((strpos(Yii::$app->request->url, '/portfolio')!==false)?true:false)
						],
  			
  			]
  		],
  		[
  			'url'=>'/contact',
  			'label'=>'Contact',
  			'icon'=>'comment',
  			'active'=>((strpos(Yii::$app->request->url, '/contact')!==false)?true:false)
  		]
  	];
  	$this->view->params['menu'] = \FlameDevelopment\Menu\MenuService::getMenu($items);
  }
}
