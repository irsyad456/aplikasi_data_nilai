<?php

use backend\models\Clients;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\ClientsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Clients';
$this->params['breadcrumbs'][] = $this->title;
?>

<head>
    <style>
        .x_panel {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            margin-left: calc(50% - 555px);
            /* set to the width of the sidebar + half of the x_panel width */
            margin-right: -250px;
            /* set to the width of the sidebar */
            width: 1110px;
            /* set to the width of the x_panel */
        }
    </style>
</head>

<div class="clients-index">

    <?php if (Yii::$app->user->can('Admin')) : ?>
        <p>
            <?= Html::a('Create Clients', ['create'], ['class' => 'btn btn-success']) ?>
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

                'nama_client',
                'alamat_client',
                'telp_client',
                [
                    'class' => ActionColumn::class,
                    'urlCreator' => function ($action, Clients $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    },
                    'contentOptions' => ['style' => 'width:80px;'],
                    'visibleButtons' => [
                        'update' => Yii::$app->user->can('Admin'), // Restrict update button
                        'delete' => Yii::$app->user->can('Admin'), // Restrict delete button
                    ],
                ],
            ],
        ]); ?>
    </div>
</div>