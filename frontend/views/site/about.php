<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <h2>This Web Is Created By : </h2>
    <?= Html::img('@frontend/web/img/Jack.jpg', ['alt' => 'IMage', 'class' => 'profile-pic']) ?>
    <img src="<?php echo Yii::getAlias('@frontend') . '\web\img\Jack.jpg' ?>">

    <code><?= __FILE__ ?></code>
</div>