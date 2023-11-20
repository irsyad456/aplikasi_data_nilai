<?php

use yii\helpers\Html;
use kartik\number\NumberControl;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var backend\models\PerjalananProyek $model */

$this->title = $model->nama_perjalanan;
$this->params['breadcrumbs'][] = ['label' => 'Perjalanan Proyeks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="perjalanan-proyek-view">

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?= $model->proyek->nama_proyek ?></h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">

                    <div class="col-md-9 col-sm-9  ">

                        <ul class="stats-overview">
                            <li>
                                <span class="name"> Modal Perjalanan </span>
                                <span class="value text-success">
                                    <?= NumberControl::widget([
                                        'model' => $model,
                                        'attribute' => 'modal',
                                        'disabled' => true,
                                        'maskedInputOptions' => [
                                            'prefix' => 'Rp. ',
                                            'radixPoint' => ',',
                                            'rightAlign' => false,
                                            'digits' => 0,
                                        ],
                                        'displayOptions' => [
                                            'class' => 'form-control',
                                            'style' => 'background-color: white; color: green; border: none;',
                                        ],
                                    ]) ?>
                                </span>
                            </li>
                            <li>
                                <span class="name"> Total Yang sudah dipakai </span>
                                <span class="value text-success"> <?= $model->pengeluaran ?> </span>
                            </li>
                            <li class="hidden-phone">
                                <span class="name"> Status Perjalanan </span>
                                <span class="value text-success"> <?= $model->status_perjalanan ?> </span>
                            </li>
                        </ul>
                        <br />


                        <div>

                            <h4>Kegiatan Perjalanan Terbaru</h4>

                            <!-- end of user messages -->
                            <ul class="messages">
                                <?php
                                // Create a separate array to hold the sorted and limited items
                                $sortedProgressPerjalanans = $model->progressPerjalanans;
                                usort($sortedProgressPerjalanans, function ($a, $b) {
                                    return strtotime($a->tgl_progress) - strtotime($b->tgl_progress);
                                });
                                $limitedProgressPerjalanans = array_slice($sortedProgressPerjalanans, 0, 5);
                                ?>

                                <?php foreach ($limitedProgressPerjalanans as $kegiatan) : ?>
                                    <li>
                                        <img src=<?= Url::base(true) . "/" . $kegiatan->pegawai->profile ?> class="avatar" alt="Avatar">
                                        <div class="message_date">
                                            <?php
                                            $formattedDate = Yii::$app->formatter->asDate($kegiatan->tgl_progress, 'long');
                                            // Render the formatted date in the HTML element
                                            echo Html::tag('h3', $formattedDate, ['class' => 'date text-info']);
                                            ?>
                                        </div>
                                        <div class="message_wrapper">
                                            <h4 class="heading"><?= $kegiatan->pegawai->nama ?></h4>
                                            <blockquote class="message"><?= $kegiatan->desk_progress ?></blockquote>
                                            <br />
                                            <p class="url">
                                                <?php
                                                $money = Yii::$app->formatter->asCurrency($kegiatan->budget_progress, 'Rp.');
                                                echo Html::textInput('budget-progress', $money, [
                                                    'class' => 'form-control',
                                                    'style' => 'background-color: white; color: gray; border: none;',
                                                    'readonly' => true,
                                                ]);
                                                ?>
                                                <br>
                                                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                                <a href="<?= Yii::getAlias('@web') ?>/<?= $kegiatan->bukti_struk ?>" target="_blank">
                                                    <i class="fa fa-paperclip"></i><?= basename($kegiatan->bukti_struk) ?>
                                                </a>
                                            </p>
                                        </div>
                                    </li>
                                <?php endforeach ?>

                                <li>
                                    <img src="" class="avatar" alt="Avatar">
                                    <div class="message_date">
                                        <h3 class="date text-error">21</h3>
                                        <p class="month">May</p>
                                    </div>
                                    <div class="message_wrapper">
                                        <h4 class="heading">Brian Michaels</h4>
                                        <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                        <br />
                                        <p class="url">
                                            <span class="fs1" aria-hidden="true" data-icon=""></span>
                                            <a href="#" data-original-title="">Download</a>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <img src="" class="avatar" alt="Avatar">
                                    <div class="message_date">
                                        <h3 class="date text-info">24</h3>
                                        <p class="month">May</p>
                                    </div>
                                    <div class="message_wrapper">
                                        <h4 class="heading">Desmond Davison</h4>
                                        <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                        <br />
                                        <p class="url">
                                            <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                            <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                            <!-- end of user messages -->


                        </div>


                    </div>

                    <!-- start project-detail sidebar -->
                    <div class="col-md-3 col-sm-3  ">

                        <section class="panel">

                            <div class="panel-body">
                                <h3 class="green"><i class="fa fa-paint-brush"></i> <?= $model->nama_perjalanan ?></h3>

                                <p><?= $model->desk_perjalanan ?></p>
                                <br />

                                <div class="project_detail">

                                    <p class="title"> Nama Klien </p>
                                    <p><?= $model->client->nama_client ?></p>
                                    <p class="title">Tanggal Berangkat</p>
                                    <p><?= $model->tgl_perjalanan ?></p>
                                </div>

                                <br />
                                <h5>Pegawai yang melakukan perjalanan ini</h5>
                                <ul class="list-unstyled project_files">
                                    <?php foreach ($model->pegawai as $pegawai) : ?>
                                        <li><a href=<?= Url::to(['pegawai/view', 'id' => $pegawai->id, 'ids' => $pegawai->users->id]) ?>><img src=<?= Url::base(true) . "/" . $pegawai->profile ?> width="20%" height="20%"><?= $pegawai->nama ?></a>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                                <br />

                                <div class="text-center mtop20">
                                    <?= Html::a('Lihat Semua Kegiatan', ['site/details'], ['class' => 'btn btn-sm btn-primary']) ?>
                                    <?php if (Yii::$app->user->can('Admin')) : ?>
                                        <?= Html::a('Edit', ['perjalanan-proyek/update', 'id' => $model->id], ['class' => 'btn btn-sm btn-warning']) ?>
                                    <?php endif ?>
                                </div>
                            </div>

                        </section>

                    </div>
                    <!-- end project-detail sidebar -->

                </div>
            </div>
        </div>
    </div>
</div>