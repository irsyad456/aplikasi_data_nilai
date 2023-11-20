<?php

use backend\models\PerjalananProyek;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use kartik\number\NumberControl;

/** @var yii\web\View $this */
/** @var backend\models\PerjalananProyekSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Perjalanan Proyek';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perjalanan-proyek-index">

    <?php if (Yii::$app->user->can('Admin')) : ?>
        <p>
            <?= Html::a('Create Perjalanan Proyek', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif ?>
    <div class="x_panel">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => ['class' => 'table table-bordered'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'value' => 'proyek.nama_proyek',
                    'attribute' => 'proyek_id'
                ],
                'nama_perjalanan',
                [
                    'attribute' => 'modal',
                    'format' => 'raw',
                    'value' => function ($searchModel) {
                        return NumberControl::widget([
                            'name' => 'modal',
                            'value' => $searchModel->modal,
                            'maskedInputOptions' => [
                                'prefix' => 'Rp.',
                                'rightAlign' => false,
                            ],
                            'displayOptions' => [
                                'class' => 'form-control',
                                'style' => 'border: none; background-color: white;',
                                'readOnly' => true,
                            ]
                        ]);
                    },
                    'filter' => NumberControl::widget([
                        'model' => $searchModel,
                        'attribute' => 'modal',
                        'maskedInputOptions' => [
                            'prefix' => 'Rp.',
                            'rightAlign' => false
                        ]
                    ])
                ],
                [
                    'attribute' => 'pengeluaran',
                    'format' => 'raw',
                    'value' => function ($searchModel) {
                        return NumberControl::widget([
                            'name' => 'pengeluaran',
                            'value' => $searchModel->pengeluaran,
                            'maskedInputOptions' => [
                                'prefix' => 'Rp.',
                                'rightAlign' => false,
                            ],
                            'displayOptions' => [
                                'class' => 'form-control',
                                'style' => 'border: none; background-color: white;',
                                'readOnly' => true,
                            ]
                        ]);
                    },
                    'filter' => NumberControl::widget([
                        'model' => $searchModel,
                        'attribute' => 'pengeluaran',
                        'maskedInputOptions' => [
                            'prefix' => 'Rp.',
                            'rightAlign' => false
                        ]
                    ])
                ],
                [
                    'value' => 'tgl_perjalanan',
                    'attribute' => 'tgl_perjalanan',
                    'filter' => DatePicker::widget([
                        'pickerIcon' => '<i class="fa fa-calendar"></i>',
                        'removeButton' => false,
                        'model' => $searchModel,
                        'attribute' => 'tgl_perjalanan',
                        'pluginOptions' => ['format' => 'yyyy-mm-dd']
                    ])
                ],
                [
                    'value' => 'status_perjalanan',
                    'attribute' => 'status_perjalanan',
                    'filter' => array('Belum Berangkat' => 'Belum Berangkat', 'Berangkat' => 'Berangkat', 'Selesai' => 'Selesai')
                ],
                [
                    'class' => ActionColumn::class,
                    'urlCreator' => function ($action, PerjalananProyek $model) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    },
                    'contentOptions' => ['style' => 'width:75px'],
                    'visibleButtons' => [
                        'update' => Yii::$app->user->can('Admin'), // Restrict update button
                        'delete' => Yii::$app->user->can('Admin'), // Restrict delete button
                    ],
                ],
            ],
        ]); ?>
    </div>
</div>