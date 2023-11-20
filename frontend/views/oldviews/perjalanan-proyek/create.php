<?php

/** @var yii\web\View $this */
/** @var backend\models\PerjalananProyek $model */

$this->title = 'Create Perjalanan Proyek';
$this->params['breadcrumbs'][] = ['label' => 'Perjalanan Proyeks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perjalanan-proyek-create">


    <?= $this->render('_form', [
        'model' => $model,
        'submitted' => $submitted,
        'view' => $view
    ]) ?>

</div>