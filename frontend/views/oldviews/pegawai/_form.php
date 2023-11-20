<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Pegawai $model */
/** @var yii\widgets\ActiveForm $form */
?>
<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-6 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Data akun User</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?= $form->field($user, 'username')->textInput() ?>

                <?php if ($user->isNewRecord) {
                    echo $form->field($user, 'password_hash')->passwordInput();
                } ?>
                <div class="form-group field-is_admin">
                    <label class="control-label"> Checklist jika usernya adalah admin</label><br>
                    <?= Html::checkbox('is_admin', false) ?>
                    <div class="help-block"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Biodata</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <?= $form->field($model, 'tanggal_lahir')->widget(
                        DatePicker::class,
                        [
                            'pickerIcon' => '<i class="fa fa-calendar"></i>',
                            'layout' => '{picker}{input}',
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd'
                            ]
                        ]
                    ) ?>
                </div>

                <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <?= $form->field($model, 'status')->dropDownList(
                        [
                            'Belum Menikah' => 'Belum Menikah',
                            'Sudah Menikah' => 'Sudah Menikah',
                        ],
                        ['prompt' => '']
                    ) ?>
                </div>

                <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <?= $form->field($model, 'no_telp')->textInput() ?>
                </div>

                <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <?= $form->field($model, 'tgl_bergabung')->widget(
                        DatePicker::class,
                        [
                            'pickerIcon' => '<i class="fa fa-calendar"></i>',
                            'layout' => '{picker}{input}',
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd'
                            ]
                        ]
                    ) ?>
                </div>

                <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <?= $form->field($model, 'file')->fileInput(); ?>
                </div>

                <div class="row"></div>
                <div class="ln_solid"></div>

                <div class="form-group">
                    <div class="col-md-9 col-sm-9  offset-md-3">
                        <?= Html::a('Cancel', ['pegawai/index'], ['class' => 'btn btn-primary']) ?>
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>