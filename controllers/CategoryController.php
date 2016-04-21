<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\Category;

class CategoryController extends \yii\web\Controller
{

    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => [ 'create', 'delete' ],
                'rules' => [
                    [
                        'actions' => [ 'create', 'delete' ],
                        'allow' => true,
                        'roles'=>['@'],
                    ]
                ]
            ],
        ];
    }

    public function actionIndex()
    {
        //Create Query
        $query = Category::find();


        //Create Pagination
        $pagination = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $query->count(),
        ]);

        //Create Categories
        $categories = $query->orderBy('name')
                        ->offset($pagination->offset)
                        ->limit($pagination->limit)
                        ->all();

        return $this->render('index',[
            'categories' => $categories,
            'pagination' => $pagination,
        ]);
    }

    public function actionCreate()
    {
        $category = new Category();

        if ($category->load(Yii::$app->request->post())) {

            if ($category->validate()) { //validate input
                $category->save(); //save record
                Yii::$app->getSession()->setFlash('success','Category '. $category->name .' added'); //set flash mesage
                return $this->redirect('index.php?r=category/index');
            }
        }

        return $this->render('create', [
            'model' => $category,
        ]);
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

}
