<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tickets".
 *
 * @property int $id
 * @property string $ticket_no
 * @property string $description
 * @property string $created_at
 * @property string|null $updated_at
 * @property int $created_by
 * @property int|null $updated_by
 *
 * @property TicketFiles[] $ticketFiles
 */
class Tickets extends \yii\db\ActiveRecord
{
  public $files;
  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'tickets';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['ticket_no', 'description', 'created_at', 'created_by'], 'required'],
      [['description'], 'string'],
      [['created_at', 'updated_at'], 'safe'],
      [['created_by', 'updated_by'], 'integer'],
      [['ticket_no'], 'unique'],
      [['ticket_no'], 'string', 'max' => 32],
      [['files'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, gif', 'maxFiles' =>5, 'on' => 'create']
    ];
  }

  public function scenarios()
  {
    $scenarios = parent::scenarios();
    $scenarios['create'] = ['ticket_no', 'description', 'created_at', 'created_by', 'files'];
    return $scenarios;
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'ticket_no' => 'Ticket No',
      'description' => 'Description',
      'created_at' => 'Created At',
      'updated_at' => 'Updated At',
      'created_by' => 'Created By',
      'updated_by' => 'Updated By',
    ];
  }

  /**
   * Gets query for [[TicketFiles]].
   *
   * @return \yii\db\ActiveQuery
   */
  public function getTicketFiles()
  {
    return $this->hasMany(TicketFiles::class, ['ticket_id' => 'id']);
  }

  public function getUserCreate()
  {
    return $this->hasOne(User::class, ['id' => 'created_by']);
  }

  public function getUserUpdate()
  {
    return $this->hasOne(User::class, ['id' => 'updated_by']);
  }
}
