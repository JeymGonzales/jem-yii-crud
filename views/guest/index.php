<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GuestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Guests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guest-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'firstname',
            'lastname',
            'email:email',
            'number',
            'street',
            'city',
            'country',
            'zip',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
