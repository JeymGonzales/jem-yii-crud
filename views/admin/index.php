<?php 

use yii\helpers\Html;
use yii\helpers\Url;

$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-index">
    <div class="body-content">
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
    <select class="js-example-basic-single form-control" name="state" id="guestLink">
        <?php foreach($guests as $guest) : ?>
        <option value="<?=$guest->id?>"> <?=$guest->firstname?> <?=$guest->lastname?> </option>
        <?php endforeach ?>

    </select>

</div>


<script>


// $("#guestLink").on("select2:select", function (e) {
//     console.log($(this))
// });

$(".js-example-basic-single").select2({selectOnClose: true}).on("select2:select", function(evt) {
    window.location.href = `/guest/view?id=${evt.params.data.id}`

});


</script>
