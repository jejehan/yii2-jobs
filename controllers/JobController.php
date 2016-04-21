<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\Job;

class JobController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create','edit','delete'],
                'rules' =>[
                    [
                        'actions' => ['create', 'edit', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
            ],
            'verbs' => [
                'class' => \yii\filters\VerbFilter::className(),
                'actions' => [
                    'delete' => ['post','delete']
                ]
            ],
        ];

    }

    public function actionIndex()
    {
        //Job Query
        $query = Job::find();

        //Paggination
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        //Job Pagination
        $jobs = $query->orderBy('id')
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();

        return $this->render('index',[
            'jobs' => $jobs,
            'pagination' => $pagination,
        ]);
    }

    public function actionDetail( $id ){

        $job = Job::findOne($id);

        return $this->render('detail',[
            'job' => $job,
        ]);
    }

    public function actionCreate()
    {
        $job = new Job();

        if ($job->load(Yii::$app->request->post())) {
            if ($job->validate()) { //validate job post

                $job->save(); //save record

                //check if job is Publish
                if ($job->is_publish == 1) {
                    Yii::$app->getSession()->setFlash('success',' Job '. $job->title .' Publish! ');
                }

                return $this->redirect('index.php?r=job/index');
            }
        }

        return $this->render('create', [
            'job' => $job,
        ]);
    }

    public function actionEdit($id)
    {
        $job = Job::findOne($id);

        if ( Yii::$app->user->identity->id !== $job->user_id ) {
            # code...
            return $this->redirect('index.php?r=job/index');
        }

        if ($job->load(Yii::$app->request->post())) {
            if ($job->validate()) { //validate job post

                $job->save(); //save record

                //check if job is Publish
                Yii::$app->getSession()->setFlash('success',' Job '. $job->title .' edited! ');

                return $this->redirect('index.php?r=job/detail&id='.$job->id);
            }
        }

        return $this->render('edit', [
            'job' => $job,
        ]);
    }

    public function actionDelete( $id )
    {
        $job = Job::findOne( $id );

        if ( Yii::$app->user->identity->id !== $job->user_id ) {
            # code...
            return $this->redirect('index.php?r=job/index');
        }

        $job->delete();
        Yii::$app->getSession()->setFlash('success',' Job '. $job->title .' deleted! ');

        return $this->redirect('index.php?r=job/index');

    }

}
