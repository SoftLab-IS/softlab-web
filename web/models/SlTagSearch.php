<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SlBlogTags;

/**
 * SlTagSearch represents the model behind the search form about `app\models\SlBlogTags`.
 */
class SlTagSearch extends SlBlogTags
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['blogTagId'], 'integer'],
            [['tag'], 'safe'],
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
        $query = SlBlogTags::find();

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
            'blogTagId' => $this->blogTagId,
        ]);

        $query->andFilterWhere(['like', 'tag', $this->tag]);

        return $dataProvider;
    }
}
