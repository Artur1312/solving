<?php

namespace backend\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "projects".
 *
 * @property integer $id
 * @property string $project_name
 * @property integer $company_id
 * @property string $description
 * @property integer $status_id
 *
 * @property Companies $company
 * @property Status $status
 */
class Projects extends \yii\db\ActiveRecord
{


    public $image;
    public $photos;
    /**
     * @inheritdoc
     */

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ],

        ];
    }

    public static function tableName()
    {
        return 'projects';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_name', 'company_id'], 'required'],
            [['company_id', 'status_id'], 'integer'],
            [['project_name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 255],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['photos'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }
    public function upload(){
        if($this->validate()){
            $path = 'upload/store/' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);
            return true;
        }else{
            return false;
        }
    }

    public function uploadPhotos(){

        // сохраняет целиком галерею
        if($this->validate()){
            foreach($this->photos as $file){
                $path = 'upload/store/' . $file->baseName . '.' . $file->extension;
                $file->saveAs($path);
                $this->attachImage($path);
                @unlink($path);
            }
            return true;
        }else{
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_name' => 'Project Name',
            'company_id' => 'Company Name',
            'description' => 'Description',
            'status_id' => 'Status ID',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Companies::className(), ['id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id'])->inverseOf('projects');
    }

   /// -----working with variants 1-3------------
//   public function getImageUrl() {
//       return Url::to('@web/upload/store/Projects/' . $this->photos, true);
//   }
//    function getImageUrl()
//    {
//        if (isset($this->photos) && !empty($this->photos)) {
//            return \yii\helpers\Html::img(Yii::getAlias('@web') . '/upload/projects/' . $this->photos, ['width' => 100, 'height' => 60]);
//        }
//    }

}
