<?php

namespace app\controllers;

use Yii;
use app\models\Tickets;
use app\models\TicketFiles;
use app\models\TicketsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * TickerController implements the CRUD actions for Tickets model.
 */
class TicketsController extends Controller
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
   * Lists all Tickets models.
   *
   * @return string
   */
  public function actionIndex()
  {
    $searchModel = new TicketsSearch();
    $dataProvider = $searchModel->search($this->request->queryParams);

    return $this->render('index', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
    ]);
  }

  /**
   * Displays a single Tickets model.
   * @param int $id ID
   * @return string
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionView($id)
  {
    return $this->render('view', [
      'model' => $this->findModel($id),
      'files' => TicketFiles::find()->where(['ticket_id' => $id])->all(),
    ]);
  }

  /**
   * Creates a new Tickets model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   * @return string|\yii\web\Response
   */
  public function actionCreate()
  {
    $model = new Tickets();
    $model->scenario = 'create';

    if ($this->request->isPost) {
      $transaction = Yii::$app->db->beginTransaction();
      try {
          $model->load($this->request->post());
          $model->ticket_no = 'TC' . time();
          $model->created_at = date("Y-m-d H:i:s");
          $model->created_by = Yii::$app->user->id;
          $model->files = UploadedFile::getInstances($model, 'files');
          if ($model->save()) {
            $uploadPath = 'uploads/ticket/' . $model->id . '/';
            FileHelper::createDirectory($uploadPath);
            foreach ($model->files as $file) {
              if ($file->saveAs($uploadPath . $file->baseName . '.' . $file->extension)) {
                $modelFile = new TicketFiles();
                $modelFile->ticket_id = $model->id;
                $modelFile->file = $file->baseName . '.' . $file->extension;
                $modelFile->created_at = date("Y-m-d H:i:s");
                $modelFile->created_by = Yii::$app->user->id;
                $modelFile->save();
              }
            }
            $transaction->commit();
            return $this->redirect(['view', 'id' => $model->id]);
          } else {
            throw new \Exception(json_encode($model->errors));
          }
      } catch (\Exception $e) {
        $transaction->rollBack();
        Yii::$app->session->setFlash('error', $e->getMessage());
      }
    } else {
      $model->loadDefaultValues();
    }

    return $this->render('create', [
      'model' => $model,
    ]);
  }

  /**
   * Updates an existing Tickets model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param int $id ID
   * @return string|\yii\web\Response
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionUpdate($id)
  {
    $model = $this->findModel($id);

    if ($this->request->isPost && $model->load($this->request->post())) {

      $model->updated_at = date("Y-m-d H:i:s");
      $model->updated_by = Yii::$app->user->id;
      if ($model->save()) {
        return $this->redirect(['view', 'id' => $model->id]);
      } else {
        Yii::$app->session->setFlash('error', json_encode($model->errors));
      }
      return $this->redirect(['view', 'id' => $model->id]);
    }

    return $this->render('update', [
      'model' => $model,
    ]);
  }

  /**
   * Deletes an existing Tickets model.
   * If deletion is successful, the browser will be redirected to the 'index' page.
   * @param int $id ID
   * @return \yii\web\Response
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionDelete($id)
  {
    $files = TicketFiles::find()->where(['ticket_id' => $id])->all();
    if($files){
      $uploadPath = 'uploads/ticket/' . $id . '/';
      foreach($files as $row){
        @unlink($uploadPath . $row->file);
      }
      if (is_dir($uploadPath)) {
        FileHelper::removeDirectory($uploadPath);
      }
    }
    $this->findModel($id)->delete();

    return $this->redirect(['index']);
  }

  /**
   * Finds the Tickets model based on its primary key value.
   * If the model is not found, a 404 HTTP exception will be thrown.
   * @param int $id ID
   * @return Tickets the loaded model
   * @throws NotFoundHttpException if the model cannot be found
   */
  protected function findModel($id)
  {
    if (($model = Tickets::findOne(['id' => $id])) !== null) {
      return $model;
    }

    throw new NotFoundHttpException('The requested page does not exist.');
  }
}
