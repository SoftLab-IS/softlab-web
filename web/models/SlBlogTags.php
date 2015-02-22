<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sl_blog_tags".
 *
 * @property integer $blogTagId
 * @property string $tag
 */
class SlBlogTags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sl_blog_tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tag'], 'required'],
            [['tag'], 'string', 'max' => 255],
            [['tag'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'blogTagId' => 'Blog Tag ID',
            'tag' => 'Tag',
        ];
    }
}
