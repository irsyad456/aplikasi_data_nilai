<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Clients $model */

$this->title = 'Client ' . $model->nama_client;
$this->params['breadcrumbs'][] = ['label' => 'Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="clients-view">

    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <ul class="nav navbar-right panel_toolbox">
                    <?php if (Yii::$app->user->can('Admin')) : ?>
                        <li><?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'badge badge-primary']) ?></li>
                    <?php endif ?>
                    <li>
                        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                            'class' => 'badge badge-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this data?',
                                'method' => 'post'
                            ]
                        ]) ?>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'nama_client',
                    'alamat_client',
                    'telp_client',
                ],
            ]) ?>
        </div>
    </div>
</div>