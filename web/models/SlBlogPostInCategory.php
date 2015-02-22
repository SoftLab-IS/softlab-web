<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sl_blog_post_in_category".
 *
 * @property integer $blogPostFid
 * @property integer $blogCategoryFid
 *
 * @property SlBlogCategories $blogCategoryF
 * @property SlBlogPost $blogPostF
 */
class SlBlogPostInCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sl_blog_post_in_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['blogPostFid', 'blogCategoryFid'], 'required'],
            [['blogPostFid', 'blogCategoryFid'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'blogPostFid' => 'Blog Post Fid',
            'blogCategoryFid' => 'Blog Category Fid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogCategoryF()
    {
        return $this->hasOne(SlBlogCategories::className(), ['blogCategoryId' => 'blogCategoryFid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogPostF()
    {
        return $this->hasOne(SlBlogPost::className(), ['blogPostId' => 'blogPostFid']);
    }
}
