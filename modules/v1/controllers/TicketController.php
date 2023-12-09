<?php
// controllers/api/TicketsController.php

namespace app\modules\v1\controllers;

use Yii;
use yii\rest\Controller;
use app\modules\v1\helpers\JwtValidationBehavior;
use app\models\Tickets;
use app\models\TicketFiles;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\helpers\Url;

class TicketController extends Controller
{
  public $decodedToken;
  public function behaviors()
  {
    $behaviors = parent::behaviors();
    $behaviors['verbs'] = [
      'class' => \yii\filters\VerbFilter::class,
      'actions' => [
        'index' => ['post'],
      ]
    ];
    $behaviors['jwtValidation'] = [
      'class' => JwtValidationBehavior::class,
    ];

    return $behaviors;
  }

  public function actionIndex()
  {
    $decodedToken = $this->decodedToken;
    $jsonPayload = Yii::$app->request->getRawBody();
    $data = json_decode($jsonPayload, true);

    $transaction = Yii::$app->db->beginTransaction();
    try {

      //validate payload
      if (empty($data['Ticket']['ticket_no'])) {
        throw new \Exception('Ticket No Cannot Be blank');
      }
      if (empty($data['Ticket']['description'])) {
        throw new \Exception('Ticket Description Cannot Be blank');
      }
      if (strlen($data['Ticket']['ticket_no']) > 32) {
        throw new \Exception('Ticket No Max 32 Character');
      }
      if(!isset($data['TicketFile'])){
        throw new \Exception('Ticket File Cannot be Blank');
      } else {
        if(is_array($data['TicketFile'])){
          if(count($data['TicketFile']) == 0){
            throw new \Exception('Ticket File Cannot be Blank');
          }
        } else {
          throw new \Exception('Ticket File Not Valid Payload');
        }
      }

      $model = new Tickets();
      $model->load($this->request->post());
      $model->ticket_no = $data['Ticket']['ticket_no'];
      $model->description = $data['Ticket']['description'];
      $model->created_at = date("Y-m-d H:i:s");
      $model->created_by = $decodedToken->getClaim('uid');
      $model->files = UploadedFile::getInstances($model, 'files');
      $files = [];

      if (!$model->save()) {
        throw new \Exception(json_encode($model->errors));
      }

      $uploadPath = 'uploads/ticket/' . $model->id . '/';
      FileHelper::createDirectory($uploadPath);
      foreach ($data['TicketFile'] as $file) {
        $base64Image = preg_replace('/^data:image\/\w+;base64,/', '', trim($file['file']));
        $fileContent = base64_decode($base64Image);

        $extension = $this->getFileExtensionFromBase64($file['file']);
        $name = uniqid();
        $filePath = $uploadPath . $name . '.'. $extension;

        file_put_contents($filePath, $fileContent);
          $modelFile = new TicketFiles();
          $modelFile->ticket_id = $model->id;
          $modelFile->file = $name. '.' . $extension;
          $modelFile->created_at = date("Y-m-d H:i:s");
          $modelFile->created_by = $decodedToken->getClaim('uid');
          $modelFile->save();
          $files[] = [
            "id" => $modelFile->id,
            "ticket_id" => $modelFile->ticket_id,
            "file" => Url::to(['/uploads/ticket/' . $modelFile->ticket_id . '/' . $modelFile->file]),
            "ext" => $extension,
          ];
      }
      $transaction->commit();

      return [
        'success' => true,
        'message' => 'Saving data Succesfully',
        'data' => [
          'Ticket' => [
            "id" => $model->id,
            "ticket_no" => $model->ticket_no,
            "description" => $model->description,
            "created_at" => $model->created_at
          ],
          'TicketFile' => $files
        ]
      ];
    } catch (\Exception $e) {
      $transaction->rollBack();
      return [
        'success' => false,
        'message' => 'Saving data Failed ' . $e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine(),
      ];
    }
  }

  function getFileExtensionFromBase64($base64Data)
  {
    // Extract the MIME type from the base64 data
    preg_match('/^data:(.*?);base64/', $base64Data, $matches);
    if (isset($matches[1])) {
      $mimeType = $matches[1];

      $extensions = [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/gif' => 'gif',
      ];

      $defaultExtension = 'txt';
      return isset($extensions[$mimeType]) ? $extensions[$mimeType] : $defaultExtension;
    }
    return null;
  }
}
