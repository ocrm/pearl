<?php
namespace backend\models;
use backend\models\spent\SpentRelation;
use Yii;
use backend\models\Orders;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use backend\models\settings\Point;


class Stats extends Model{

    public $mode = 0;
    public $type;
    public $interval = 0;
    public $category;
    public $point;
    public $split;

    public static $splitArr = [
        0 => 'Не разбивать',
        1 => 'По точкам',
        2 => 'По типам'
    ];

    public static $modeArr = [
        'label' => [
            0 => 'Люди',
            1 => 'Прибыль'
        ],
        'sql' => [
            0 => 'COUNT(*)',
            1 => 'SUM(`costTotal`)'
        ],
    ];

    public static $intervalArr = [
        'label' => [
            0 => 'По дням',
            1 => 'По неделям',
            2 => 'По месяцам',
            3 => 'По годам',
        ],
        'sql' => [
            0 => 'date',
            1 => 'WEEK(date)',
            2 => 'MONTH(date)',
            3 => 'YEAR(date)',
        ],
    ];

    public static $categoryArr = [
        0 => 'Ковры',
        1 => 'Химчистка',
    ];

    const CATEGORY_0 = 0;
    const CATEGORY_1 = 1;

    public function attributeLabels(){
        return [
            'mode' => 'По типу статистики',
            'type' => 'По типу вещи',
            'interval' => 'По времени',
            'category' => 'По категориям',
            'point' => 'По точкам',
            'split' => 'Разбить'
        ];
    }

    public function rules(){
        return [
            [['mode', 'type', 'interval', 'point', 'category'], 'safe']
        ];
    }

    private function series(){

        $orders = Orders::find()->select(['MAX(date) as date', self::$modeArr['sql'][$this->mode].' as value'])->groupBy(self::$intervalArr['sql'][$this->interval]);

        switch ($this->category){

            case '' :
                $orders->filterWhere(['typeId' => $this->type])->andFilterWhere(['pointId' => $this->point]);
                break;

            case 0 :
                $orders->where(['typeId' => [5,7,8]]);
                break;

            case 1 :
                $orders->where(['typeId' => [1,2,3,4,6]]);
                break;
        }

        return ArrayHelper::map($orders->asArray()->all(), 'date', 'value');
    }

    public function getProfitChartData(){

        $minDate = Orders::find()->select('MIN(date) as date')->one();
        $maxDate = Orders::find()->select('MAX(date) as date')->one();
        $minDate = $minDate->date;
        $maxDate = $maxDate->date;
        $dateArr = [];
        $date = new \DateTime($minDate);
        $series = $this->series();

        while($date->format('Y-m-d') <= $maxDate){
            $dateArr[$date->format('Y-m-d')] = 0 ;
            $date->modify('+1 day');
        }

        foreach ($dateArr as $key => $value){
            $newArr[] = [strtotime($key.' UTC')*1000, (double)$series[$key]];
        }
        $spent = SpentRelation::find()->select(['date', ['spent_carpet' => 'tax']])->asArray()->all();
        var_dump($spent);
        return Json::encode($newArr);

    }

    public function getSpentChartData(){

    }


    public static function getMonthArr(){
        $minDate = Orders::find()->select('MIN(date) as date')->one();
        $maxDate = Orders::find()->select('MAX(date) as date')->one();
        $minDate = $minDate->date;
        $maxDate = $maxDate->date;
        $dateArr = [];
        $date = new \DateTime($minDate);

        while($date->format('Y-m') <= $maxDate){
            $dateArr[] = $date->format('m-Y') ;
            $date->modify('+1 month');
        }

        return $dateArr;
    }
    
    public static function spentStats(){
        
    }
}
