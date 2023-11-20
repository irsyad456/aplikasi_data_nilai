<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;

$form = ActiveForm::begin() ?>
<div class="col-md-6 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Pilih Pegawai</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <h4>Pilih pegawai yang akan melakukan perjalanan ini</h4>
            <div>
                <?= $form->field($data, 'pegawai_id')->checkboxList(ArrayHelper::map($pegawai, 'pegawai.id', 'pegawai.nama'))->label(false) ?>
            </div>
            <div class="form-group row">
                <div class="col-md-9 offset-md-4">
                    <?= Html::submitButton('Continue', ['class' => 'btn btn-success']) ?>
                    <?= $form->field($model, 'proyek_id')->hiddenInput()->label(false) ?>
                    <?= $form->field($model, 'status_perjalanan')->hiddenInput()->label(false) ?>
                    <?= $form->field($model, 'tgl_perjalanan')->hiddenInput()->label(false) ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $form->end() ?>