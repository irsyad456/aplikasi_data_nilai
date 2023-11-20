<?php

/** @var yii\web\View $this */
/** @var string $content */

use backend\assets\LoginAsset;
use yii\helpers\Html;

LoginAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<?php $this->beginBody() ?>

<body class="login">
    <div class="login_wrapper">
        <div class="login_content">
            <div class="animate form login_form">

                <h1>DigiTak</h1>
                <p>Admin</p>
                <?php if (Yii::$app->session->hasFlash('isGuest')) : ?>
                    <div class="alert alert-warning alert-dismissible " role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <strong>Warning</strong> <?= Yii::$app->session->getFlash('isGuest') ?>
                    </div>
                <?php endif; ?>
                <?= $content ?>
                <div class="separator">
                    <p><strong>DigiTak</strong> @2023 All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</body>

<?php $this->endBody(); ?>

</html>
<?php $this->endPage(); ?>