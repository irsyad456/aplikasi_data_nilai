<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\PerjalananProyek $model */

$this->title = 'Update Perjalanan Proyek: ' . $model->nama_perjalanan;
$this->params['breadcrumbs'][] = ['label' => 'Perjalanan Proyeks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_perjalanan, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perjalanan-proyek-update">

    <?= $this->render('_form', [
        'model' => $model,
        'submitted' => $submitted,
        'view' => $view
    ]) ?>

</div>