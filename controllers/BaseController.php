<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Html;
use \FlameDevelopment\Modules\Menu\MenuService;

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
  	$this->view->params['menu'] = MenuService::getMenu($items);
  }
  
  public function buildSnippet($snippet)
  {
    $content = "";
    if($snippet->countChildren()>0)
    {
      $content = "";
      foreach($snippet->getChildren() as $child)
      {
        $content.= $this->buildSnippet($child);
      }
    }
    else
    {
      $content = $snippet->getContent();
    }
    $tag = Html::tag(
      $snippet->getElement(), 
      $content,
      $snippet->getAttributes()
    );

    return $tag;
  }
  
  public function displayElements($elements)
  {
      foreach($elements as $element)
      {
          echo self::displayElement($element);
      }
  }
  
  public function displayElement($element)
  {
      switch($element)
      {
          case 'Grid':
                self::printGrid($element);
              break;
          
          case 'Row':
                self::printRow($element);
              
              break;
          
          case 'Column':
                self::printColumn($element);
              
              break;
          
          default:
              
              break;
      }
     
  }
  
  private function printGrid($element)
  {
     echo Html::beginTag('div', array('class'=>'ui grid'));
        echo Html::beginTag('div', array('class'=>'row'));
            echo Html::beginTag('div', array('class'=>'sixteen wide column'));
                echo Html::beginTag($element->getElementName(), array('class'=>'ui raised segment'));
                    echo $element; 
                    if($element->countChildren()>0)
                    {
                        foreach($element->getChildren() as $child)
                        {
                            self::printChildElements($child);
                        }
                    }
                    echo Html::beginTag('div', array('class'=>'element-children'));
                    echo Html::endTag('div');
                    echo '<br />';
                    echo self::printNextSelect($element->getChildrenAsSelect());
                echo Html::endTag($element->getElementName());
            echo Html::endTag('div');
        echo Html::endTag('div');
     echo Html::endTag('div');
  }
  
  private function printRow($element)
  {
     echo Html::beginTag($element->getElementName(), $element->getAttributes());
            echo Html::beginTag('div', array('class'=>'sixteen wide column'));
        echo Html::beginTag('div', array('class'=>'ui raised segment'));
            echo $element; 
     echo Html::beginTag('div', array('class'=>'ui grid'));
        echo Html::beginTag('div', array('class'=>'row'));
            if($element->countChildren()>0)
            {
                foreach($element->getChildren() as $child)
                {
                    self::printChildElements($child);
                }
            }
            echo Html::beginTag('div', array('class'=>'element-children'));
            echo Html::endTag('div');    
        echo Html::endTag('div');
        echo Html::endTag('div');
            echo '<br />';
            echo self::printNextSelect($element->getChildrenAsSelect());
        echo Html::endTag('div');
        echo Html::endTag('div');
     echo Html::endTag($element->getElementName()); 
  }
  
  private function printColumn($element)
  {
      
     echo Html::beginTag($element->getElementName(), $element->getAttributes());
        echo Html::beginTag($element->getElementName(), array('class'=>'ui raised segment'));
            echo $element; 
            if($element->countChildren()>0)
            {
                
                foreach($element->getChildren() as $child)
                {
                    self::printChildElements($child);
                }
            }
            echo Html::beginTag('div', array('class'=>'element-children'));
            echo Html::endTag('div');
            echo '<br />';
            echo self::printNextSelect($element->getChildrenAsSelect());
        echo Html::endTag($element->getElementName());
     echo Html::endTag($element->getElementName());
  }
  
  private function printElement($element)
  {
      
  }
  
  public function printChildElements($element)
  {
      self::displayElement($element);
  }
  
  public function printNextSelect($children)
  {
      return Html::dropDownList('element_dropdown', '', $children, array('prompt'=>'--Add Item--', 'class'=>'element_dropdown', 'onchange'=>'chooseElement(this);'));
  }
      
}
