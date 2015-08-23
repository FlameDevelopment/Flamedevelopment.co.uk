<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Page".
 *
 * @property integer $id
 * @property string $title
 * @property string $date_created
 * @property string $date_modified
 * @property integer $created_by
 * @property integer $modified_by
 *
 * @property User $modifiedBy
 * @property User $createdBy
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['date_created', 'date_modified'], 'safe'],
            [['created_by', 'modified_by'], 'integer'],
            [['title'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('page', 'ID'),
            'title' => Yii::t('page', 'Title'),
            'date_created' => Yii::t('page', 'Date Created'),
            'date_modified' => Yii::t('page', 'Date Modified'),
            'created_by' => Yii::t('page', 'Created By'),
            'modified_by' => Yii::t('page', 'Modified By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModifiedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'modified_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @inheritdoc
     * @return PageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PageQuery(get_called_class());
    }
    
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert))
        {
            if($insert)
            {
                $this->date_created = date('Y-m-d H:i:s');
                $this->created_by = \Yii::$app->user->identity->id;
            }
            else
            {
                $this->date_modified = date('Y-m-d H:i:s');
                $this->modified_by = \Yii::$app->user->identity->id;            
            }
            return true;
        }
        else
        {
            return false;
        }
    }
}
