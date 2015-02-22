<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sl_blog_categories".
 *
 * @property integer $blogCategoryId
 * @property string $name
 * @property string $urlLink
 *
 * @property SlBlogPostInCategory[] $slBlogPostInCategories
 * @property SlBlogPost[] $blogPostFs
 */
class SlBlogCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sl_blog_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'urlLink'], 'required'],
            [['name', 'urlLink'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['urlLink'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'blogCategoryId' => 'Blog Category ID',
            'name' => 'Name',
            'urlLink' => 'Url Link',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlBlogPostInCategories()
    {
        return $this->hasMany(SlBlogPostInCategory::className(), ['blogCategoryFid' => 'blogCategoryId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogPostFs()
    {
        return $this->hasMany(SlBlogPost::className(), ['blogPostId' => 'blogPostFid'])->viaTable('sl_blog_post_in_category', ['blogCategoryFid' => 'blogCategoryId']);
    }
}
