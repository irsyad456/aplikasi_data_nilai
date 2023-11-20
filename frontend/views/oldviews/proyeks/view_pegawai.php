<div class="x_panel">
    <div class="x_content">
        <div class="col-md-12 col-sm-12  text-center">
            <ul class="pagination pagination-split">
            </ul>
        </div>
        <div class="clearfix"></div>
        <?php

        use yii\helpers\Url;

        foreach ($model->pegawai as $pegawai) : ?>
            <div class="col-md-4 col-sm-4  profile_details">
                <div class="well profile_view">
                    <div class="col-sm-12">
                        <div class="left col-sm-7">
                            <h2>Nama </h2>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: <?= $pegawai->alamat ?></li>
                                <li><i class="fa fa-phone"></i> Phone #: <?= $pegawai->no_telp ?></li>
                            </ul>
                        </div>
                        <div class="right col-sm-5 text-center">
                            <img src=<?= Url::base(true) . "/" . $pegawai->profile ?> alt="" class="img-circle img-fluid">
                        </div>
                    </div>
                    <div class=" bottom text-center">
                        <?= yii\helpers\Html::a('<i class="fa fa-user"></i> Lihat Pegawai', ['pegawai/view', 'id' => $pegawai->id, 'ids' => $pegawai->users->id], ['class' => 'btn btn-primary btn-sm']) ?>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>