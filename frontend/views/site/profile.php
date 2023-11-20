<?php

use yii\grid\GridView;

$this->title = 'Profile';
$this->params['breadcrumbs'][] = $this->title;
?>

<div>
    <p>Username: <?= $user->username ?></p>
    <p>NIK: <?= $student->nomor_induk ?></p>
    <p>Nama: <?= $student->nama ?></p>
    <p>Alamat: <?= $student->alamat ?></p>
    <p>Tanggal Lahir: <?= $student->tanggal_lahir ?></p>
    <br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'student_id',
            [
                'attribute' => 'subject_id',
                'value' => 'subject.nama'
            ],
            'jenis_nilai',
            'nilai'
        ]
    ]) ?>
    <p>Total Exam Grades: <?= $finalGrades ?></p>
    <p>Average Grades: <?= $averageGrades ?></p>
</div>