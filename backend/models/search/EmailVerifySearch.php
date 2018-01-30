<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EmailVerify;

/**
 * EmailVerifySearch represents the model behind the search form of `common\models\EmailVerify`.
 */
class EmailVerifySearch extends EmailVerify
{
    /**
     * @inheritdoc
     * @return array
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'user_category_id', 'email_verify_send_time', 'email_verify_expire'], 'integer'],
            [['email_verify_auth'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     * @return array
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
        $query = EmailVerify::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'user_category_id' => $this->user_category_id,
            'email_verify_send_time' => $this->email_verify_send_time,
            'email_verify_expire' => $this->email_verify_expire,
        ]);

        $query->andFilterWhere(['like', 'email_verify_auth', $this->email_verify_auth]);

        return $dataProvider;
    }
}
