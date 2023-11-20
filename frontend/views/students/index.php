<?php

use common\models\User;
use frontend\models\Students;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var frontend\models\StudentsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Students', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            [
                'attribute' => 'user_id',
                'value' => 'user.username',
            ],
            'nomor_induk',
            'nama',
            'alamat:ntext',
            [
                'attribute' => 'tanggal_lahir',
                'value' => 'tanggal_lahir',
                'filter' => DatePicker::widget([
                    'pickerIcon' => '<i class="fa fa-calendar"></i>',
                    'removeButton' => false,
                    'model' => $searchModel,
                    'attribute' => 'tanggal_lahir',
                    'pluginOptions' => ['format' => 'yyyy-mm-dd']
                ])
            ],
            //'tanggal_lahir',
            //'created_at',
            //'updated_at',
            [
                'header' => 'Actions',
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Students $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>