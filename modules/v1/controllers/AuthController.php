<?php

namespace app\modules\v1\controllers;

use Yii;
use yii\rest\Controller;
use yii\web\Response;
use app\models\User;

class AuthController extends Controller
{
  public function behaviors()
  {
    $behaviors = parent::behaviors();
    $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
    $behaviors['verbs'] = [
      'class' => \yii\filters\VerbFilter::class,
      'actions' => [
          'login' => ['post'],
      ]
    ];

    return $behaviors;
  }

  public function actionLogin()
  {
    $jsonPayload = Yii::$app->request->getRawBody();
    $data = json_decode($jsonPayload, true);
    $username = $data['username'];
    $password = $data['password'];

    $user = User::findByUsername($username);

    if ($user && $user->validatePassword($password)) {
      $jwt = Yii::$app->jwt->getBuilder()
        ->setIssuer('http://ticketing.com')
        ->setAudience('http://ticketing.org')
        ->setId($user->id, true)
        ->setIssuedAt(time())
        ->setExpiration(time() + 1000)
        ->set('uid', $user->id)
        ->getToken();

      return [
        'username' => $user->username,
        'token' => (string)$jwt,
      ];
    } else {
      Yii::$app->response->statusCode = 401;
      return [
        'error' => 'Invalid username or password.',
      ];
    }
  }
}
