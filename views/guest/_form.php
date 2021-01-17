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

    <?php
        if($model->id)
        {
            $form = ActiveForm::begin();
        } else {
            $form = ActiveForm::begin([
                'action' => [$model->id ? Yii::$app->request->url : '/'],
                'options' => ['id' => $model->id ? '' : 'jsForm']
            ]); 
        }
        
    ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput() ?>
    
    <label class="control-label" for="guest-address">Event(s) to Attend</label>

    <?php if(isset($eventList)): ?>
    <?= $form->field($guestEvents,'events_id')->checkboxList($eventList,

    ['item' => function($index, $label, $name, $checked, $value) use ($userEvents) {
        $checked = '';
        if(in_array($value, $userEvents))
        {
            $checked = 'checked';
        }
        return '<div class="checkbox">
            <label>
                <input type="checkbox" name="events_id[]" value="'.$value.'" '.$checked.'  >'.$label.'
            </label>
        </div>';
    }])->label(FALSE); ?>
    <?php endif ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success jsSubmit']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
