<?php

use backend\models\Pegawai;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\PegawaiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pegawai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-index">


    <?php if (Yii::$app->user->can('Admin')) : ?>
        <p>
            <?= Html::a('Create Pegawai', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>
    <div class="x_panel">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'nama',
                'alamat',
                'email:email',
                'no_telp',
                [
                    'value' => 'tgl_bergabung',
                    'attribute' => 'tgl_bergabung',
                    'filter' => DatePicker::widget([
                        'pickerIcon' => '<i class="fa fa-calendar"></i>',
                        'removeButton' => false,
                        'model' => $searchModel,
                        'attribute' => 'tgl_bergabung',
                        'pluginOptions' => ['format' => 'yyyy-mm-dd']
                    ])
                ],
                [
                    'class' => ActionColumn::class,
                    'urlCreator' => function ($action, Pegawai $model) {
                        return Url::toRoute([$action, 'id' => $model->id, 'ids' => $model->users['id']]);
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