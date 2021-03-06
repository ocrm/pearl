<?php
namespace backend\modules\dialog\models;

use Yii;
use yii\db\ActiveRecord;
use backend\models\settings\Managers;
use backend\modules\dialog\models\Rooms;

class Msg extends ActiveRecord
{
    const STATUS_UNREAD = 0;
    const STATUS_READ = 1;

    public function rules(){
        return[
            [['text', 'roomId', 'userId', 'status'], 'safe']
        ];
    }

    public static function tableName()
    {
        return 'dialog_msg';
    }

    public function getManagers(){
        return $this->hasOne(Managers::className(), ['id' => 'userId']);
    }

    public function getRooms(){
        return $this->hasOne(Rooms::className(), ['id' => 'roomId']);
    }

    public function getTime(){
        return date('H:i:s Y-m-d',$this->timestamp);
    }
}
