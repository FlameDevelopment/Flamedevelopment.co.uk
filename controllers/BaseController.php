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
  
  public function render($view, $params = [], $context = null)
  {
  	$view = Yii::$app->params['theme']['viewDirectory'].'/'.$view;
  	return parent::render($view, $params, $context);
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
							'url'=>'/services/website-development',
							'label'=>'Website Development',
							'icon'=>'globe',
							'active'=>((strpos(Yii::$app->request->url, '/website-development')!==false)?true:false)
						],
						[
							'url'=>'/services/mobile-applications',
							'label'=>'Mobile Applications',
							'icon'=>'tablet',
							'active'=>((strpos(Yii::$app->request->url, '/mobile-applications')!==false)?true:false)
						],
						[
							'url'=>'/services/hosting',
							'label'=>'Hosting',
							'icon'=>'server',
							'active'=>((strpos(Yii::$app->request->url, '/hosting')!==false)?true:false)
						],
						[
							'url'=>'/services/design',
							'label'=>'Design',
							'icon'=>'paint brush',
							'active'=>((strpos(Yii::$app->request->url, '/design')!==false)?true:false)
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
