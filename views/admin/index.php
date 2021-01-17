<?php 

use yii\helpers\Html;
use yii\helpers\Url;

$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-index">
    <div class="row">
        <div class="body-content">
            <div class="row">
                <div class="col-lg-8">
                    <h1>Search User</h1>
                    <p>
                    <select class="jsSelect form-control" name="state" id="guestLink">
                        <option></option>
                        <?php foreach($guests as $guest) : ?>
                        <option value="<?=$guest->id?>"> <?=$guest->firstname?> <?=$guest->lastname?> </option>
                        <?php endforeach ?>
                    </select>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <p><?= Html::a('Manage Guests', ['guest/index'], ['class' => 'btn btn-default']) ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                <p><?= Html::a('Manage Events', ['event/index'], ['class' => 'btn btn-default']) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
$(".jsSelect").select2({
    selectOnClose: true,
    placeholder: "Select a user",
    }).on("select2:select", function(evt) {
        window.location.href = `/guest/view?id=${evt.params.data.id}`
    });
</script>
