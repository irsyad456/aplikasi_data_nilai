<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Pegawai $model */

$this->title = 'Update Pegawai: ' . $model->users['username'];
$this->params['breadcrumbs'][] = ['label' => 'Pegawais', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->users['username'], 'url' => ['view', 'id' => $model->id, 'ids' => $model->users['id']]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pegawai-update">

    <?= $this->render('_form', [
        'model' => $model,
        'user' => $user
    ]) ?>

</div>