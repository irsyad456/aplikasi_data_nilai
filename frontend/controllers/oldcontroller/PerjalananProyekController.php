<?php

namespace backend\controllers;

use backend\models\PerjalananProyek;
use backend\models\PerjalananProyekSearch;
use backend\models\DetailPerjalanan;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\config\functions;
use backend\models\ProyekPegawai;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\ServerErrorHttpException;

/**
 * PerjalananProyekController implements the CRUD actions for PerjalananProyek model.
 */
class PerjalananProyekController extends BaseController
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
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all PerjalananProyek models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PerjalananProyekSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PerjalananProyek model.
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
     * Creates a new PerjalananProyek model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new PerjalananProyek();
        $data = new DetailPerjalanan();
        $submitted = false;
        if ($this->request->post()) {
            if ($data->load($this->request->post()) && $model->load($this->request->post())) {
                $model->pegawai_id = Yii::$app->user->identity->id;
                $model->created_at = date('Y-m-d');
                $model->updated_at = date('Y-m-d');
                if ($model->save() && $model->refresh()) {
                    foreach ($data['pegawai_id'] as $pegawaiId) {
                        $insert = new DetailPerjalanan();
                        $insert->pegawai_id = $pegawaiId;
                        $insert->perjalanan_id = $model->id;
                        $insert->save();
                    }
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    $errors = $model->getErrors();
                    $error = $data->getErrors();
                    Yii::$app->session->setFlash('error', $errors + $error);
                }
            } elseif ($model->load($this->request->post())) {
                $submitted = true;
                $pegawai = ProyekPegawai::find()->where(['proyek_id' => $model->proyek_id])->with('pegawai')->all();
                $view = $this->renderPartial('pegawai', [
                    'pegawai' => $pegawai,
                    'data' => $data,
                    'model' => $model
                ]);
                return $this->render('create', [
                    'model' => $model,
                    'submitted' => $submitted,
                    'view' => $view
                ]);
            } else {
                Yii::$app->session->setFlash('error', 'There was an error loading the data.');
            }
        }

        return $this->render('create', [
            'model' => $model,
            'submitted' => $submitted,
            'view' => ''
        ]);
    }

    /**
     * Updates an existing PerjalananProyek model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $data = new DetailPerjalanan();
        $submitted = false;

        if ($this->request->isPost) {
            if ($data->load($this->request->post()) && $model->load($this->request->post())) {
                $model->updated_at = date('Y-m-d');
                if ($model->save() && $model->refresh()) {
                    foreach ($model->detailPerjalanans as $delete) {
                        $delete->delete();
                    }
                    foreach ($data['pegawai_id'] as $pegawaiId) {
                        $insert = new DetailPerjalanan();
                        $insert->pegawai_id = $pegawaiId;
                        $insert->perjalanan_id = $model->id;
                        $insert->save();
                    }
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    $model->loadDefaultValues();
                    $data->loadDefaultValues();
                }
            } else {
                $submitted = true;
                $pegawai = ProyekPegawai::find()->where(['proyek_id' => $model->proyek_id])->with('pegawai')->all();
                $view = $this->renderPartial('pegawai', [
                    'pegawai' => $pegawai,
                    'data' => $data,
                    'model' => $model
                ]);

                return $this->render('create', [
                    'model' => $model,
                    'submitted' => $submitted,
                    'view' => $view
                ]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'submitted' => $submitted,
            'view' => ''
        ]);
    }

    /**
     * Deletes an existing PerjalananProyek model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        foreach ($model->detailPerjalanans as $data) {
            $data->delete();
        }
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PerjalananProyek model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return PerjalananProyek the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PerjalananProyek::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
