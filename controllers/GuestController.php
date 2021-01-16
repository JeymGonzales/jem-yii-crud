<?php

namespace app\controllers;

use Yii;
use app\models\Guest;
use app\models\GuestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Event;
use app\models\GuestsEvents;

/**
 * GuestController implements the CRUD actions for Guest model.
 */
class GuestController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Guest models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GuestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Guest model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Guest model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionRegistration()
    {
        $model = new Guest();
        $events = Event::find()->all();
        $guestEvents = new \app\models\GuestEvent;
        $request = Yii::$app->request->post();

        if ($model->load($request) && $guestEvents->load($request)) {

            $model->save();
            $this->guestEventCreate($model->id, $request['events_id']);
            

            return $this->redirect(['view', 'id' => $model->id]);
        }
        
        return $this->render('create', [
            'model' => $model,
            'events' => $events,
            'guestEvents' => $guestEvents
        ]);
    }
    /**
     * Updates an existing Guest model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Guest model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        \app\models\GuestEvent::deleteAll(['guests_id' => $id]);
        

        return $this->redirect(['index']);
    }

    /**
     * Finds the Guest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Guest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Guest::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function guestEventCreate($id, $events) : void
    {  

        foreach($events as $eventId) {
            $guestEvent = new \app\models\GuestEvent;
            $guestEvent->guests_id = $id;
            $guestEvent->events_id = $eventId;
            $guestEvent->save();
        }
    }
}
