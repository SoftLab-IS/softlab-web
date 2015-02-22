<?php

namespace app;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SLUserData;

/**
 * UserDataSearch represents the model behind the search form about `app\models\SLUserData`.
 */
class UserDataSearch extends SLUserData
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userDataId', 'registrationDate', 'lastLoginDate', 'avatarUploadFid'], 'integer'],
            [['firstName', 'lastName', 'lastLoginIP', 'facebookLink', 'twitterLink', 'linkedInLink', 'googlePlusLink', 'aboutMeLink'], 'safe'],
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
        $query = SLUserData::find();

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
            'userDataId' => $this->userDataId,
            'registrationDate' => $this->registrationDate,
            'lastLoginDate' => $this->lastLoginDate,
            'avatarUploadFid' => $this->avatarUploadFid,
        ]);

        $query->andFilterWhere(['like', 'firstName', $this->firstName])
            ->andFilterWhere(['like', 'lastName', $this->lastName])
            ->andFilterWhere(['like', 'lastLoginIP', $this->lastLoginIP])
            ->andFilterWhere(['like', 'facebookLink', $this->facebookLink])
            ->andFilterWhere(['like', 'twitterLink', $this->twitterLink])
            ->andFilterWhere(['like', 'linkedInLink', $this->linkedInLink])
            ->andFilterWhere(['like', 'googlePlusLink', $this->googlePlusLink])
            ->andFilterWhere(['like', 'aboutMeLink', $this->aboutMeLink]);

        return $dataProvider;
    }
}
