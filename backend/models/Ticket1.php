<?php
namespace backend\models;

use Yii;
use yii\db\ActiveRecord;

class Ticket1 extends ActiveRecord
{
    public function rules(){
        return [

        ];
    }

    public function attributeLabels(){
        return [
            'contract' => 'Квитанция-договор №',
            'mark' => '№ метки',
            'clientId' => 'Заказчик',
            'address' => 'Адрес',
            'phone' => 'Телефон',
            'description' => '',
            'cb1' => '- имеется',
            'cb2' => '- отсутствует',
            'cb3' => '- запрещает химчистку',
            'cb4' => '- спец.(профессион.)химчистка',
            'cb5' => '- очень сильное',
            'cb6' => '- сильное',
            'cb7' => '- общее',
            'cb8' => '- сильная',
            'cb9' => '- средняя',
            'cb10' => '- общая',
            'cb11' => '- изменение цвета',
            'cb12' => '- очень сильное',
            'cb13' => '- среднее',
            'cb14' => '- общее',
            'cb15' => '- сильная',
            'cb16' => '- средняя',
            'cb17' => '- из разных кусков по выделке',
            'cb18' => '- отсутствует',
            'cb19' => '- имеется',
            'cb20' => '- отслоение, деформация',
            'cb21' => '- нарушен. формоустойчивости',
            'cb22' => '- болячки',
            'cb23' => '- царапины',
            'cb24' => '- оспины',
            'cb25' => '- свищи',
            'cb26' => '- светлые пятна',
            'cb27' => '- вытравки',
            'cb28' => '- морщины, складки',
            'cb29' => '- жировые налеты',
            'cb30' => '- уплотнения без ворса',
            'cb31' => '- рыхлость',
            'cb32' => '- волнистость',
            'cb33' => '- вздутие',
            'cb34' => '- потеря эластичности, мягкость',
            'cb35' => '- отслоение слоев',
            'cb36' => '- ворсистость',
            'cb37' => '- подрезы, выхваты(несквозной порез',
            'cb38' => '- отслоение волоса',
            'cb39' => '- плешины',
            'cb40' => '- непрокрас',
            'cb41' => '- молевые вытравки',
            'cb42' => '- задиры лицевого слоя',
            'cb43' => '- белесость от трения',
            'cb44' => '- истончение кожи',
            'cb45' => '- трещины',
            'cb46' => '- свалянность меха',
            'cb47' => '- пиллингование',
            'cb48' => '- нарушение целостности кожи',
            'cb49' => '- поредение меха',
            'cb50' => '- потертость',
            'cb51' => '- деформация, другие дефекты',
            'cb52' => '- несоответстиве оттенка, степень износа покрытия',
            'cb53' => '- 40%',
            'cb54' => '- 60%',
            'cb55' => '- 80%',
            'cb56' => '- сход пленочного покрытия',
            'cb57' => '- слабое закрепление покрытия или красителя',
            'cb58' => '- частичная',
            'cb59' => '- на 50%',
            'cb60' => '- на 80%',
            'cb61' => '- на 100%',
            'cb62' => '- 30%',
            'cb63' => '- 50%',
            'cb64' => '- 75%',
            'cb65' => '- 85%',
            'param1' => '',
            'param2' => '',
            'param3' => '',
            'param4' => '',
            'param5' => '',
            'cost' => '',
        ];
    }

    public function getOrders(){
        return $this->hasOne(Orders::className(), ['id' => 'orderId']);
    }

    public function getClients(){
        return $this->hasOne(Clients::className(), ['id' => 'clientId']);
    }
}
