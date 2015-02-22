<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SlUploads;

/**
 * UploadsSearch represents the model behind the search form about `app\models\SlUploads`.
 */
class UploadsSearch extends SlUploads
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uploadsId'], 'integer'],
            [['fullpath'], 'safe'],
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
        $query = SlUploads::find();

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
            'uploadsId' => $this->uploadsId,
        ]);

        $query->andFilterWhere(['like', 'fullpath', $this->fullpath]);

        return $dataProvider;
    }
     public function avatar($id)
    {
        return SlUploads::find('fullpath')->where('uploadsId = :id',[':id' => $id])->all();
    }
}
