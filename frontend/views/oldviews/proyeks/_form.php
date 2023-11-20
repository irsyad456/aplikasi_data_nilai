<?php

use backend\models\Pegawai;
use backend\models\Clients;
use backend\models\Proyeks;
use kartik\date\DatePicker;
use kartik\number\NumberControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Proyeks $model */
/** @var yii\widgets\ActiveForm $form */

$kategori = ArrayHelper::map(Proyeks::find()->all(), 'kategori_proyek', 'kategori_proyek');
$list = ArrayHelper::map(Pegawai::find()->all(), 'id', 'nama');
$js = <<< JS
var isDropdown = true;

$('#switch-input-btn').click(function() {
    if (isDropdown) {
        $('#text-input').val('').hide();
        $('#dropdown-input').show();
        $(this).text('Buat Kategori Baru');
        isDropdown = false;
    } else {
        $('#dropdown-input').val('').hide();
        $('#text-input').show();
        $(this).text('Pilih Kategori');
        isDropdown = true;
    }
});

$(document).ready(function() {
    $('#dropdown-input').hide();
});
JS;

$this->registerJs($js);
?>

<?php $form = ActiveForm::begin(); ?>

<div class="proyeks-form">
    <div class="col-md-6 col-sm-12  ">
        <div class="x_panel">

            <label for="proyeks-nama_proyek">Nama Proyek * :</label>
            <?= $form->field($model, 'nama_proyek')->textInput(['maxlength' => true])->label(false) ?>

            <label for="proyeks-desk_proyek">Deskripsi Proyek * :</label>
            <?= $form->field($model, 'desk_proyek')->textarea(['maxlength' => true])->label(false) ?>

            <?= $form->field($model, 'client_id')->dropDownList(
                ArrayHelper::map(Clients::find()->all(), 'id', 'nama_client'),
                ['prompt' => 'Pilih satu']
            ) ?>


            <label class="control-label" for="text-input">Kategori Proyek</label>
            <?= $form->field($model, 'kategori_proyek')->textInput(['id' => 'text-input'])->label(false) ?>
            <?php if (!empty($kategori)) { ?>
                <?= $form->field($kategoriLama, 'status_perjalanan')->dropDownList(
                    ArrayHelper::map(Proyeks::find()->all(), 'kategori_proyek', 'kategori_proyek'),
                    ['id' => 'dropdown-input', 'prompt' => '', 'options' => ['disabled' => true, 'selected' => true]]
                )->label(false) ?>

                <?= Html::button('Pilih Kategori', [
                    'class' => 'btn btn-primary',
                    'id' => 'switch-input-btn'
                ]) ?>
            <?php } ?>

        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="x_panel">
            <div class="form-group row">

                <?= $form->field($model, 'nilai_proyek')->widget(
                    NumberControl::class,
                    [
                        'maskedInputOptions' => [
                            'rightAlign' => false,
                            'allowMinus' => false,
                            'prefix' => 'Rp.'
                        ]
                    ]
                ) ?>

                <label for="proyeks-tanggal_mulai">Tanggal Mulai * :</label>
                <?= $form->field($model, 'tanggal_mulai')->widget(
                    DatePicker::class,
                    [
                        'pickerIcon' => '<i class="fa fa-calendar"></i>',
                        'layout' => '{picker}{input}',
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-dd'
                        ]
                    ]
                )->label(false) ?>

                <label for="proyeks-tanggal_selesai">Tanggal Selesai * :</label>
                <?= $form->field($model, 'tanggal_selesai')->widget(
                    DatePicker::class,
                    [
                        'pickerIcon' => '<i class="fa fa-calendar"></i>',
                        'layout' => '{picker}{input}',
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-dd'
                        ]
                    ]
                )->label(false) ?>

                <label for="proyeks-status">Status Proyek *</label>
                <?= $form->field($model, 'status')->dropDownList([
                    'Negosiasi' => 'Negosiasi',
                    'Dikerjakan' => 'Dikerjakan',
                    'Selesai' => 'Selesai',
                ], ['prompt' => ''])->label(false) ?>

            </div>

            <div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLiveLabel">Assign Pegawai</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?= $form->field($pegawai, 'pegawai_id')->checkboxList($list, [
                                'separator' => '<br>'
                            ])->label(false) ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-9 offset-md-4">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLive">Continue</button>
                </div>
            </div>

        </div>
    </div>
</div>
<?php ActiveForm::end() ?>