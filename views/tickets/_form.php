<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Tickets $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tickets-form">

  <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

  <?php
  if($model->isNewRecord){
    echo $form->field($model, 'files[]')->fileInput(['multiple' => true, 'accept' => 'image/*']);
  }
  ?>

  <div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>
