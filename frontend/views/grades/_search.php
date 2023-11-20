<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\GradesSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="grades-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'student_id') ?>

    <?= $form->field($model, 'subject_id') ?>

    <?= $form->field($model, 'jenis_nilai') ?>

    <?= $form->field($model, 'nilai') ?>

    <?php // echo $form->field($model, 'created_at') 
    ?>

    <?php // echo $form->field($model, 'updated_at') 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>