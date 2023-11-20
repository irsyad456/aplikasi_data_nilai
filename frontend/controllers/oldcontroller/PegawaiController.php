<?php

namespace backend\controllers;

use backend\config\functions;
use Yii;
use backend\models\Pegawai;
use backend\models\PegawaiSearch;
use backend\models\ProyekPegawai;
use backend\models\User;
use yii\db\Command;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\UploadedFile as WebUploadedFile;

/**
 * PegawaiController implements the CRUD actions for Pegawai model.
 */
class PegawaiController extends BaseController
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
     * Lists all Pegawai models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PegawaiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pegawai model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $ids)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'user' => $this->findUser($ids),
            'proyeks' => ProyekPegawai::findAll(['pegawai_id' => $id])
        ]);
    }

    /**
     * Creates a new Pegawai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pegawai();
        $user = new User();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $user->load($this->request->post())) {
                $model->file = WebUploadedFile::getInstance($model, 'file');
                if (!empty($model->file)) {
                    // Get the instances of the uploaded image
                    $imageName = $user->username;

                    // Get frontend path and save the image into frontend/web/uploads
                    $frontendUploadsPath = Yii::getAlias('@frontend/web/uploads');
                    $model->file->saveAs($frontendUploadsPath . '/' . $imageName . '.' . $model->file->extension, false);

                    // Save the image into backend/web/uploads
                    $model->file->saveAs('uploads/' . $imageName . '.' . $model->file->extension);

                    // Save the path in the db column
                    $model->profile = 'uploads/' . $imageName . '.' . $model->file->extension;
                } else {
                    $model->profile = 'uploads/profile.jpg';
                }

                // Save and refresh data pegawai
                $model->save();
                $model->refresh();

                // Create new user for authentication
                $user->pegawai_id = $model->id;
                $user->password_hash = Yii::$app->security->generatePasswordHash($user->password_hash);
                $user->auth_key = Yii::$app->security->generateRandomString();
                $user->created_at = date('Y');
                $user->updated_at = date('Y');
                $user->save();
                $user->refresh();

                if ($this->request->post('is_admin') == 1) {
                    $db = Yii::$app->getDb();

                    $sql = "INSERT INTO auth_assignment (item_name, user_id, created_at)
                            VALUES (:item_name, :user_id, :created_at)";

                    $params = [
                        ':item_name' => 'Admin',
                        ':user_id' => $user->id,
                        ':created_at' => date('Y-m-d')
                    ];

                    $db->createCommand($sql, $params)->execute();
                }

                return $this->redirect(['view', 'id' => $model->id, 'ids' => $user->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'user' => $user
        ]);
    }


    /**
     * Updates an existing Pegawai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $ids)
    {
        $model = $this->findModel($id);
        $user = $this->findUser($ids);

        if ($this->request->isPost && $model->load($this->request->post()) && $user->load($this->request->post())) {
            if (!empty($model->file)) {
                // get the instances of uploaded image
                $imageName = $model->nama;
                $model->file = WebUploadedFile::getInstance($model, 'file');
                $model->file->saveAs('uploads/' . $imageName . '.' . $model->file->extension);

                //save the path in the db column
                $model->profile = 'uploads/' . $imageName . '.' . $model->file->extension;
            }

            $model->save();

            $user->save();

            return $this->redirect(['view', 'id' => $model->id, 'ids' => $user->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'user' => $user
        ]);
    }

    /**
     * Deletes an existing Pegawai model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $ids)
    {
        $this->findUser($ids)->delete();
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionLists($proyek_id)
    {
        $pegawais = ProyekPegawai::find()->where(['proyek_id' => $proyek_id])->with('pegawai')->all();

        $result = [];
        foreach ($pegawais as $pegawai) {
            $result[$pegawai->id] = $pegawai->pegawai->nama;
        }

        return json_encode($result);
    }


    /**
     * Finds the Pegawai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Pegawai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pegawai::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findUser($ids)
    {
        if (($user = User::findOne(['id' => $ids])) !== null) {
            return $user;
        }

        throw new NotFoundHttpException('User Does Not Exist');
    }
}
