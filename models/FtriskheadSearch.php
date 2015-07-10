<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ftriskhead;

/**
 * FtriskheadSearch represents the model behind the search form about `app\models\Ftriskhead`.
 */
class FtriskheadSearch extends Ftriskhead
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['risk_id', 'department', 'risk_simple', 'clinictype', 'place_id'], 'integer'],
            [['risk_date', 'event_name', 'ref', 'risk_again', 'miss', 'safety', 'outcome_pt', 'outcome_guest', 'outcome_staff', 'solve_begin', 'sum_solve', 'risk_level', 'risk_head_department', 'risk_status', 'prohead', 'prodetail', 'program_text', 'login_name', 'risk_sum_dep', 'date_input', 'last_update', 'last_staff', 'print_url', 'act_st', 'staff', 'date_complete'], 'safe'],
            [['outcome_price'], 'number'],
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
        $query = Ftriskhead::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'risk_id' => $this->risk_id,
            'risk_date' => $this->risk_date,
            'department' => $this->department,
            'outcome_price' => $this->outcome_price,
            'risk_simple' => $this->risk_simple,
            'date_input' => $this->date_input,
            'last_update' => $this->last_update,
            'clinictype' => $this->clinictype,
            'place_id' => $this->place_id,
            'date_complete' => $this->date_complete,
        ]);

        $query->andFilterWhere(['like', 'event_name', $this->event_name])
            ->andFilterWhere(['like', 'ref', $this->ref])
            ->andFilterWhere(['like', 'risk_again', $this->risk_again])
            ->andFilterWhere(['like', 'miss', $this->miss])
            ->andFilterWhere(['like', 'safety', $this->safety])
            ->andFilterWhere(['like', 'outcome_pt', $this->outcome_pt])
            ->andFilterWhere(['like', 'outcome_guest', $this->outcome_guest])
            ->andFilterWhere(['like', 'outcome_staff', $this->outcome_staff])
            ->andFilterWhere(['like', 'solve_begin', $this->solve_begin])
            ->andFilterWhere(['like', 'sum_solve', $this->sum_solve])
            ->andFilterWhere(['like', 'risk_level', $this->risk_level])
            ->andFilterWhere(['like', 'risk_head_department', $this->risk_head_department])
            ->andFilterWhere(['like', 'risk_status', $this->risk_status])
            ->andFilterWhere(['like', 'prohead', $this->prohead])
            ->andFilterWhere(['like', 'prodetail', $this->prodetail])
            ->andFilterWhere(['like', 'program_text', $this->program_text])
            ->andFilterWhere(['like', 'login_name', $this->login_name])
            ->andFilterWhere(['like', 'risk_sum_dep', $this->risk_sum_dep])
            ->andFilterWhere(['like', 'last_staff', $this->last_staff])
            ->andFilterWhere(['like', 'print_url', $this->print_url])
            ->andFilterWhere(['like', 'act_st', $this->act_st])
            ->andFilterWhere(['like', 'staff', $this->staff]);

        return $dataProvider;
    }
}
