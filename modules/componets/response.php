<?php
return
    [
        'class' => 'yii\web\Response',
        'on beforeSend' => function ($event) {
 
            //if ($event->sender->format == 'html') {
                $response = $event->sender;
                $response->data =
                    [
                        'code' => $response->statusCode,
                        'message' => $response->statusText,
                        'data' => $response->data,
                    ];

                if ($response->statusCode == 500) {
                        $exception = Yii::$app->getErrorHandler()->exception;
                        
                        if (YII_DEBUG) {

                                $response->data['data'] =
                                    [
                                        'name' => ($exception instanceof Exception || $exception instanceof ErrorException) ?$exception->getName() : 'Exception',
                                        'type' => get_class($exception),
                                        'file' => $exception->getFile(),
                                        'errorMessage' => $exception->getMessage(),
                                        'line' => $exception->getLine(),
                                        'stack-trace' => explode("\n", $exception->getTraceAsString()),
                                        'mytest' => explode("\n", $exception->getTraceAsString()),
                                    ];
                                if ($exception instanceof Exception) {
                                        $response->data['data']['error-info'] = $exception->errorInfo;
                                    }
                            } else {
                                if (get_class($exception) == 'yii\\db\\IntegrityException') {
                                        $response->data['errorMessage'] = $exception->errorInfo;
                                        $response->data['data'] = get_class($exception);
                                    } else {
                                        $response->data['errorMessage'] = $exception->getMessage();
                                        $response->data['data'] = get_class($exception);
                                    }
                            }
                    }
                $response->format = yii\web\Response::FORMAT_JSON;
            //}
        },
    ];

