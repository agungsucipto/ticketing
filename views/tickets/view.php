<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Tickets $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tickets-view">
  <p>
    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
      'class' => 'btn btn-danger',
      'data' => [
        'confirm' => 'Are you sure you want to delete this item?',
        'method' => 'post',
      ],
    ]) ?>
  </p>

  <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
      'id',
      'ticket_no',
      'description:ntext',
      [
        'attribute' => 'created_by',
        'value' => function ($model) {
          return $model->userCreate->username;
        }
      ],
      [
        'attribute' => 'updated_by',
        'value' => function ($model) {
          return $model?->userUpdate?->username;
        }
      ],
      [
        'attribute' => 'created_at',
        'value' => function ($model) {
          return Yii::$app->formatter->asDatetime($model->created_at);
        }
      ],
      [
        'attribute' => 'updated_at',
        'value' => function ($model) {
          return $model->updated_at ? Yii::$app->formatter->asDatetime($model->updated_at) : null;
        }
      ],
    ],
  ]) ?>

  <?php
  if ($files) {
    echo'<hr/><h4>Ticket Files</h4>';
    foreach ($files as $row) {
      echo '
    <img src="' . Url::to(['/uploads/ticket/' . $model->id . '/' . $row->file]) . '" class="col-2 showModalButton"/>
    ';
    }
  }
  ?>
  <div class="modal fade modal-xl" id="modal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
        </div>
        <div class="modal-body" id="modalContent">
        </div>
      </div>
    </div>
  </div>
</div>

<?php
$this->registerJs(<<<JS

$(document).on("click", ".showModalButton", function () {
      const loader = '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>';

      //if modal isn't open; open it and load content
      $("#modal")
        .modal("show")
        .find("#modalContent")
        .empty()
        .html(loader)
        .html('<img src="'+$(this).attr("src")+'" class="img-fluid"/>');

  });
JS);
?>
