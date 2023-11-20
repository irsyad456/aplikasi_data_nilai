<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\PerjalananProyekSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="perjalanan-proyek-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pegawai_id') ?>

    <?= $form->field($model, 'proyek_id') ?>

    <?= $form->field($model, 'nama_perjalanan') ?>

    <?= $form->field($model, 'desk_perjalanan') ?>

    <?php // echo $form->field($model, 'modal') ?>

    <?php // echo $form->field($model, 'pengeluaran') ?>

    <?php // echo $form->field($model, 'status_perjalanan') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
