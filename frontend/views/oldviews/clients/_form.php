<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Clients $model */
/** @var yii\widgets\ActiveForm $form */
?>

<?php $form = ActiveForm::begin(); ?>
<div class="clients-form">

    <div class="x_panel">


        <?= $form->field($model, 'nama_client')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'alamat_client')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'telp_client')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
        </div>

        <div class="ln_solid"></div>
        <div class="item form-group">
            <?= Html::a('Cancel', ['clients/index'], ['class' => 'btn btn-primary']) ?>
            <button class="btn btn-warning" type="reset">Reset</button>
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

    </div>

</div>
<?php ActiveForm::end(); ?>