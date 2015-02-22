<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SlBlogPost;

/**
 * BlogPostSearch represents the model behind the search form about `app\models\SlBlogPost`.
 */
class BlogPostSearch extends SlBlogPost
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['blogPostId', 'entryDate', 'isVisible', 'authorId'], 'integer'],
            [['urlLink', 'name', 'shortText', 'fullArticle', 'tags'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $data = explode(' ', $params);
        foreach ($data as $key ) {
           $query = SlBlogPost::find()->where('((name LIKE :name) or 
            (shortText LIKE :name) or (fullArticle LIKE :name)) 
            AND isVisible = :visible', [':name' => "%".$key."%",":visible" => 1]);
        
        }
        return $query;
    }
    public function view($id){
        return SlBlogPost::find()->where('blogPostId = :id',[':id' => $id])->with('blogCategoryFs','author')->all();
    }
    public function authorPosts($id){
        return SlBlogPost::find()->where('authorId = :id',[':id' => $id]);
    }
    public function tagName($name)
    {
        return SlBlogPost::find()->where('tags Like :id',[':id' => '%'.$name.'%']);
    }
}

