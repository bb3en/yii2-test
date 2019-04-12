<?php

namespace app\components;

use yii;
use yii\rest\Serializer;
use yii\web\Link;

class MySerializer extends Serializer 
{
    public function serialize($data) 
    {   
        
        $response = Yii::$app->getResponse();
   
        $d = parent::serialize($data);      
        $m = $d['_meta'];

        unset($d['_meta']);
        unset($d['_links']);
        $d = array_merge($d, $m);
        $d['code'] = $response->statusCode;
        $d['message'] =$response->statusText;

        return $d;
    }

    public function serializePagination($pagination)
    {
        return [
            $this->linksEnvelope => Link::serialize($pagination->getLinks(true)),
            $this->metaEnvelope => [
     
            ],
        ];
    }
}