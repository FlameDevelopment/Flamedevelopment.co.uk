<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "User".
 *
 * @property integer $id
 * @property string $username
 * @property string $passkey
 * @property string $email
 *
 * @property Page[] $pages
 * @property Page[] $pages0
 */
class DbUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'passkey'], 'required'],
            [['username', 'passkey', 'email'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('page', 'ID'),
            'username' => Yii::t('page', 'Username'),
            'passkey' => Yii::t('page', 'Passkey'),
            'email' => Yii::t('page', 'Email'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPages()
    {
        return $this->hasMany(Page::className(), ['modified_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPages0()
    {
        return $this->hasMany(Page::className(), ['created_by' => 'id']);
    }
}
