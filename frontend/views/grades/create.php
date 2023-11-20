<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Grades $model */

$this->title = 'Create Grades';
$this->params['breadcrumbs'][] = ['label' => 'Grades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grades-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>