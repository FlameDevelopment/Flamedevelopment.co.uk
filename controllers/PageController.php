<?php

namespace app\controllers;

use Yii;
use app\models\Page;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\controllers\BaseController;

use FlameDevelopment\Theme\ThemeService;

/**
 * PageController implements the CRUD actions for Page model.
 */
class PageController extends BaseController
{
    private $themeService;
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Page models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Page::find(),
        ]);

        return $this->render('page/index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Page model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('page/view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Page model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Page();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('page/create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Page model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $this->themeService = new ThemeService('SemanticUI');
            $availableElements = $this->themeService->getAvailableElements();
            $existingElements = $this->getExistingElements();
            $currentContent = "";
            foreach($existingElements as $existingElement)
            {
                $currentContent.= $this->buildSnippet($existingElement);
            }
            return $this->render('page/update', [
                'model' => $model,
                'availableElements' => $availableElements,
                'existingElements'  => $existingElements,
                'currentContent'    => $currentContent
            ]);
        }
    }

    /**
     * Deletes an existing Page model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Page the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Page::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    private function getExistingElements()
    {
        $elements = [
          [
            'element'=>'Grid',
            'attributes'=>  [
              'id'=>'grid-element-1',
              'class'=>[
                'ui',
                'grid',
                'derp'
              ],
            ],
            'content'=>null,
            'children'=>[
              
                [
                  'element'=>'Row',
                  'attributes'=>  [
                    'id'=>'row-element-1'
                  ],
                  'content'=>null,
                  'children'=>[
                        
                      [
                        'element'=>'Column',
                        'attributes'=>  [
                          'id'=>'column-element-1',
                          'size'=>4,
                        ],
                        'content'=>'<p>1</p>',
                        'children'=>[]
                      ],
                      [
                        'element'=>'Column',
                        'attributes'=>  [
                          'id'=>'column-element-2',
                          'size'=>4,
                        ],
                        'content'=>'<p>2</p>',
                        'children'=>[]
                      ],
                      [
                        'element'=>'Column',
                        'attributes'=>  [
                          'id'=>'column-element-3',
                          'size'=>4,
                        ],
                        'content'=>'<p>3</p>',
                        'children'=>[]
                      ],
                      [
                        'element'=>'Column',
                        'attributes'=>  [
                          'id'=>'column-element-4',
                          'size'=>4,
                        ],
                        'content'=>'<p>4</p>',
                        'children'=>[]
                      ]
                  ]
                ]
            ]
          ]
        ];
        
        foreach($elements as $element)
        {
            $elementObjects[] = $this->themeService->buildElement($element['element'], $element);
        }
        
        return $elementObjects;
    }
}
