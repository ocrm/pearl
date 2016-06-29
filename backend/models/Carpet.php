<?php
namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use backend\behavior\EventLogsBehavior;
class Carpet extends Ticket
{

    const TEMPLATE = 'carpet';

    public function rules(){
        return [
            [['param1n', 'param5n', 'param31n', 'discount', 'height', 'width', 'area'], 'integer'],
            [['cost'], 'double'],
            [[
                'caption',
                'orderId',
                'clientId',
                'caption',
                'marking',
                'wear',
                'color',
                'services',
                'param1',
                'param1n',
                'param2',
                'param3',
                'param4',
                'param5',
                'param5n',
                'param6',
                'param7',
                'param8',
                'param9',
                'param10',
                'param11',
                'param12',
                'param13',
                'pollution',
                'param14',
                'param15',
                'param16',
                'param17',
                'param18',
                'param19',
                'param20',
                'param21',
                'param22',
                'param23',
                'param24',
                'param25',
                'param26',
                'param27',
                'param28',
                'param29',
                'param30',
                'param31',
                'param31n',
                'param32',
                'param33',
                'param34',
                'other',
                'param35',
                'param36',
                'param37',
                'param38',
                'param39',
                'param40',
                'param41',
                'param42',
                'param43',
                'param44',
                'param45',
                'param46',
                'param47',
                'param48',
                'param49',
                'param50',
                'param51',
                'param52',
                'param53',
                'param54',
                'param55',
                'param56',
                'param57',
                'param58',
                'param59',
                'param60',
                'param61',
                'param62',
                'param63',
                'param64',
                'param65',
                'param66',
                'param67',
                'param68',
                'param69',
                'param70',
                'param71',
                'param72',
                'param73',
                'param74',
                'param75',
                'param76',
            ], 'safe'],
        ];
    }

    public function attributeLabels(){
        return [
            'caption' => 'Наименование изделия',
            'marking' => 'Маркировка',
            'wear' => 'Степень износа',
            'color' => 'Цвет',
            'param1' => 'Пуговицы',
            'param1n' => 'Количество',
            'param2' => 'Брошки',
            'param3' => 'Пряжки',
            'param4' => 'Пояс',
            'param5' => 'Молнии',
            'param5n' => 'Количество',
            'param6' => 'Пряжки',
            'param7' => 'Кожаные отделки',
            'param8' => 'Кож/зам отделки',
            'param9' => 'Стразы',
            'param10' => 'Клееные украшения',
            'param11' => 'Заклепки',
            'param12' => 'Кнопки',
            'param13' => 'Искусственные материалы, запрещенные к химчистке',
            'pollution' => 'Степень загрязнения',
            'param14' => 'Ласы',
            'param15' => 'Блеск',
            'param16' => 'Лоск',
            'param17' => 'Вытертости',
            'param18' => 'Белесость и стертости',
            'param19' => 'Раздублирование ткани',
            'param20' => 'Затеки',
            'param21' => 'Желтизна',
            'param22' => 'Выгор',
            'param23' => 'Срыв красителя',
            'param24' => 'Заломы',
            'param25' => 'Свалянность',
            'param26' => 'Усадка',
            'param27' => 'Разрывы',
            'param28' => 'Деформация ткани',
            'param29' => 'Отслоение',
            'param30' => 'Расхождение швов',
            'param31' => 'Дырки',
            'param31n' => 'Количетсво',
            'param32' => 'Зацепы',
            'param33' => 'Пиллингование',
            'param34' => 'Запалы и ласы от глажения',
            'other' => 'Прочие дефекты',
            'param35' => 'Кофе',
            'param36' => 'Чай',
            'param37' => 'Какао',
            'param38' => 'Соки',
            'param39' => 'Шоколад',
            'param40' => 'Масло',
            'param41' => 'Жир',
            'param42' => 'Фрукты',
            'param43' => 'Соус',
            'param44' => 'Вино',
            'param45' => 'Пиво',
            'param46' => 'Кровь',
            'param47' => 'Краска',
            'param48' => 'Чернила',
            'param49' => 'Шариковая/геливая ручка',
            'param50' => 'Масло',
            'param51' => 'Жир',
            'param52' => 'ГСМ',
            'param53' => 'Пятно от дождя',
            'param54' => 'Уличная грязь',
            'param55' => 'Слюна животных',
            'param56' => 'Стиральный порошок',
            'param57' => 'Клей',
            'param58' => 'Ржавчина',
            'param59' => 'Серость',
            'param60' => 'Покарсы после стирки',
            'param61' => 'Потожировые пятна',
            'param62' => 'Застаревшее пятно',
            'param63' => 'Губная помада',
            'param64' => 'Тушь',
            'param65' => 'Крем',
            'param66' => 'Дезодорант',
            'param67' => 'Зеленка',
            'param68' => 'Йод',
            'param69' => 'Мази',
            'param70' => 'Растворы',
            'param71' => 'Пятна неизвестного происхождения',
            'param72' => 'Химчитска',
            'param73' => 'Аква чистка',
            'param74' => 'Стирка',
            'param75' => 'ВТО',
            'param76' => 'Пятно',
            'cost' => 'Стоимость',
            'discount' => 'Скидка,%',
            'services' => 'Доп. услуги',
            'height' => 'Высота',
            'width' => 'Ширина',
            'area' => 'Площадь'
        ];
    }
}
