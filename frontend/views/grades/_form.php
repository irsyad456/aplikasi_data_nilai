<?php

use frontend\models\Students;
use frontend\models\Subjects;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Grades $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="grades-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'student_id')->dropDownList(
        ArrayHelper::map(Students::find()->all(), 'id', 'nama'),
        ['prompt' => 'Pick A Student']
    ) ?>

    <?= $form->field($model, 'subject_id')->dropDownList(
        ArrayHelper::map(Subjects::find()->all(), 'id', 'nama'),
        ['prompt' => 'Pick A Subject']
    ) ?>

    <?= $form->field($model, 'jenis_nilai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nilai')->textInput(['type' => 'number']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>