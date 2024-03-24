<?php

namespace app\models;

use Yii;

/**
 * @property-read $id
 * @property string $link
 * @property string $hash
 */
class HashLink extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%hash_link}}';
    }

    public function rules()
    {
        return [
            [['link'],'required'],
            [['link','hash'],'string'],
            [['hash','id'],'safe']
        ];
    }

    public function generateShortLink():string
    {
        $model = Yii::$app->cache->getOrSet('link',function () {
            return self::findOne(["link"=>$this->link]);
        });

        if(!$model) {
            $model = new HashLink(["link"=>$this->link]);
            $model->hash = substr(sha1(md5($this->link)), 0, 12);
            $model->save();
        }
        return $model->hash;
    }
}