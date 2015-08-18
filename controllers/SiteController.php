<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
//use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\controllers\BaseController;

use FlameDevelopment\Html\Snippets\SnippetService as Snippet;

class SiteController extends BaseController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
    	$this->view->title = Yii::$app->name;
    	
    	$snippetBuilds = [
    		[
					'element'=>'div',
    			'attributes'=> [
    				'class'=>'ui grid'
    			],
    			'children'=>	[
    				
							[
								'element'=>'div',
								'attributes'=> [
									'class'=>'two column row'
								],
								'children'=>	[
    				
										[
											'element'=>'div',
											'attributes'=> [
												'class'=>'column'
											],
											'children'=>	[
    				
													[
														'element'=>'h2',
														'attributes'=> [
															'class'=>'ui medium header'
														],
														'children'=>	[],
														'content'=>	'Subheading'
													],
    				
													[
														'element'=>'p',
														'attributes'=> [],
														'children'=>	[],
														'content'=>	'Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.'
													]
								
											]
										],
    				
										[
											'element'=>'div',
											'attributes'=> [
												'class'=>'column'
											],
											'children'=>	[
    				
													[
														'element'=>'h2',
														'attributes'=> [
															'class'=>'ui medium header'
														],
														'children'=>	[],
														'content'=>	'Subheading'
													],
    				
													[
														'element'=>'p',
														'attributes'=> [],
														'children'=>	[],
														'content'=>	'Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.'
													]
								
											]
										],
								]
							]
							
    			]
    		]
    	];
    	
    	foreach($snippetBuilds as $params)
    	{
    		$snippets[] = Snippet::getSnippet($params['element'], $params['attributes'], $params['children'], $params['content']);
    	}
      return $this->render('/site/index', array('snippets'=>$snippets));
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
