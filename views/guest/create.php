<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Guest */
$this->title = 'Event Registration';
// $this->params['breadcrumbs'][] = ['label' => 'Guests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guest-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'events' => $events,
        'guestEvents' => $guestEvents,
        'userEvents' => $userEvents
    ]) ?>

</div>
