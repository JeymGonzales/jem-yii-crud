<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Event', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'location',
            'date',
            'status',

            ['class' => 'yii\grid\ActionColumn', 'template'=>'{view} {update} {delete} {show}',

            'buttons'=>[

              'show' => function ($url, $model) {
                    $label = 'Inactive';
                    if($model->status == 1) {
                        $label = 'Active';
                    }

                    return Html::a($label, $url, [
                        'title' => Yii::t('yii', 'Show/Hide Event'),
                    ]);                                
                }
            ],
        ],
        ],
    ]); ?>

    


</div>
<script>
    
</script>