<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SlBlogCategories;

/**
 * SlBlogCategoriesSearch represents the model behind the search form about `app\models\SlBlogCategories`.
 */
class SlBlogCategoriesSearch extends SlBlogCategories
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['blogCategoryId'], 'integer'],
            [['name', 'urlLink'], 'safe'],
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
        $query = SlBlogCategories::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'blogCategoryId' => $this->blogCategoryId,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'urlLink', $this->urlLink]);

        return $dataProvider;
    }
    public function viewCategory($id){
        return SlBlogCategories::find()->where('blogCategoryId = :id',[':id' => $id])->with('blogPostFs');
    }
}
