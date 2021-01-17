<?php 
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Guest;

class AdminController extends Controller {

    public function actionIndex() {
        return $this->render('index', ['guests' => Guest::find()->all()]);
    }
}

?>