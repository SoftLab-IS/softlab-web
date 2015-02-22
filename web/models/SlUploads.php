<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sl_uploads".
 *
 * @property integer $uploadsId
 * @property string $fullpath
 *
 * @property SlCvExportFormats[] $slCvExportFormats
 * @property SlTeams[] $slTeams
 * @property SlThinkingThursdayHasFiles[] $slThinkingThursdayHasFiles
 * @property SlThinkingThursday[] $ttFs
 * @property SlUserData[] $slUserDatas
 * @property SlUsersCvData[] $slUsersCvDatas
 */
class SlUploads extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sl_uploads';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullpath'], 'required'],
            [['fullpath'], 'string', 'max' => 255],
            [['fullpath'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uploadsId' => 'Uploads ID',
            'fullpath' => 'Fullpath',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlCvExportFormats()
    {
        return $this->hasMany(SlCvExportFormats::className(), ['formatIconFid' => 'uploadsId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlTeams()
    {
        return $this->hasMany(SlTeams::className(), ['teamImageId' => 'uploadsId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlThinkingThursdayHasFiles()
    {
        return $this->hasMany(SlThinkingThursdayHasFiles::className(), ['uploadFid' => 'uploadsId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTtFs()
    {
        return $this->hasMany(SlThinkingThursday::className(), ['ttId' => 'ttFid'])->viaTable('sl_thinking_thursday_has_files', ['uploadFid' => 'uploadsId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlUserDatas()
    {
        return $this->hasMany(SlUserData::className(), ['avatarUploadFid' => 'uploadsId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlUsersCvDatas()
    {
        return $this->hasMany(SlUsersCvData::className(), ['imageFid' => 'uploadsId']);
    }
}
