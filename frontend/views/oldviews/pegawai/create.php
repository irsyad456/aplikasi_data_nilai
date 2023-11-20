<?php


/** @var yii\web\View $this */
/** @var backend\models\Pegawai $model */

$this->title = 'Create Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-create">

    <?= $this->render('_form', [
        'model' => $model,
        'user' => $user
    ]) ?>

</div>