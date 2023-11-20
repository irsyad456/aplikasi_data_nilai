<?php

/** @var yii\web\View $this */
/** @var backend\models\Proyeks $model */

$this->title = 'Update Proyeks: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Proyeks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_proyek, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="proyeks-update">

    <?= $this->render('_form', [
        'model' => $model,
        'kategoriLama' => $kategoriLama,
        'pegawai' => $pegawai
    ]) ?>

</div>