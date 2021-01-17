<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\web\JqueryAsset;
/* @var $this yii\web\View */
/* @var $model app\models\Guest */
/* @var $form yii\widgets\ActiveForm */

    foreach($events as $event) {

        $dateTime = explode(' ', $event->date);

        
        
        $eventList[$event->id] = ['name' => $event->name,
            'location' => $event->location,
            'date' => $dateTime[0],
            'time' => $dateTime[1]
        ];
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
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'gender')->dropDownList(['Male' => 'Male', 'Female' => 'Female'],['prompt'=>'Select Option']); ?>

            <?= $form->field($model, 'street')->textInput() ?>

            <?= $form->field($model, 'city')->textInput() ?>

            <?= $form->field($model, 'country')->textInput() ?>

            <?= $form->field($model, 'zip')->textInput() ?>
            
            
            <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success jsSubmit']) ?>
            </div>
        </div>
        
        <div class="col-md-6">
            <?php if(isset($eventList)): ?>
            <label class="control-label" for="guest-address">Event(s) to Attend</label>
            <?= $form->field($guestEvents,'events_id')->checkboxList($eventList,

            ['item' => function($index, $data, $name, $checked, $value) use ($userEvents, $eventList) {
                $checked = '';
                if(in_array($value, $userEvents))
                {
                    $checked = 'checked';
                }
                
                return '<div class="card" style="border: 1px solid">
                <div class="card-body" style="margin: 8px" >
                    <label>
                        <input type="checkbox" name="events_id[]" value="'.$value.'" '.$checked.'  ><label style="margin-left: 8px">'.$data['name'].'</label>
                    </label>
                    <p class="card-text">Location: '.$data['location'].' </p>
                    <p class="card-text">Date: '.$data['date'].' </p>
                    <p class="card-text">Time: '.$data['time'].' </p>
                </div>
              </div> <br>';
            }])->label(FALSE); ?>
            <?php endif ?>
        </div>
        



        <?php ActiveForm::end(); ?>
    </div>

</div>


<!-- <div class="checkbox" style="border:1px solid">
                    
                        <label>
                            <input type="checkbox" name="events_id[]" value="'.$value.'" '.$checked.'  >'.$label.'
                            <p> s</p>
                        </label>

                </div> -->