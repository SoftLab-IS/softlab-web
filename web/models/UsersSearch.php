<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SlUsers;

/**
 * UsersSearch represents the model behind the search form about `app\models\SlUsers`.
 */
class UsersSearch extends SlUsers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usersId', 'isActivated', 'isLoggedIn', 'userDataFid', 'userGroupFid'], 'integer'],
            [['email', 'password', 'salt', 'logoutKey'], 'safe'],
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
        $query = SlUsers::find();

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
            'usersId' => $this->usersId,
            'isActivated' => $this->isActivated,
            'isLoggedIn' => $this->isLoggedIn,
            'userDataFid' => $this->userDataFid,
            'userGroupFid' => $this->userGroupFid,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'salt', $this->salt])
            ->andFilterWhere(['like', 'logoutKey', $this->logoutKey]);

        return $dataProvider;
    }
    public function user($id){
        return SlUsers::find()->where('usersId = :id',[':id' => $id])->with('userDataF')->all();
    }
    
}
