<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;

class BaseController extends Controller
{
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            $allowedActions = ['login', 'logout'];

            if (!in_array($action->id, $allowedActions) && Yii::$app->user->isGuest) {
                Yii::$app->session->setFlash('isGuest', 'Please log in first.');
                $this->redirect(['site/login']);
                Yii::$app->end();
            }

            return true;
        }

        return false;
    }
}
