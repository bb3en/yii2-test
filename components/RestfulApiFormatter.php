<?php
namespace app\components;

use yii\helpers\VarDumper;
use yii\web\ResponseFormatterInterface;
use yii\helpers\Json;

class RestfulApiFormatter implements ResponseFormatterInterface
{

    public function format($res)
    {
        $res->getHeaders()->set('Content-Type', 'text/php; charset=UFT-8');
        if ($res->data !== null) {
            $res->content = "{ data: " . VarDumper::export($res->data) . "}";
        }
        
        //$res->content = Json::str_replace("\n", '', VarDumper::export($res->data));
    }
}
