<?php

namespace app\controllers;

use Yii;
use app\models\Event;
use app\models\EventSearch;
use app\models\GuestEvent;
use app\models\Guest;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EventController implements the CRUD actions for Event model.
 */
class EventController extends Controller
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
     * Lists all Event models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Event model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $registrants = Event::find()
            ->joinWith('attendees')
            ->where(['events_id' => $id])
            ->all();
        

        return $this->render('view', [
            'model' => $this->findModel($id),
            'registrants' => $registrants ?? []
        ]);
    }

    /**
     * Creates a new Event model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Event();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Event model.
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
     * Deletes an existing Event model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {  

        $request = Yii::$app->request->post()['id'] ?? $id;
        $check = GuestEvent::findOne(['events_id' => $request]);
        if(!$check) {
            $this->findModel($id)->delete();


            if(!isset(Yii::$app->request->post()['id']))
            {
                return $this->redirect(['index']);
            }

            return json_encode([
                'data' => 'success',
                'status' => 200
            ]);
        }

        return json_encode([
            'data' => 'error',
            'status' => 422
        ]);
    }



    public function actionExport($id) {

        $event = $this->findModel($id);

        $file = \Yii::createObject([
            'class' => 'codemix\excelexport\ExcelFile',
            'sheets' => [
                'Users' => [
                    'data' => (new \yii\db\Query())
                        ->select(['guests.firstname', 'guests.lastname', 'guests.email', 'guests.number', 'guests.gender', 'guests.address'])
                        ->from('guests_events')
                        ->join('LEFT JOIN', 'guests', 'guests.id = guests_events.guests_id')
                        ->where(['guests_events.events_id' => $id])
                        ->all(),
                    'titles' => ['First Name', 'Last Name', 'Email', 'Number', 'Gender', 'Address'],
                ],
            ]
        ]);
        $file->send($event->name.' Registrants.xlsx');

    }

    /**
     * Finds the Event model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Event the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Event::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
}
