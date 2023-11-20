<?php

namespace backend\controllers;

use backend\config\functions;
use backend\models\PerjalananProyek;
use backend\models\ProyekPegawai;
use backend\models\Proyeks;
use backend\models\ProyeksSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * ProyeksController implements the CRUD actions for Proyeks model.
 */
class ProyeksController extends BaseController
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Proyeks models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProyeksSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Proyeks model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Displays all pegawai in that proyek
     * @param int $id ID
     * @return string
     */
    public function actionViewPegawai($id)
    {
        return $this->render('view_pegawai', [
            'model' => $this->findModel($id)
        ]);
    }

    public function actionAllPerjalanan($id)
    {

        $perjalanans = PerjalananProyek::findAll(['proyek_id' => $id]);

        return $this->render('all_perjalanan', [
            'title' => Proyeks::find()->where(['id' => $id])->one(),
            'perjalanans' => $perjalanans
        ]);
    }
    /**
     * Creates a new Proyeks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Proyeks();
        $kategoriLama = new PerjalananProyek();
        $pegawai = new ProyekPegawai();

        if ($this->request->isPost) {
            if ($model->load(Yii::$app->request->post()) && $pegawai->load($this->request->post()) && $kategoriLama->load($this->request->post())) {
                if (empty($model->kategori_proyek)) {
                    $model->kategori_proyek = $kategoriLama->status_perjalanan;
                }

                $model->created_at = date('Y-m-d');
                $model->updated_at = date('Y-m-d');
                $model->save();

                $model->refresh();
                $id = $pegawai['pegawai_id'];

                foreach ($id as $dataId) {
                    $insert = new ProyekPegawai();
                    $insert->pegawai_id = $dataId;
                    $insert->proyek_id = $model->id;
                    $insert->save();
                }

                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'kategoriLama' => $kategoriLama,
            'pegawai' => $pegawai
        ]);
    }

    /**
     * Updates an existing Proyeks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $kategoriLama = new PerjalananProyek();
        $pegawailama = ProyekPegawai::find()->where(['proyek_id' => $model->id])->all();
        $pegawai = new ProyekPegawai();

        if ($this->request->isPost && $model->load($this->request->post()) && $pegawai->load($this->request->post())) {
            foreach ($pegawailama as $delete) {
                $delete->delete();
            }
            if (empty($model->kategori_proyek)) {
                $model->kategori_proyek = $kategoriLama->status_perjalanan;
            }
            $model->save();
            $model->refresh();
            $id = $pegawai['pegawai_id'];

            foreach ($id as $dataId) {
                $insert = new ProyekPegawai();
                $insert->pegawai_id = $dataId;
                $insert->proyek_id = $model->id;
                $insert->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'kategoriLama' => $kategoriLama,
            'pegawai' => $pegawai
        ]);
    }

    /**
     * Deletes an existing Proyeks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $pegawai = ProyekPegawai::find()->where(['proyek_id' => $id])->all();
        foreach ($pegawai as $delete) {
            $delete->delete();
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Proyeks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Proyeks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Proyeks::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
