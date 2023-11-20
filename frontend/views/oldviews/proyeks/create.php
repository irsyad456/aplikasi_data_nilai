<?php

/** @var yii\web\View $this */
/** @var backend\models\Proyeks $model */

$this->title = 'Create Proyeks';
$this->params['breadcrumbs'][] = ['label' => 'Proyeks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyeks-create">

    <?= $this->render('_form', [
        'model' => $model,
        'kategoriLama' => $kategoriLama,
        'pegawai' => $pegawai
    ]) ?>

</div>