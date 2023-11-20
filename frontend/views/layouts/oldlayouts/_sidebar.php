<?php

use backend\models\PerjalananProyek;
use backend\models\Proyeks;
use yii\helpers\Html;
use yii\helpers\Url;

$proyeks = Proyeks::find()
    ->select(['status', 'nama_proyek', 'id'])
    ->where(['NOT', ['status' => 'selesai']])
    ->orderBy(['created_at' => SORT_DESC])
    ->limit(5)
    ->all();

$perjalanans = PerjalananProyek::find()
    ->select(['status_perjalanan', 'nama_perjalanan', 'id'])
    ->where(['NOT', ['status_perjalanan' => 'Selesai']])
    ->orderBy(['updated_at' => SORT_DESC])
    ->limit(5)
    ->all();

?>
<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">

        <div class="navbar nav_title" style="border: 0;">
            <?= Html::a('<i class="fa fa-circle"></i> <span>DigiTak</span>', ['site/index'], ['class' => 'site_title']) ?>
        </div>
        <div class="clearfix"></div>

        <div class="profile clearfix"><!--img_2 -->
            <div class="profile_pic">
                <img src="<?= Url::base(true) . "/" . Yii::$app->user->identity->pegawai->profile ?>" alt="profile" class="img-circle profile_img">
            </div>

            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?= Yii::$app->user->identity->username ?></h2>
            </div>
        </div>

        <br>
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
                <ul class="nav side-menu">
                    <li><?= Html::a('<i class="fa fa-home"></i> Dashboard', ['site/index']) ?></li>
                    <li><a><i class="fa fa-user"></i> Admin <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><?= Html::a('Clients', ['clients/index']) ?></li>
                            <li><?= Html::a('Pegawai', ['pegawai/index']) ?></li>
                            <?php if (Yii::$app->user->can('Admin')) : ?>
                                <li><?= Html::a('Reset Password', ['site/reset-password']) ?></li>
                            <?php endif ?>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>
                    <?= Html::a('Proyek', ['proyeks/index'], ['style' => 'text-decoration:none; color:#99a1aa;']) ?>
                    <?php if (Yii::$app->user->can('Admin'))    echo Html::a(
                        '<i class="fa fa-plus" style="margin-left: 120px;"></i>',
                        array('proyeks/create')
                    ); ?>
                </h3>
                <ul class="nav side-menu">
                    <?php foreach ($proyeks as $proyek) : ?>
                        <li>
                            <?php
                            $statusProyek = ($proyek->status === 'Negosiasi') ? 'yellow-circle' : 'blue-circle';
                            echo Html::a('<i class="fa fa-circle ' . $statusProyek . '"></i>' . $proyek->nama_proyek, ['proyeks/view/', 'id' => $proyek->id])
                            ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="menu_section">
                <h3>
                    <?= Html::a('Perjalanan', ['perjalanan-proyek/index']) ?>
                    <?php if (Yii::$app->user->can('Admin'))    echo Html::a(
                        '<i class="fa fa-plus" style="margin-left: 87px;"></i>',
                        array('perjalanan-proyek/create')
                    ); ?>
                </h3>
                <ul class="nav side-menu">
                    <?php foreach ($perjalanans as $perjalanan) : ?>
                        <li>
                            <?php
                            $statusPerjalanan = ($perjalanan->status_perjalanan === 'Belum Berangkat') ? 'yellow-circle' : 'blue-circle';
                            echo Html::a('<i class="fa fa-circle ' . $statusPerjalanan . '"></i>' . $perjalanan->nama_perjalanan, ['perjalanan-proyek/view', 'id' => $perjalanan->id]);
                            ?>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>

        </div>
        <!-- 
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div> -->
    </div>
</div>