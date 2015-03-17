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
        $query = SLUserData::find()-with('avatarUploadF','slUsers')->all();
        print_r($query);
        die();
        return $query;
    }
}
