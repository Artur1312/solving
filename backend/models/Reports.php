<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "reports".
 *
 * @property integer $id
 * @property integer $employees
 * @property string $created_at
 * @property integer $creator
 * @property string $work_date
 * @property string $start_time
 * @property string $end_time
 * @property integer $work_hours
 * @property integer $lunch
 * @property string $comment
 * @property string $images
 */
class Reports extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $image;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }


    public static function tableName()
    {
        return 'reports';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employees', 'created_at'], 'required'],
            [['employees', 'creator', 'work_hours', 'lunch'], 'integer'],
            [['created_at', 'work_date', 'start_time', 'end_time'], 'safe'],
            [['comment'], 'string', 'max' => 255],
            [['images'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employees' => 'Employees',
            'created_at' => 'Created At',
            'creator' => 'Creator',
            'work_date' => 'Work Date',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'work_hours' => 'Work Hours',
            'lunch' => 'Lunch',
            'comment' => 'Comment',
            'images' => 'Images',
        ];
    }
}
