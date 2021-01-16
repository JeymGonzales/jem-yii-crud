<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\web\JqueryAsset;
/* @var $this yii\web\View */
/* @var $model app\models\Guest */
/* @var $form yii\widgets\ActiveForm */

    foreach($events as $event) {
        $eventList[$event->id] = $event->name;
    }

?>

<div class="guest-form">

    <?php $form = ActiveForm::begin([
        'action' => ['/'],
        'options' => ['id' => 'jsForm']
    ]); ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput() ?>
    <label class="control-label" for="guest-address">Event(s) to Attend</label>
    <?= $form->field($guestEvents,'events_id')->checkboxList($eventList,
    ['item' => function($index, $label, $name, $checked, $value) {
        return '<div class="checkbox">
            <label>
                <input type="checkbox" name="events_id[]" value="'.$value.'">'.$label.'
            </label>
        </div>';
    }])->label(FALSE); ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success jsSubmit']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
