<?php

use yii\helpers\Html;
use kartik\number\NumberControl;

$this->title = 'Perjalanan ' . $title->nama_proyek;
$this->params['breadcrumbs'][] = ['label' => 'Proyeks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail ' . $title->nama_proyek, 'url' => ['view', 'id' => $title->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">

        <div class="table-responsive">
            <table class="table table-striped jambo_table">
                <thead>
                    <tr class="headings">
                        <th class="column-title">Nama Perjalanan </th>
                        <th class="column-title">Modal </th>
                        <th class="column-title">Pengeluaran </th>
                        <th class="column-title">Tanggal Perjalanan </th>
                        <th class="column-title">Status Perjalanan </th>
                        <th class="column-title no-link last"><span class="nobr">Action</span>
                        </th>
                        <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($perjalanans as $perjalanan) : ?>
                        <tr class="odd pointer">
                            <td class=" "><?= $perjalanan->nama_perjalanan ?></td>
                            <td class=" ">
                                <?= NumberControl::widget([
                                    'model' => $perjalanan,
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
                                        'style' => 'color: green; border: none;',
                                    ],
                                ]) ?>
                            </td>
                            <td class=" ">
                                <?= NumberControl::widget([
                                    'model' => $perjalanan,
                                    'attribute' => 'pengeluaran',
                                    'disabled' => true,
                                    'maskedInputOptions' => [
                                        'prefix' => 'Rp. ',
                                        'radixPoint' => ',',
                                        'rightAlign' => false,
                                        'digits' => 0,
                                    ],
                                    'displayOptions' => [
                                        'class' => 'form-control',
                                        'style' => 'color: green; border: none;',
                                    ],
                                ]) ?>
                            </td>
                            <td class=" "><?= $perjalanan->tgl_perjalanan ?></td>
                            <td class=" "><?= $perjalanan->status_perjalanan ?></td>
                            <td class=" last">
                                <?= Html::a('View', ['perjalanan-proyek/view', 'id' => $perjalanan->id]) ?>
                            </td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>


    </div>
</div>