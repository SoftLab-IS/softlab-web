<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sl_blog_post".
 *
 * @property integer $blogPostId
 * @property string $urlLink
 * @property string $name
 * @property string $shortText
 * @property string $fullArticle
 * @property string $entryDate
 * @property integer $isVisible
 * @property integer $authorId
 * @property string $tags
 *
 * @property SlUsers $author
 * @property SlBlogPostInCategory[] $slBlogPostInCategories
 * @property SlBlogCategories[] $blogCategoryFs
 */
class SlBlogPost extends \yii\db\ActiveRecord
{
    public $id;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sl_blog_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['urlLink', 'name', 'shortText', 'fullArticle', 'authorId'], 'required'],
            [['shortText', 'fullArticle', 'tags'], 'string'],
            [['entryDate', 'isVisible', 'authorId'], 'integer'],
            [['urlLink', 'name'], 'string', 'max' => 255],
            [['urlLink'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'blogPostId' => 'Blog Post ID',
            'urlLink' => 'Url Link',
            'name' => 'Name',
            'shortText' => 'Short Text',
            'fullArticle' => 'Full Text',
            'entryDate' => 'Entry Date',
            'isVisible' => 'Is Visible',
            'authorId' => 'Author ID',
            'tags' => 'Tags',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(SlUsers::className(), ['usersId' => 'authorId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlBlogPostInCategories()
    {
        return $this->hasMany(SlBlogPostInCategory::className(), ['blogPostFid' => 'blogPostId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogCategoryFs()
    {
        return $this->hasMany(SlBlogCategories::className(), ['blogCategoryId' => 'blogCategoryFid'])->viaTable('sl_blog_post_in_category', ['blogPostFid' => 'blogPostId']);
    }
}
