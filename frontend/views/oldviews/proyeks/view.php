<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\number\NumberControl;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var backend\models\Proyeks $model */

$this->title = 'Detail ' . $model->nama_proyek;
$this->params['breadcrumbs'][] = ['label' => 'Proyeks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


<!-- <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p> -->

<!-- <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'kategori_id',
                'client_id',
                'nama_proyek',
                'desk_proyek',
                'nilai_proyek',
                'tanggal_mulai',
                'tanggal_selesai',
                'status',
                'created_at',
                'updated_at',
            ],
        ]) ?> -->

<div class="col-md-12">
    <?php if (Yii::$app->session->hasFlash('success')) : ?>
        <div class="alert alert-info alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" fdprocessedid="kpqsn9"><span aria-hidden="true">×</span>
            </button>
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>
    <div class="x_panel">


        <div class="col-md-9 col-sm-9  ">

            <ul class="stats-overview">
                <li>
                    <span class="name"> Nilai Proyek </span>
                    <span class="value text-success">
                        <?= NumberControl::widget([
                            'name' => 'nilai_proyek',
                            'value' => $model->nilai_proyek,
                            'disabled' => true,
                            'displayOptions' => [
                                'class' => 'form-control',
                                'style' => 'background-color:white;color:green;border:none;'
                            ],
                            'maskedInputOptions' => [
                                'rightAlign' => false,
                                'prefix' => 'Rp.'
                            ]
                        ]) ?>
                    </span>
                </li>
                <li>
                    <span class="name">Tanggal Mulai</span>
                    <span class="value text-success"> <?= $model->tanggal_mulai ?> </span>
                </li>
                <li>
                    <span class="name"> Tanggal Selesai </span>
                    <span class="value text-success"> <?= $model->tanggal_selesai ?> </span>
                </li>
            </ul>
            <br />

            <div>

                <h6><b>Nama Klien</b></h6>
                <h6> <?= $model->client['nama_client'] ?> </h6>

                <h6><b>Kategori Proyek</b></h6>
                <h6> <?= $model->kategori_proyek ?> </h6>

                <h6><b>Status</b></h6>
                <h6> <?= $model->status ?> </h6>

                <h6><b>Pegawai Yang Mengerjakan Proyek</b></h6>

                <ul class="messages">
                    <?php $count = 0;
                    foreach ($model->pegawai as $pegawai) : ?>
                        <?php if ($count == 5) break; ?>
                        <li>
                            <?= Html::a(
                                '<img src="' . Url::base(true) . '/' . $pegawai->profile . '" alt="Profile" width="50px" height="50px"> ' . $pegawai->nama,
                                ['pegawai/view', 'id' => $pegawai->id, 'ids' => $pegawai->users->id]
                            ) ?>
                        </li>
                        <?php $count++ ?>
                    <?php endforeach ?>
                    <?php if (count($model->pegawai) > 5) : ?>
                        <li>
                            <?= Html::a('<i class="fa fa-users"></i> Lihat Semua', ['site/pegawai'], ['class' => 'btn btn-primary btn-sm']) ?>
                        </li>
                    <?php endif ?>
                </ul>


            </div>


        </div>

        <!-- start project-detail sidebar -->
        <div class="col-md-3 col-sm-3  ">

            <section class="panel">

                <div class="panel-body">
                    <h3 class="green"><i class="fa fa-paint-brush"></i> <?= $model->nama_proyek ?></h3>

                    <p><?= $model->desk_proyek ?></p>

                    <h5>Perjalanan terbaru </h5>
                    <ul class="list-unstyled project_files">
                        <?php $counts = 0;
                        foreach ($model->perjalananProyeks as $perjalanan) : ?>
                            <?php if ($counts == 5) break ?>
                            <li>
                                <?= Html::a($perjalanan->nama_perjalanan, ['perjalanan-proyek/view', 'id' => $perjalanan->id]) ?>
                            </li>
                            <?php $counts++ ?>
                        <?php endforeach ?>
                        <?php if (count($model->perjalananProyeks) > 5) : ?>
                            <li>
                                <?= Html::a('Lihat semua', ['proyeks/all-perjalanan', 'id' => $model->id], ['class' => 'badge badge-sm badge-primary']) ?>
                            </li>
                        <?php endif ?>
                    </ul>
                    <br />

                    <div class="text-center mtop20">
                        <?php if (Yii::$app->user->can('Admin')) : ?>
                            <?= Html::a('Edit', ['proyeks/update', 'id' => $model->id], ['class' => 'btn btn-warning btn-sm']) ?>
                            <?= Html::a('Hapus', ['proyeks/delete', 'id' => $model->id], ['class' => 'btn btn-danger btn-sm']) ?>
                        <?php endif ?>
                    </div>
                </div>

            </section>

        </div>
        <!-- end project-detail sidebar -->

    </div>
</div>