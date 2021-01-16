<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<div class="event-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger deleteRecord',
            'id' => $model->id
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'location',
            'date',
        ],
    ]) ?>
    <h1> Registrants </h1> 
    <p><?= Html::a('Export', ['export', 'id' => $model->id], ['class' => 'btn btn-primary']) ?></p>
    <table class="table table-bordered table-striped datatable">
        <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Number</th>
                <th>Gender</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($registrants)): ?>
            <?php foreach($registrants[0]->attendees as $attendees): ?>
            
            <tr data-edit="{{ URL::to('admin/articles/'.$article->id.'/edit') }}" class="tr-cursor"> 
                <td>
                    <?=$attendees->firstname?>
                </td>
                <td>
                    <?=$attendees->lastname?>
                </td>
                <td>
                    <?=$attendees->email?>
                </td>
                <td>
                    <?=$attendees->number?>
                </td>
                <td>
                    <?=$attendees->gender?>
                </td>
                <td>
                    <?=$attendees->address?>
                </td>
            </tr>
            <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</div>
