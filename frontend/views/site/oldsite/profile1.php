<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

/** @var backend\models\PegawaiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_content" style="display: block;">
            <div class="col-md-3 col-sm-3  profile_left">
                <div class="profile_img">
                    <div id="crop-avatar">
                        <img class="img-responsive avatar-view" src=<?= Url::base(true) . "/" . Yii::$app->user->identity->pegawai->profile ?> alt="Avatar" title="User Avatar">
                    </div>
                </div>
                <h3><?= Yii::$app->user->identity->username ?></h3>
                <ul class="list-unstyled user_data">
                    <li>
                        <i class="fa fa-map-marker user-profile-icon"></i> <?= Yii::$app->user->identity->pegawai->alamat ?>
                    </li>
                    <li>
                        <i class="fa fa-birthday-cake"></i> <?= Yii::$app->user->identity->pegawai->tanggal_lahir ?>
                    </li>
                    <li>
                        <i class="fa fa-heart"></i> <?= Yii::$app->user->identity->pegawai->status ?>
                    </li>
                    <li>
                        <i class="fa fa-envelope user-profile"></i> <?= Yii::$app->user->identity->pegawai->email ?>
                    </li>
                    <li>
                        <i class="fa fa-phone"></i> <?= Yii::$app->user->identity->pegawai->no_telp ?>
                    </li>
                    <li>
                        <i class="fa fa-calendar"></i> <?= Yii::$app->user->identity->pegawai->tgl_bergabung ?>
                    </li>
                    <!-- <li class="m-top-xs">
                        <i class="fa fa-external-link user-profile-icon"></i>
                        <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                    </li> -->
                </ul>
                <?= Html::a('<i class="fa fa-edit m-right-xs"></i>Edit Profile', ['pegawai/update', 'id' => Yii::$app->user->identity->id, 'ids' => Yii::$app->user->identity->pegawai->id], ['class' => 'btn btn-info']) ?>
                <br>

                <!-- <h4>Skills</h4>
                <ul class="list-unstyled user_data">
                    <li>
                        <p>Web Applications</p>
                        <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50" aria-valuenow="50" style="width: 50%;"></div>
                        </div>
                    </li>
                    <li>
                        <p>Website Design</p>
                        <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70" aria-valuenow="70" style="width: 70%;"></div>
                        </div>
                    </li>
                    <li>
                        <p>Automation &amp; Testing</p>
                        <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30" aria-valuenow="30" style="width: 30%;"></div>
                        </div>
                    </li>
                    <li>
                        <p>UI / UX</p>
                        <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50" aria-valuenow="50" style="width: 50%;"></div>
                        </div>
                    </li>
                </ul> -->

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

                            <?php if (!empty($proyeks)) : ?>
                                <table class="data table table-striped">
                                    <thead>
                                        <tr>
                                            <th>nama proyek</th>
                                            <th>nama klien</th>
                                            <th class="hidden-phone">status proyek</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($proyeks as $proyek) : ?>
                                            <tr>
                                                <td><?= $proyek->proyek->nama_proyek ?></td>
                                                <td><?= $proyek->proyek->client->nama_client ?></td>
                                                <td><span class="badge badge-light <?= $proyek->proyek->status ?>">negosiasi</span></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <p>Kamu belum punya proyek yang dikerjakan</p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>