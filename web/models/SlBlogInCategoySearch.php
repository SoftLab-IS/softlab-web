<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SlBlogPostInCategory;

/**
 * SlBlogInCategoySearch represents the model behind the search form about `app\models\SlBlogPostInCategory`.
 */
class SlBlogInCategoySearch extends SlBlogPostInCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['blogPostFid', 'blogCategoryFid'], 'integer'],
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
        $query = SlBlogPostInCategory::find();

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
            'blogPostFid' => $this->blogPostFid,
            'blogCategoryFid' => $this->blogCategoryFid,
        ]);

        return $dataProvider;
    }
}
