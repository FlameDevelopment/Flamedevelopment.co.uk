<?php

namespace app\controllers;

use yii\web\Controller;
use FlameDevelopment\Menu\MenuService;

class BaseController extends Controller
{
	public $menu = array();

  public function init()
  {
  	$this->view->params['menu'] = $this->menu;
    parent::init();
  }
}
