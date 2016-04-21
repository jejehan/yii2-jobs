<?php

namespace app\controllers;

use Yii;
use yii\base\Controller;
use app\models\User;

class UserController extends \yii\web\Controller
{
    public function actionLogin()
    {
        return $this->render('login');
    }

    public function actionRegister()
    {
        $user = new User();

        if ( $user->load(Yii::$app->request->post()) && $user->validate() ) {
            $user->save();
            Yii::$app->getSession()->setFlash('success', ' yeah!! You already register, now you can login! ');
            return $this->redirect('index.php');
        }

        return $this->render('register', [
            'user' => $user,
        ]);
    }

}
