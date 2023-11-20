<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Reset Password';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if (Yii::$app->session->hasFlash('success')) : ?>
    <div class="alert alert-success alert-dismissible " role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <strong><?= Yii::$app->session->getFlash('success') ?></strong>
    </div>
<?php endif; ?>
<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <br />
        <?php $form = ActiveForm::begin(); ?>
        <div class="form-horizontal form-label-left">
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="userresetpassword-userid">Pilih User <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?= $form->field($model, 'userId')->dropDownList(
                        \yii\helpers\ArrayHelper::map($users, 'id', 'username'),
                        ['class' => 'form-control col-md-7 col-xs-12', 'prompt' => '']
                    )->label(false) ?>
                </div>
            </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="userresetpassword-password">Password <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?= $form->field($model, 'password')->passwordInput(
                        ['class' => 'form-control col-md-7 col-xs-12']
                    )->label(false) ?>
                </div>
            </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="userresetpassword-confirmpassword">Konfirmasi Password <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?= $form->field($model, 'confirmPassword')->passwordInput(
                        ['class' => 'form-control col-md-7 col-xs-12']
                    )->label(false) ?>
                </div>
            </div>
            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <?= Html::resetButton('Reset', ['class' => 'btn btn-warning']) ?>
                    <?= Html::submitButton('Reset Password', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>