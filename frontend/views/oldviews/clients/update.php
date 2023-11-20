<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Clients $model */

$this->title = 'Update Clients: ' . $model->nama_client;
$this->params['breadcrumbs'][] = ['label' => 'Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_client, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clients-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>