<?php

namespace app\models\forms;

use yii\base\Model;
use yii\validators\UrlValidator;

class HashLinkForm extends Model
{
    public $link;
    public function rules(): array
    {
        return [
            [['link'],'required'],
            [['link'],'string']
        ];
    }

    public function validateLink(): bool
    {
        $validator = new UrlValidator();
        return $validator->validate($this->link);
    }

    public function attributeLabels()
    {
        return [
            "link" => "Ссылка"
        ];
    }
}