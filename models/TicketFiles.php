<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ticket_files".
 *
 * @property int $id
 * @property int $ticket_id
 * @property string $file
 * @property string $created_at
 * @property string|null $updated_at
 * @property int $created_by
 * @property int|null $updated_by
 *
 * @property Tickets $ticket
 */
class TicketFiles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ticket_files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticket_id', 'file', 'created_at', 'created_by'], 'required'],
            [['ticket_id', 'created_by', 'updated_by'], 'integer'],
            [['file'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['ticket_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tickets::class, 'targetAttribute' => ['ticket_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ticket_id' => 'Ticket ID',
            'file' => 'File',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Ticket]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTicket()
    {
        return $this->hasOne(Tickets::class, ['id' => 'ticket_id']);
    }
}
