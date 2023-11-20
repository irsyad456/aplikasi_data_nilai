<?php

use backend\models\Clients;
use backend\models\Proyeks;
use kartik\number\NumberControl;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var backend\models\ProyeksSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Proyeks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyeks-index">

    <?php if (Yii::$app->user->can('Admin')) : ?>
        <p>
            <?= Html::a('Create Proyeks', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>
    <div class="x_panel">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => ['class' => 'table table-bordered'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'attribute' => 'client_id',
                    'value' => 'client.nama_client',
                    'filter' => ArrayHelper::map(Clients::find()->all(), 'nama_client', 'nama_client')
                ],
                'nama_proyek',
                [
                    'attribute' => 'nilai_proyek',
                    'format' => 'raw',
                    'value' => function ($searchModel) {
                        return NumberControl::widget([
                            'name' => 'nilai_proyek',
                            'value' => $searchModel->nilai_proyek,
                            'maskedInputOptions' => [
                                'prefix' => 'Rp.',
                                'rightAlign' => false,
                            ],
                            'displayOptions' => [
                                'class' => 'form-control',
                                'style' => ' border-top-style: hidden;
                                background-color:white;
                                border-right-style: hidden;
                                border-left-style: hidden;
                                border-bottom-style: hidden;',
                                'readOnly' => true,
                            ]
                        ]);
                    },
                    'filter' => NumberControl::widget([
                        'model' => $searchModel,
                        'attribute' => 'nilai_proyek',
                        'maskedInputOptions' => [
                            'prefix' => 'Rp.',
                            'rightAlign' => false
                        ]
                    ])
                ],
                [
                    'attribute' => 'kategori_proyek',
                    'value' => 'kategori_proyek',
                    'headerOptions' => ['style' => 'width:150px'],
                    'filter' => ArrayHelper::map(Proyeks::find()->all(), 'kategori_proyek', 'kategori_proyek')
                ],
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => function ($model) {
                        if ($model->status == 'Negosiasi') {
                            return '<span class="badge rounded-pill badge-warning">' . $model->status . '</span>';
                        } elseif ($model->status == 'Dikerjakan') {
                            return '<span class="badge rounded-pill badge-primary">' . $model->status . '</span>';
                        } else {
                            return '<span class="badge rounded-pill badge-success">' . $model->status . '</span>';
                        }
                    },
                    'filter' => array("Dikerjakan" => "Dikerjakan", "Negosiasi" => "Negosiasi", "Selesai" => "Selesai"),
                    'contentOptions' => ['class' => 'text-center']
                ],
                [
                    'class' => ActionColumn::class,
                    'urlCreator' => function ($action, Proyeks $model) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    },
                    'contentOptions' => ['style' => 'width:80px'],
                    'visibleButtons' => [
                        'update' => Yii::$app->user->can('Admin'), // Restrict update button
                        'delete' => Yii::$app->user->can('Admin'), // Restrict delete button
                    ],
                ],
            ],
        ]); ?>


    </div>
</div>