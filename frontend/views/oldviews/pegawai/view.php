<?php

use backend\config\functions;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Pegawai $model */
$this->title = 'Profile ' . $model->users['username'];
$this->params['breadcrumbs'][] = ['label' => 'Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->users['username'];
\yii\web\YiiAsset::register($this);
?>
<div class="pegawai-view">

    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_content" style="display: block;">
                <div class="col-md-3 col-sm-3  profile_left">
                    <div class="profile_img">
                        <div id="crop-avatar">
                            <img class="img-responsive avatar-view" src=<?= Url::base(true) . "/" . $model->profile ?> alt="Avatar" title="User Avatar">
                        </div>
                    </div>
                    <h3><?= $model->nama ?></h3>
                    <ul class="list-unstyled user_data">
                        <li>
                            <i class="fa fa-map-marker user-profile-icon"></i> <?= $model->alamat ?>
                        </li>
                        <li>
                            <i class="fa fa-birthday-cake"></i> <?= $model->tanggal_lahir ?>
                        </li>
                        <li>
                            <i class="fa fa-heart"></i> <?= $model->status ?>
                        </li>
                        <li>
                            <i class="fa fa-envelope user-profile"></i> <?= $model->email ?>
                        </li>
                        <li>
                            <i class="fa fa-phone"></i> <?= $model->no_telp ?>
                        </li>
                        <li>
                            <i class="fa fa-calendar"></i> <?= $model->tgl_bergabung ?>
                        </li>
                    </ul>
                    <?php if (Yii::$app->user->can('Admin')) : ?>
                        <?= Html::a('<i class="fa fa-edit">Edit Pegawai</i>', ['pegawai/update', 'id' => $model->id, 'ids' => $user->id], ['class' => 'btn btn-info']) ?>
                        <?= Html::a('<i class="fa fa-trash">Hapus Pegawai</i>', ['pegawai/delete', 'id' => $model->id, 'ids' => $user->id], ['class' => 'btn btn-danger']) ?>
                    <?php endif ?>
                    <br>

                </div>
                <div class="col-md-9 col-sm-9 ">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true" class="active" aria-selected="true">Update Perjalanan Proyek</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false" class="" aria-selected="false">Proyek yang dikerjakan</a>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane active show" id="tab_content1" aria-labelledby="home-tab">

                                <ul class="messages">
                                    <li>
                                        <img src="img/leafeon.jpg" class="avatar" alt="Avatar">
                                        <div class="message_date">
                                            <h3 class="date text-info">tanggal</h3>
                                            <p class="month">bulan</p>
                                        </div>
                                        <div class="message_wrapper">
                                            <h4 class="heading">Nama Perjalanan</h4>
                                            <blockquote class="message">
                                                Deskripsi Perjalanan
                                            </blockquote>
                                            <br>
                                            <p class="url">
                                                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                                <a href="#"><i class="fa fa-paperclip"></i> Bukti Struk </a>
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="images/img.jpg" class="avatar" alt="Avatar">
                                        <div class="message_date">
                                            <h3 class="date text-error">21</h3>
                                            <p class="month">May</p>
                                        </div>
                                        <div class="message_wrapper">
                                            <h4 class="heading">Brian Michaels</h4>
                                            <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                            <br>
                                            <p class="url">
                                                <span class="fs1" aria-hidden="true" data-icon=""></span>
                                                <a href="#" data-original-title="">Download</a>
                                            </p>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                                <table class="data table table-striped no-margin">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>nama proyek</th>
                                            <th>nama klien</th>
                                            <th class="hidden-phone">status proyek</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($proyeks as $proyek) : ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $proyek->proyek->nama_proyek ?></td>
                                                <td><?= $proyek->proyek->client->nama_client ?></td>
                                                <td><span class="badge badge-primary"><?= $proyek->proyek->status ?></span></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>