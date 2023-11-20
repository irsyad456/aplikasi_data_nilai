<?php

use backend\models\Proyeks;
use kartik\number\NumberControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var backend\models\PerjalananProyek $model */
/** @var yii\widgets\ActiveForm $form */
// $script = <<< JS
// $(document).ready(function(){
//     $('#id_proyek').change(function(){
//         var ProyekId = $(this).val();
//         $.get('index.php?r=pegawai/lists&id=', {id: ProyekId}, function(data){
//             $('#detailperjalanan-pegawai_id').html(data);
//         });
//     });
// });
// JS;
// $this->registerJs($script);
?>
<div class="perjalanan-proyek-form">
    <?php $form = ActiveForm::begin(); ?>
</div>
<div class="col-md-6 col-sm-12  ">
    <div class="x_panel">
        <div class="x_content">
            <br />
            <?php if ($model->isNewRecord) { ?>
            <?= $form->field($model, 'proyek_id')->dropDownList(
                    ArrayHelper::map(Proyeks::find()->all(), 'id', 'nama_proyek'),
                    [
                        'prompt' => 'Pilih Proyek',
                        'id' => 'proyek-id',
                        'disabled' => $submitted
                    ]
                );
            } ?>

            <div>
                <?= $form->field($model, 'nama_perjalanan')->textInput(['readonly' => $submitted]) ?>
                <?= $form->field($model, 'desk_perjalanan')->textarea(['readonly' => $submitted]) ?>
            </div>
            <?= $form->field($model, 'modal')->widget(
                NumberControl::class,
                [
                    'readonly' => $submitted,
                    'maskedInputOptions' => [
                        'rightAlign' => false,
                        'allowMinus' => false,
                        'prefix' => 'Rp.'
                    ]
                ]
            ) ?>

            <?= $form->field($model, 'status_perjalanan')->dropDownList(['Belum Berangkat' => 'Belum Berangkat', 'Berangkat' => 'Berangkat', 'Selesai' => 'Selesai',], ['prompt' => '', 'disabled' => $submitted]) ?>


        </div>
    </div>
</div>
<div class="col-md-6 col-sm-12  ">
    <div class="x_panel">
        <div class="x_content">
            <br />
            <?= $form->field($model, 'tgl_perjalanan')->widget(
                DatePicker::class,
                [
                    'disabled' => $submitted,
                    'pickerIcon' => '<i class="fa fa-calendar"></i>',
                    'layout' => '{picker}{input}',
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true
                    ]
                ]
            ) ?>
            <?php if (!empty($view)) { ?>
                <div class="form-group row">
                    <div class="col-md-9 offset-md-5">
                        <?= Html::a('Back', ['perjalanan-proyek/create'], ['class' => 'btn btn-primary', 'onclick' => 'window.history.back(); return false;']) ?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="form-group row">
                    <div class="col-md-9 offset-md-4">
                        <?= Html::submitButton('Continue', ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php if (!empty($view)) { ?>
    <div class="pegawai-view">
        <?= $view ?>
    </div>
<?php } ?>

<?php ActiveForm::end(); ?>